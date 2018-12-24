<?php

namespace App\Http\Screens\Basetojpg;

use App\Core\Models\Term;
use Orchid\Platform\Facades\Alert;
use Orchid\Platform\Facades\Setting;
use Orchid\Platform\Screen\Layouts;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;
use App\Core\Models\Post;
use Illuminate\Support\Facades\Storage;

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
    public function query($id = null, $typeid = 1) : array
    {
        //$post = Post::withTrashed()->findOrFail($id);//whereId($id)->firstOrFail();
        //dd($post);
        //$post = Post::findOrFail($id);
        if ($typeid==1) {
            $post = Post::findOrFail($id);
        } elseif ($typeid==2) {
            $post = Term::findOrFail($id);
        }

        return [
            'post'   => $post,
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

            BasetojpgEditLayout::class,

        ];
    }


    /**
     * @param Shortvar $shortvar
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id = null)
    {
        //$post = Post::findOrFail($id);
        $post = Term::findOrFail($id);
        $disk = (string) config('platform.disks.media', 'public');
        $filesystem = Storage::disk($disk);
        //dd($filesystem->url('images/base64/'));
        //dd($filesystem->getDriver()->getAdapter()->getPathPrefix().'images/base64/');

        $generator = new ImageGeneratorFromText($filesystem->getDriver()->getAdapter()->getPathPrefix().'images/base64', $filesystem->url('')."images/base64/");
        $string=$post->content['ru']['body'];//$post->getContent('body');

        //dump($string);
        //dd(phpinfo());
        $content = $post->content;

        //dd($content['ru']['body']);
        if (isset($content['ru']['body'])) {
            $content['ru']['body'] = $generator->transformText($content['ru']['body']);
        }
        if (isset($content['en']['body'])) {
            $content['en']['body'] = $generator->transformText($content['en']['body']);
        }
        $post->setAttribute('content',$content);
        $post->save();
        //dd($generator->transformText($string));

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
