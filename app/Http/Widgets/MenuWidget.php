<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Platform\Core\Models\Menu;
use Orchid\Platform\Widget\Widget;

class MenuWidget extends Widget
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
     * @var string
     */
    public $typemenu;

    /**
     * Class constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function handler($typemenu = 'header')
    {
        $this->typemenu=$typemenu;
        //dd($this->typemenu);
        $this->menu = Cache::remember($this->typemenu.'-menu-'.App::getLocale(), Carbon::now()->addHour(), function () {
            return Menu::where('lang', App::getLocale())
                ->where('parent',0)
                ->where('type', $this->typemenu)
                ->with('children')
                ->get();
        });
       
        //dd($this->menu);
        //$this->chunk = ceil($this->menu->count() / 4);
            
        return view('partials.widgets.menu.menu-'.$typemenu, [
            'menu'  => $this->menu,
        ]);

    }
}
