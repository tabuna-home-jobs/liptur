<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Post;
use CdekSDK\Requests\CalculationRequest;
use Illuminate\Http\Request;
use LapayGroup\RussianPost\ParcelInfo;
use LapayGroup\RussianPost\Providers\OtpravkaApi;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    private $boxWeight = 300;
    private $fromIndex = "398024";

    public function calcCart(Request $request)
    {
        $fromIndex = $this->fromIndex;
        $toIndex = $request->input('zip');
        $deliveryType = $request->input('delivery');

        if (!$toIndex || !$deliveryType) {
            return abort(400);
        }

        Cart::restore(Auth::id());
        $content = Cart::content();

        $price = 0;
        foreach ($content as $item) {
            $product_id = $item->id;

            $product = Post::type('product')->whereId($product_id)->firstOrFail();

            $weight = ($product->getOption('gravity')|| 0) + $this->boxWeight;
            $width = ($product->getOption('width')|| 0 );
            $height = ($product->getOption('height')|| 0 );
            $length = ($product->getOption('length')|| 0 );

            if ($deliveryType == "courier") {
                $_price = $this->calcCdek($fromIndex, $toIndex, $weight, $width, $height, $length);
            } else if ($deliveryType == "mail") {
                $_price = $this->calcRussianPost($fromIndex, $toIndex, $weight);
            } else {
                return abort(400);
            }

            if($_price) {
                $price += $_price;
            }
        }

        return response()->json([
            'price' => $price
        ]);
    }

    private function calcCdek($fromIndex, $toIndex, $weight)
    {
        $cdek_request = (CalculationRequest::withAuthorization())
            ->setSenderCityPostCode($fromIndex)
            ->setReceiverCityPostCode($toIndex)
            ->setTariffId(136)
            ->addPackage([
                'weight' => $weight / 1000, // кг
                'length' => 10, // см
                'width'  => 10, // см
                'height' => 10, // см
            ]);

        $client   = $this->getCdekClient();
        $response = $client->sendCalculationRequest($cdek_request);
        return $response->getPrice();
    }

    private function getCdekClient()
    {
        return new \CdekSDK\CdekClient(config("services.cdek.account"), config('services.cdek.password'));
    }

    private function calcRussianPost($fromIndex, $toIndex, $weight)
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
}
