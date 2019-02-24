<?php

namespace App\Http\Screens\Orders;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListLayout extends Table
{
    /**
     * @var string
     */
    public $data = 'orders';

    /**
     * @return array
     */
    public function fields() : array
    {
        return [

            TD::set('name', '№ Заказа')
                ->setRender(function ($order) {
                    return '<a href="'.route('dashboard.liptur.shop.order.edit',
                        $order->id).'">'.$order->slug.'</a>';
                }),
            TD::set('name', 'Заказчик')
                ->setRender(function ($order) {
                    //dd($order);
                    return '<a href="'.route('dashboard.liptur.shop.order.edit',
                        $order->id).'">'.optional($order->user()->first())->name.'</a>';
                }),
            TD::set('created_at', 'Дата заказа')
                ->setRender(function ($order) {
                    return $order->created_at;
                }),
            TD::set('options.total', 'Сумма заказа')
                ->setRender(function ($order) {
                    return $order->options['total'].' руб.';
                }),
            TD::set('options.status', 'Статус заказа')
                ->setRender(function ($order) {
                    return $order->ordervar['status'][$order->options['status']];
                }),
        ];
    }
}
