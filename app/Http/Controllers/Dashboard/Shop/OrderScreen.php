<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Orchid\Platform\Screen\Screen;

class OrderScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'OrderController';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'OrderController';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [];
    }

    /**
     * Views.
     *
     * @throws \Orchid\Platform\Exceptions\TypeException
     *
     * @return array
     */
    public function layout() : array
    {
        return [];
    }
}
