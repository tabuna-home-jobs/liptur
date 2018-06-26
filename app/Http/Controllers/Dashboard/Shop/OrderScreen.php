<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use Orchid\Platform\Screen\Screen;

class OrderScreen extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'OrderController';

    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'OrderController';

    /**
     * Query data
     *
     * @return array
     */
    public function query() : array
    {
        return [];
    }

    /**
     * Button commands
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [];
    }

    /**
     * Views
     *
     * @return array
     * @throws \Orchid\Platform\Exceptions\TypeException
     */
    public function layout() : array
    {
        return [];
    }
}
