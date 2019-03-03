<?php

namespace App\Http\Screens\Orders;

use Orchid\Screen\Layouts\Rows;

class OrderEditLayout extends Rows
{
    /**
     * @var string
     */
    public $template = 'dashboard.shop.cart.order';

    /**
     * @return array
     */
    public function fields() : array
    {
        return [
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
        //$form = new Builder($this->fields(), $post);

        return view($this->template, [
            'order'     => $post->getContent('order'),
        ])->render();
    }
}
