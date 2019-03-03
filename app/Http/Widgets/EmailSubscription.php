<?php

namespace App\Http\Widgets;

use Orchid\Widget\Widget;

class EmailSubscription extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        return view('partials.marketing.subscriptionMain');
    }
}
