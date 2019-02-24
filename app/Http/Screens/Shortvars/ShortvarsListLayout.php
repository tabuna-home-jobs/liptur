<?php

namespace App\Http\Screens\Shortvars;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ShortvarsListLayout extends Table
{
    /**
     * @var string
     */
    public $data = 'shortvars';

    /**
     * @return array
     */
    public function fields() : array
    {
        return  [

            TD::set('key', 'Ключ')
                ->setRender(function ($shortvar) {
                    return '<a href="'.route('dashboard.liptur.shop.shortvar.edit',
                        $shortvar->key).'">'.$shortvar->key.'</a>';
                }),
            TD::set('options.title', 'Имя переменной')
                ->setRender(function ($shortvar) {
                    return $shortvar->options['title'];
                }),
            TD::set('value', 'Значение')
                ->setRender(function ($shortvar) {
                    if (is_array($shortvar->value)) {
                        return substr(htmlspecialchars(json_encode($shortvar->value)), 0, 50);
                    }

                    return substr(htmlspecialchars($shortvar->value), 0, 50);
                }),

        ];
    }
}
