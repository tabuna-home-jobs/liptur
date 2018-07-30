<?php

namespace App\Listeners;

use App\Http\Forms\Advertising\AdvertisingCodeForm;

class AdvertisingCodeListener
{
    /**
     * @return string
     */
    public function handle(): string
    {
        return AdvertisingCodeForm::class;
    }
}
