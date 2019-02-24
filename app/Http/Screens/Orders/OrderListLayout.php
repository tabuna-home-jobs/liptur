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

            TD::name('name')
                ->title('№ Заказа')
                ->setRender(function ($order) {
                    return '<a href="'.route('dashboard.liptur.shop.order.edit',
                        $order->id).'">'.$order->slug.'</a>';
                }),
            TD::name('name')
                ->title('Заказчик')
                ->setRender(function ($order) {
                    //dd($order);
                    return '<a href="'.route('dashboard.liptur.shop.order.edit',
                        $order->id).'">'.optional($order->user()->first())->name.'</a>';
                }),
            TD::name('created_at')->title('Дата заказа')
                ->setRender(function ($order) {
                    return $order->created_at;
                }),
            TD::name('options.total')->title('Сумма заказа')
                ->setRender(function ($order) {
                    return $order->options['total'].' руб.';
                }),
            TD::name('options.status')->title('Статус заказа')
                ->setRender(function ($order) {
                    return $order->ordervar['status'][$order->options['status']];
                }),
        ];
    }
}
