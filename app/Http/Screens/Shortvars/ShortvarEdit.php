<?php

namespace App\Http\Screens\Shortvars;

use App\Models\Shortvar;
use Orchid\Platform\Facades\Alert;
use Orchid\Platform\Facades\Setting;
use Orchid\Platform\Screen\Layouts;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;

class ShortvarEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Редактирование переменной';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Редактирование переменной';

    /**
     * Query data.
     *
     * @param Shortvar $shortvar
     *
     * @return array
     */
    public function query($shortvar = null) : array
    {
        $shortvar = is_null($shortvar) ? new Shortvar() : Shortvar::where('key', $shortvar)->first();

        return [
            'shortvar'   => $shortvar,
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
            Link::name('Save')->method('save'),
            Link::name('Remove')->method('remove'),
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

            Layouts::columns([
                'EditShortvar' => [
                    ShortvarEditLayout::class,
                ],
            ]),

        ];
    }

    /**
     * @param Shortvar $shortvar
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save($request, Shortvar $shortvar)
    {
        $req = $this->request->get('shortvar');
        //dump($req);
        if ($req['options']['type'] == 'array') {
            $req['value'] = json_decode($req['value'], true);
        }
        //dd($req);
        $shortvar->updateOrCreate(['key' => $req['key']], $req);

        //Setting::set($req['key'],$req['content']);

        Alert::info('Shortvar was saved');

        return redirect()->route('dashboard.liptur.shop.shortvar.list');
    }

    /**
     * @param Shortvar $shortvar
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($request, Shortvar $shortvar)
    {
        $shortvar->where('id', $request)->delete();
        Alert::info('Shortvar was removed');

        return redirect()->route('dashboard.liptur.shop.shortvar.list');
    }
}
