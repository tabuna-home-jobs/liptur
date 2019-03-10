<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business\Delivery;
use App\Business\CDEKService;

class DeliveryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calcCart(Request $request)
    {
        $opts = $request->input('delivery_opts');
        $deliveryType = $request->input('delivery');

        $price = Delivery::calcDeliveryCart($deliveryType, $opts,  true);

        return response()->json([
            'price' => $price
        ]);
    }

    /**
     * @param Request $request
     * @return
     */
    public function getCdekService(Request $request) {
        header('Access-Control-Allow-Origin: *');
        error_reporting(0);
        CDEKService::setTarifPriority(
            array(233, 137, 139, 16, 18, 11, 1, 3, 61, 60, 59, 58, 57, 83),
            array(234, 136, 138, 15, 17, 10, 12, 5, 62, 63)
        );

        $action = $request->get('isdek_action');

        if(!$action) {
            return abort(400, 'No cdek action');
        }

        return CDEKService::$action($_REQUEST);
    }
}
