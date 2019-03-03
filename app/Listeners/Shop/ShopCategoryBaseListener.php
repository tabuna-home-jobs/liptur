<?php

namespace App\Listeners\Shop;

use App\Http\Forms\Shop\CategoryMainForm;

class ShopCategoryBaseListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     *
     * @return void
     */
    public function handle($event)
    {
        return CategoryMainForm::class;
    }
}
