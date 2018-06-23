<?php namespace App\Http\Widgets;

use Orchid\Platform\Widget\Widget;

class EmailSecondaryWidget extends Widget
{
    /**
     * @return mixed
     */
    public function run()
    {
        return view('partials.marketing.subscription');
    }

}