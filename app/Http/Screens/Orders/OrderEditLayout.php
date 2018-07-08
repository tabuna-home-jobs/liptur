<?php
namespace App\Http\Screens\Orders;

use Orchid\Platform\Layouts\Rows;
use Orchid\Platform\Fields\Field;

class OrderEditLayout extends Rows
{
 

    /**
     * @return array
     */
    public function fields() : array
    {
        return [
            Field::tag('input')
                ->type('text')
                ->name('order.user_id')
                ->title('ID Пользователя'),

            Field::tag('input')
                ->type('text')
                ->name('order.options.type')
                ->title('Тип заказа'),

            Field::tag('input')
                ->type('text')
                ->name('order.options.count')
                ->title('Количество товаров'),

            Field::tag('input')
                ->type('text')
                ->name('order.options.total')
                ->title('Количество товаров'),
                
            Field::tag('input')
                ->type('text')
                ->name('order.options.payment')
                ->title('Способ оплаты'),    

            Field::tag('input')
                ->type('text')
                ->name('order.options.delivery')
                ->title('Способ доставки'),                     

            Field::tag('textarea')
                ->name('order.options.content')
                ->title('Товары'),
                
            Field::tag('textarea')
                ->name('order.options.message')
                ->title('Комментарий'),            

                
        ];

    }
}