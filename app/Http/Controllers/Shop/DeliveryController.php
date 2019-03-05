<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business\Delivery;

class DeliveryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calcCart(Request $request)
    {
        $toIndex = $request->input('zip');
        $deliveryType = $request->input('delivery');

        $price = Delivery::calcDeliveryCart($toIndex, $deliveryType, true);

        return response()->json([
            'price' => $price
        ]);
    }
}
