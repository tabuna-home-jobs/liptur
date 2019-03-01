<?php

use App\Models\Post;
use CdekSDK\Requests\CalculationRequest;
use LapayGroup\RussianPost\ParcelInfo;
use LapayGroup\RussianPost\Providers\OtpravkaApi;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

/**
 * @param $cartContent
 * @param $isPurchase
 * @return array
 */
function get_cart_content($cartContent, $isPurchase) {
    $content = [];
    $total = 0;
    $count = 0;

    foreach ($cartContent as $item) {
        if($isPurchase && $item->qty == 1 || !$isPurchase && $item->qty > 1) {
            $content[] = $item;
            $total += $item->qty * $item->price;
            $count += $item->qty;
        }
    }

    return [
        "content" => $content,
        "total" => $total,
        "count" => $count,
    ];
}


/**
 * @param $toIndex
 * @param $deliveryType
 * @param $isPurchase
 * @return float|int|void|null
 */
function calcDeliveryCart($toIndex, $deliveryType, $isPurchase)
{
    if(!$isPurchase) {
        return 0;
    }
    $boxWeight = 300;
    $fromIndex = "398024";

    if (!$toIndex || !$deliveryType) {
        return abort(400);
    }

    Cart::restore(Auth::id());

    $cart = get_cart_content(Cart::content(), $isPurchase);

    $price = 0;
    foreach ($cart['content'] as $item) {
        $product_id = $item->id;

        $product = Post::type('product')->whereId($product_id)->firstOrFail();

        $weight = ($product->getOption('gravity')|| 0) + $boxWeight;
        $width = $product->getOption('width');
        $height = $product->getOption('height');
        $length = $product->getOption('length');

        if ($deliveryType == "courier") {
            $_price = calcCdek($fromIndex, $toIndex, $weight, $width, $height, $length);
        } else if ($deliveryType == "mail") {
            $_price = calcRussianPost($fromIndex, $toIndex, $weight);
        } else {
            return 0;
        }

        if($_price) {
            $price += $_price;
        }
    }

    return $price;
}

/**
 * @param $fromIndex
 * @param $toIndex
 * @param $weight
 * @return float|null
 */
function calcCdek($fromIndex, $toIndex, $weight, $width, $height, $length)
{
    $cdek_request = (CalculationRequest::withAuthorization())
        ->setSenderCityPostCode($fromIndex)
        ->setReceiverCityPostCode($toIndex)
        ->setTariffId(136)
        ->addPackage([
            'weight' => $weight / 1000, // кг
            'length' => $length, // см
            'width'  => $width, // см
            'height' => $height, // см
        ]);

    $client   = new \CdekSDK\CdekClient(config("services.cdek.account"), config('services.cdek.password'));
    $response = $client->sendCalculationRequest($cdek_request);
    return $response->getPrice();
}

/**
 * @param $fromIndex
 * @param $toIndex
 * @param $weight
 * @return float|int
 */
function calcRussianPost($fromIndex, $toIndex, $weight)
{
    $config      = config('services.pochta');
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
}
