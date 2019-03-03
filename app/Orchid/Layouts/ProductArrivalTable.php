<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductArrivalTable extends Table
{

    /**
     * @var string
     */
    public $data = 'productArrivals';

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            TD::set('slug', 'Номер'),
            TD::set('title', 'Название товара')->setRender(function($item) {
                return stripslashes($item->title);
            }),
            TD::set('count', 'Количество'),
        ];
    }
}
