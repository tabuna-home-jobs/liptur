<?php

namespace App\Http\Screens\Orders;

use Orchid\Platform\Fields\Builder;
use Orchid\Platform\Fields\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\SelectField;
use Orchid\Screen\Fields\TextAreaField;

class OrderStatusLayout extends Rows
{
    public $query;

    /**
     * @return array
     */
    public function fields() : array
    {
        return [

            SelectField::make('order.options.status')
                ->options($this->query->getContent('order')->ordervar['status'])
                ->title('Тип заказа'),

            TextAreaField::make('order.options.comments')
                ->title('Комментарий продавца к заказу'),

        ];
    }

}
