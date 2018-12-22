<?php

namespace App\Http\Screens\Basetojpg;

use Orchid\Platform\Facades\Alert;
use Orchid\Platform\Facades\Setting;
use Orchid\Platform\Screen\Layouts;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;
use App\Core\Models\Post;

class BasetojpgEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Удаленная запись';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Просмотр удаленной записи';

    /**
     * Query data.
     *
     * @param Shortvar $shortvar
     *
     * @return array
     */
    public function query($id = null) : array
    {
        //dump($id );
        //$post = Post::withTrashed()->findOrFail($id);//whereId($id)->firstOrFail();
        //dd($post);
        return [
            'post'   => Post::findOrFail($id),
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
            Link::name('Конвертировать')->method('restore'),
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

            RecycleEditLayout::class,

        ];
    }

    /**
     * @param Shortvar $shortvar
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id = null)
    {
        $generator = new ImageGeneratorFromText(__DIR__, "/storage/images/base64/");
        Alert::info('Запись была отредактирована');
        return redirect()->route('dashboard.systems.basetojpg.list');
    }

    /**
     * @param Shortvar $shortvar
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id = null)
    {
        //Post::withTrashed()->findOrFail($id)->forceDelete();
        //Alert::info('Запись была удалена');
        return redirect()->route('dashboard.systems.basetojpg.list');
    }
}
