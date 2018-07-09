<?php

namespace App\Http\Screens\Orders;

use Orchid\Platform\Fields\Field;
use Orchid\Platform\Layouts\Rows;

class OrderCartLayout extends Rows
{
    /**
     * @var string
     */
    public $template = 'dashboard.shop.cart.cart';
    
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
     * @return array
     * @throws \Throwable
     */
    public function build($post)
    {
        //$form = new Builder($this->fields(), $post);

        return view($this->template, [
            'order'     => $post->getContent('order'),
        ])->render();
    }
    
    
}
