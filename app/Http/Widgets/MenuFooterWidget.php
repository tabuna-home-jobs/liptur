<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Press\Models\Menu;
use Orchid\Widget\Widget;

class MenuFooterWidget extends Widget
{
    /**
     * @var
     */
    public $menu;

    /**
     * @var float
     */
    public $chunk;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->menu = Cache::remember('footer-menu-'.App::getLocale(), Carbon::now()->addHour(), function () {
            return Menu::where('lang', App::getLocale())
                ->whereNull('parent')
                ->where('type', 'footer')
                ->with('children')
                ->get();
        });

        $this->chunk = ceil($this->menu->count() / 4);
    }

    /**
     * @return mixed
     */
    public function handler()
    {
        return view('partials.footer.menu', [
            'menu'  => $this->menu,
            'chunk' => $this->chunk,
        ]);
    }
}
