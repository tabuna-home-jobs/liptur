<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Platform\Core\Models\Menu;
use Orchid\Platform\Widget\Widget;

class ShopHeaderMiddleWidget extends Widget
{
    /**
     * @return mixed
     */
    public function handler()
    {
        $menu = Cache::remember('shop-header-middle'.App::getLocale(), Carbon::now()->addHour(), function () {
            return Menu::where('lang', App::getLocale())
                 ->where('type', 'shop-header-middle')
                 ->get();
        });

        return view('partials.header.shopHeaderMiddle', [
            'menu' => $menu,
         ]);
    }
}
