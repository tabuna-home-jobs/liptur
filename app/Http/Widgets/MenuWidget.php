<?php

namespace App\Http\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\Press\Models\Menu;
use Orchid\Widget\Widget;

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

        $this->menu = Cache::remember($this->view.'-'.$this->typemenu.'-'.App::getLocale(), Carbon::now()->addDay(), function () {
            return Menu::where('lang', App::getLocale())
                ->where('parent', 0)
                ->where('type', $this->typemenu)
                ->with('children')
                ->get();
        });


        if ($this->view=='modal-menu') {
            $menuitem = \Cache::remember($this->view.'-'.$this->typemenu.'-'.App::getLocale().'-modal-menuitem', Carbon::now()->addDay(), function () {
                return view('partials.widgets.menu.modal-menuitem', [
                    'menu'  => $this->menu,
                ])->render();
            });
        } elseif ($this->view=='footer-menu') {
            $menuitem = \Cache::remember($this->view.'-'.$this->typemenu.'-'.App::getLocale().'-footer-menuitem', Carbon::now()->addDay(), function () {
                return view('partials.widgets.menu.footer-menuitem', [
                    'menu'  => $this->menu,
                ])->render();
            });
        } else {
            $menuitem = \Cache::remember($this->view.'-'.$this->typemenu.'-'.App::getLocale().'-menuitem', Carbon::now()->addDay(), function () {
                return view('partials.widgets.menu.menuitem', [
                    'menu'  => $this->menu,
                ])->render();
            });
        }




        return view('partials.widgets.menu.'.$this->view.'-'.$this->typemenu, [
            'menu'  => $this->menu,
            'menuitem' => $menuitem,
        ]);
    }
}
