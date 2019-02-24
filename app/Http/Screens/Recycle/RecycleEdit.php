<?php

namespace App\Http\Screens\Recycle;

use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Setting;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;
use App\Models\Post;

class RecycleEdit extends Screen
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
        $post = Post::withTrashed()->findOrFail($id);//whereId($id)->firstOrFail();
        //dd($post);
        return [
            'post'   => Post::withTrashed()->findOrFail($id),
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
            Link::name('Восстановить')->method('restore'),
            Link::name('Удалить')->method('remove'),
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

        Post::withTrashed()->findOrFail($id)->restore();
        Alert::info('Запись была восстановлена');
        return redirect()->route('dashboard.systems.recycle.list');

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
        Post::withTrashed()->findOrFail($id)->forceDelete();
        Alert::info('Запись была удалена');
        return redirect()->route('dashboard.systems.recycle.list');
    }
}
