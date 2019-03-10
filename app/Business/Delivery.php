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
    private static $from_index = "398024";

    public static function getDeliveryData($deliveryType, $opts) {
        if (!$deliveryType) {
            return abort(400, 'Не указан тип доставки');
        }

        if($deliveryType === 'mail') {
            if(!isset($opts['address']) && !isset($opts['zip'])) {
                $errors = [
                    'zip'=> ['Не заполнено'],
                    'address'=> ['Не заполнено']
                ];
                return ['errors' => $errors, 'step' => 1];
            }
            return [
                'delivery_address' => $opts['address'],
                'delivery_zip' => $opts['zip']
            ];
        }

        if($deliveryType === 'courier') {
            return [
                'delivery_pvz_address' => $opts['pvz_address'],
                'delivery_pvz_name' => $opts['pvz_name'],
                'delivery_id' => $opts['id'],
                'delivery_city_id' => $opts['city_id'],
                'delivery_city_name' => $opts['city_name'],
                'delivery_tarif' => $opts['tarif'],
                'delivery_term' => $opts['term'],
            ];
        }
    }


    /**
     * @param $to_index
     * @param $deliveryType
     * @param $isPurchase
     * @return float|int|null
     */
    public static function calcDeliveryCart($deliveryType, $opts, $isPurchase)
    {
        if (!$isPurchase) {
            return 0;
        }

        if (!$deliveryType) {
            return abort(400, 'Не указан тип доставки');
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
                $_price = self::calcCdek(self::$from_index, $opts, $weight, $width, $height, $length);
            } else if ($deliveryType == "mail") {
                $_price = self::calcRussianPost(self::$from_index, $opts, $weight);
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
     * @param $from_index
     * @param $opts
     * @param $weight
     * @param $width
     * @param $height
     * @param $length
     * @return float|null
     */
    private static function calcCdek($from_index, $opts, $weight, $width, $height, $length)
    {
        if(!isset($opts['city_id']) || !isset($opts['tarif'])) {
            return abort(400, "Не выбрана точка СДЕК");
        }

        $city_id = $opts['city_id'];
        $tarif = $opts['tarif'];

        return Cache::remember('cdek_delivery_' . $city_id . '_' . $tarif. '_'.$weight . '_' . $width . '_' . $height . '_' . $length, self::$cache_time, function () use ($from_index, $city_id, $tarif, $weight, $width, $height, $length) {
            $cdek_request = (CalculationRequest::withAuthorization())
                ->setSenderCityPostCode($from_index)
                ->setReceiverCityId($city_id ? intval($city_id): null)
                ->setTariffId($tarif ? intval($tarif): null)
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
     * @param $from_index
     * @param $to_index
     * @param $weight
     * @return float|int
     */
    private static function calcRussianPost($from_index, $opts, $weight)
    {
        $to_index = $opts['zip'];

        if(!$to_index) {
            return abort(400, "Не указан почтовый индекс");
        }
        return Cache::remember('rpost_delivery_' . $to_index . '_' . $weight, self::$cache_time, function () use ($from_index, $to_index, $weight) {
            $config = config('services.pochta');
            $OtpravkaApi = new OtpravkaApi($config);

            $parcelInfo = new ParcelInfo();
            $parcelInfo->setIndexFrom($from_index);
            $parcelInfo->setIndexTo($to_index);
            $parcelInfo->setMailCategory('ORDINARY'); // https://otpravka.pochta.ru/specification#/enums-base-mail-category
            $parcelInfo->setMailType('POSTAL_PARCEL'); // https://otpravka.pochta.ru/specification#/enums-base-mail-type
            $parcelInfo->setWeight($weight);
            $parcelInfo->setFragile(true);

            $tariffInfo = $OtpravkaApi->getDeliveryTariff($parcelInfo);
            return $tariffInfo->getTotalRate() / 100;
        });
    }
}