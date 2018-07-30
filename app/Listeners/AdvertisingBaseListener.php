<?php

namespace App\Listeners;

use App\Http\Forms\Advertising\AdvertisingMainForm;

class AdvertisingBaseListener
{
    /**
     * @return string
     */
    public function handle(): string
    {
        return AdvertisingMainForm::class;
    }
}
