<?php

namespace App\Http\Widgets;

use Orchid\Widget\Widget;

class EmailSecondaryWidget extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        return view('partials.marketing.subscription');
    }
}
