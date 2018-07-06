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
     * @var string
     */
    public $view;

    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function handler($arrmenu = 'header')
    {
        
        if (is_array($arrmenu)) {
            $this->typemenu = $arrmenu[0];
            $this->view = $arrmenu[1];
        } else {
            $this->typemenu = $arrmenu;
            $this->view = 'menu';
        }
        //$this->typemenu = $typemenu;
        //$this->view = 'menu';
        //dd($this->typemenu);
        $this->menu = Cache::remember($this->view.'-'.$this->typemenu.'-'.App::getLocale(), Carbon::now()->addHour(), function () {
            return Menu::where('lang', App::getLocale())
                ->where('parent', 0)
                ->where('type', $this->typemenu)
                ->with('children')
                ->get();
        });

        //dd($this->menu);
        //$this->chunk = ceil($this->menu->count() / 4);

        return view('partials.widgets.menu.'.$this->view.'-'.$this->typemenu, [
            'menu'  => $this->menu,
        ]);
    }
}
