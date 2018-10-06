<?php

namespace App\Http\Screens\Orders;

use Orchid\Platform\Fields\Builder;
use Orchid\Platform\Fields\Field;
use Orchid\Platform\Layouts\Rows;

class OrderStatusLayout extends Rows
{
    public $query;

    /**
     * @return array
     */
    public function dfields() : array
    {
        return [

            Field::tag('select')
                ->options($this->query->getContent('order')->ordervar['status'])
                ->name('order.options.status')
                ->title('Тип заказа'),

            Field::tag('textarea')
                ->name('order.options.comments')
                ->title('Комментарий продавца к заказу'),

        ];
    }

    /**
     * @param $post
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function build($post)
    {
        $this->query = $post;
        $form = new Builder($this->dfields($post), $post);

        return view($this->template, [
            'form' => $form->generateForm(),
        ])->render();
    }
}
