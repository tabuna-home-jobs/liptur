<?php

namespace App\Http\Screens\Shortvars;

use App\Core\Models\Shortvar;
use Illuminate\Http\Request;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;

class ShortvarsList extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Список переменных';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список переменных сайта';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        //dd(Shortvar::paginate(50));

        return [
            'shortvars' => Shortvar::paginate(30),
        ];
    }

    /**
     * Button commands.
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [
            Link::name('Добавить переменную')->method('create'),
        ];
    }

    /**
     * Views.
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            ShortvarsListLayout::class,
        ];
    }

    /**
     * @param Request $request
     *
     * @return null
     */
    public function create()
    {
        return redirect()->route('dashboard.liptur.shop.shortvar.create');
    }
}
