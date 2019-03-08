<?php

namespace App\Business;

use Voronkovich\SberbankAcquiring\Client;
use Voronkovich\SberbankAcquiring\Currency;

class Sberbank {
    private static function getSberbankClient() {
        return new Client([
            'token' => config('services.sberbank.token'),
            'apiUri' => Client::API_URI_TEST,
        ]);
    }

    public static function createSberbankOrder($orderId, $orderAmount) {
        $client = self::getSberbankClient();

        $returnUrl   = config('app.url').'/api/order/'.$orderId.'/payed';

        $params['currency'] = Currency::RUB;
        $params['failUrl']  = config('app.url').'/api/order/'.$orderId.'/payed-fail';

        $result = $client->registerOrder($orderId, $orderAmount, $returnUrl, $params);

        $paymentFormUrl = $result['formUrl'];

        return response()->json(['redirect' => $paymentFormUrl]);
    }

    public static function getOrderStatus(string $sberOrderId) {
        $client = self::getSberbankClient();

        return $client->getOrderStatus($sberOrderId);
    }
}