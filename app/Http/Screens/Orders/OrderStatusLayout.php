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
        /*
            Field::tag('input')
                ->type('text')
                ->name('user.name')
                ->title('Имя Фамилия пользователя'),

            Field::tag('input')
                ->type('text')
                ->name('user.name')
                ->title('Email пользователя'),

            Field::tag('input')
                ->type('text')
                ->name('user.phone')
                ->title('Телефон пользователя'),

            Field::tag('input')
                ->type('text')
                ->name('user.address')
                ->title('Адресс пользователя'),


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
*/
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
