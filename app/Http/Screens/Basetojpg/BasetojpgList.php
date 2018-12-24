<?php

namespace App\Http\Screens\Basetojpg;

use App\Core\Models\Post;
use App\Core\Models\Term;
use Illuminate\Http\Request;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;
use Orchid\Platform\Screen\Layouts;
use Illuminate\Support\Facades\Storage;
use Orchid\Platform\Facades\Alert;

class BasetojpgList extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Список постов';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список постов';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        $post = Post::paginate(30);
        $term = Term::paginate(30);
        return [
            'posts' => $post,
            'terms'  => $term,
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
            Link::name('Конвертировать Terms')->method('restoreallterm'),
            Link::name('Конвертировать Posts')->method('restoreallpost'),
        ];
    }



    private function convertImage($posts) {
        $disk = (string) config('platform.disks.media', 'public');
        $filesystem = Storage::disk($disk);
        foreach ($posts as $post) {
            $generator = new ImageGeneratorFromText($filesystem->getDriver()->getAdapter()->getPathPrefix().'images/base64', $filesystem->url('')."images/base64/");

            $content = $post->content;
            if (isset($content['ru']['body']) && (strpos($content['ru']['body'], 'data:image') !== false)) {
                $content['ru']['body'] = $generator->transformText($content['ru']['body']);
            }
            if (isset($content['en']['body']) && (strpos($content['en']['body'], 'data:image') !== false)) {
                $content['en']['body'] = $generator->transformText($content['en']['body']);
            }
            $post->setAttribute('content',$content);
            $post->save();
        }
    }

    /**
     * @param Shortvar $shortvar
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreallterm()
    {

        Term::chunk(100, function ($posts) {
            $this->convertImage($posts);
        });


        Alert::info('Записи были отредактированы');
        return redirect()->route('dashboard.systems.basetojpg.list');
    }


    /**
     * @param Shortvar $shortvar
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreallpost()
    {
        Post::chunk(100, function ($posts) {
            $this->convertImage($posts);
        });


        Alert::info('Записи были отредактированы');
        return redirect()->route('dashboard.systems.basetojpg.list');
    }

    /**
     * Views.
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            Layouts::tabs([
                'Posts' => [BasetojpgPostLayout::class],
                'Terms' => [BasetojpgTermLayout::class],
            ]),
        ];
    }

}
