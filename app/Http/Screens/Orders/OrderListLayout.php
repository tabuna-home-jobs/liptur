<?php
namespace App\Http\Screens\Orders;

use Orchid\Platform\Layouts\Table;
use Orchid\Platform\Platform\Fields\TD;

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
                ->title('ID пользователя')
                ->setRender(function ($order) {
                    return '<a href="' . route('dashboard.liptur.shop.order.edit',
                        $order->id) . '">' . $order->id . '</a>';
                }),
            TD::name('options.count')->title('Количество товаров')
                ->setRender(function ($order) {
                    return $order->options['count'];
                }),
            TD::name('options.total')->title('Сумма товаров')
                ->setRender(function ($order) {
                    return $order->options['total'];
                }),
        ];
    }
}