<?php

namespace App\Http\Controllers\Shop;

use CdekSDK\Requests as CdekRequests;
use CdekSDK\Requests\CalculationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LapayGroup\RussianPost\Providers\OtpravkaApi;
use LapayGroup\RussianPost\ParcelInfo;

class DeliveryController extends Controller
{
    private function getCdekClient()
    {
        return new \CdekSDK\CdekClient(config("services.cdek.account"), config('services.cdek.password'));
    }

    private function calcCdek($fromIndex, $toIndex, $weight)
    {
        $cdek_request = (CalculationRequest::withAuthorization())
            ->setSenderCityPostCode($fromIndex)
            ->setReceiverCityPostCode($toIndex)
            ->setTariffId(136)
            ->addPackage([
                'weight' => $weight/1000, // кг
                'length' => 10, // см
                'width'  => 10, // см
                'height' => 10, // см
            ]);

        $client = $this->getCdekClient();
        $response = $client->sendCalculationRequest($cdek_request);
        dd($response);
        return $response->getPrice();
    }

    private function calcRussianPost($fromIndex, $toIndex, $weight) {
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
        return $tariffInfo->getTotalRate()/100;
    }

    public function calc($orderId, $deliveryType, Request $request) {
        $toIndex = $request->get('to');

        if (!$orderId || !$toIndex || !$deliveryType) {
            return abort(400);
        }

        $fromIndex = "398024";
        $weight = 100;

        if($deliveryType == "cdek") {
            $data =  $this->calcCdek($fromIndex, $toIndex, $weight);
            return response()->json($data);
        }

        if($deliveryType == "russian-post") {
            $data =  $this->calcRussianPost($fromIndex, $toIndex, $weight);
            return response()->json($data);
        }

        return abort(400);
    }
}
