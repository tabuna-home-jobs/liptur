<?php

namespace App\Business;

use App\Models\Post;
use CdekSDK\Requests\CalculationRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use LapayGroup\RussianPost\ParcelInfo;
use LapayGroup\RussianPost\Providers\OtpravkaApi;

class Delivery
{
    private static $cache_time = 1440;
    /**
     * @var int Вес упаковки
     */
    private static $boxWeight = 300;

    /**
     * @var string Индекс отправителя
     */
    private static $fromIndex = "398024";

    /**
     * @param $toIndex
     * @param $deliveryType
     * @param $isPurchase
     * @return float|int|null
     */
    public static function calcDeliveryCart($toIndex, $deliveryType, $isPurchase)
    {
        if (!$isPurchase) {
            return 0;
        }


        if (!$toIndex || !$deliveryType) {
            return abort(400);
        }

        Cart::restore(Auth::id());

        $cart = get_cart_content(Cart::content(), $isPurchase);

        $price = 0;
        foreach ($cart['content'] as $item) {
            $product_id = $item->id;

            $product = Post::type('product')->whereId($product_id)->firstOrFail();

            $weight = ($product->getOption('gravity') || 0) + self::$boxWeight;
            $width = $product->getOption('width');
            $height = $product->getOption('height');
            $length = $product->getOption('length');

            if(!$weight || !$width || !$height || !$length) {
                 return abort(400, 'У товара не указаны габариты/вес');
            }

            if ($deliveryType == "courier") {
                $_price = self::calcCdek(self::$fromIndex, $toIndex, $weight, $width, $height, $length);
            } else if ($deliveryType == "mail") {
                $_price = self::calcRussianPost(self::$fromIndex, $toIndex, $weight);
            } else {
                return 0;
            }

            if ($_price) {
                $price += $_price;
            }
        }

        return $price;
    }

    /**
     * @param $fromIndex
     * @param $toIndex
     * @param $weight
     * @param $width
     * @param $height
     * @param $length
     * @return float|null
     */
    private static function calcCdek($fromIndex, $toIndex, $weight, $width, $height, $length)
    {
        return Cache::remember('cdek_delivery_' . $toIndex . '_' . $weight . '_' . $width . '_' . $height . '_' . $length, self::$cache_time, function () use ($fromIndex, $toIndex, $weight, $width, $height, $length) {
            $cdek_request = (CalculationRequest::withAuthorization())
                ->setSenderCityPostCode($fromIndex)
                ->setReceiverCityPostCode($toIndex)
                ->setTariffId(136)
                ->addPackage([
                    'weight' => $weight / 1000, // кг
                    'length' => $length, // см
                    'width' => $width, // см
                    'height' => $height, // см
                ]);

            $client = new \CdekSDK\CdekClient(config("services.cdek.account"), config('services.cdek.password'));
            $response = $client->sendCalculationRequest($cdek_request);

            return $response->getPrice();
        });
    }

    /**
     * @param $fromIndex
     * @param $toIndex
     * @param $weight
     * @return float|int
     */
    private static function calcRussianPost($fromIndex, $toIndex, $weight)
    {
        return Cache::remember('rpost_delivery_' . $toIndex . '_' . $weight, self::$cache_time, function () use ($fromIndex, $toIndex, $weight) {
            $config = config('services.pochta');
            $OtpravkaApi = new OtpravkaApi($config);

            $parcelInfo = new ParcelInfo();
            $parcelInfo->setIndexFrom($fromIndex);
            $parcelInfo->setIndexTo($toIndex);
            $parcelInfo->setMailCategory('ORDINARY'); // https://otpravka.pochta.ru/specification#/enums-base-mail-category
            $parcelInfo->setMailType('POSTAL_PARCEL'); // https://otpravka.pochta.ru/specification#/enums-base-mail-type
            $parcelInfo->setWeight($weight);
            $parcelInfo->setFragile(true);

            $tariffInfo = $OtpravkaApi->getDeliveryTariff($parcelInfo);
            return $tariffInfo->getTotalRate() / 100;
        });
    }
}