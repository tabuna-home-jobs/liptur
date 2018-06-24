<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Platform\Core\Models\Menu;
use Orchid\Platform\Widget\Widget;

class MenuTopMiddleColum extends Widget
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
        $this->menu = Cache::remember('top-menu-'.App::getLocale(), Carbon::now()->addHour(), function () {
            return Menu::where('lang', App::getLocale())
                ->whereNull('parent')
                ->where('type', 'header-middle')->get();
        });

        $this->chunk = round($this->menu->count() / 4);
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return view('partials.header.menu', [
            'menu'  => $this->menu,
            'chunk' => $this->chunk,
        ]);
    }
}
