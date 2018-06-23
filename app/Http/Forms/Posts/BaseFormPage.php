<?php

namespace App\Http\Forms\Posts;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Orchid\Platform\Core\Models\Page;
use Orchid\PLatform\Core\Models\Taxonomy;
use Orchid\Platform\Forms\Form;

class BaseFormPage extends Form
{
    /**
     * @var string
     */
    public $name = 'General';

    /**
     * Display Base Options.
     *
     * @param Page|null $page
     *
     * @return \Illuminate\Contracts\View\Factory|View
     *
     * @internal param null $type
     */
    public function get(Page $page = null): View
    {
        return view('dashboard.pageModulesBase', [
            'author'   => (is_null($page)) ? $page : $page->getUser(),
            'post'     => $page,
            'language' => App::getLocale(),
            'locales'  => config('content.locales'),
            'type'     => $page->getBehaviorObject($page->slug),
        ]);
    }

    /**
     * Save Base Role.
     *
     * @param null $type
     * @param Page $post
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param null $storage
     */
    public function persist($type = null, Page $post = null)
    {
        $post->setTags($this->request->get('tags', []));
        $post->taxonomies()->where('taxonomy', 'category')->detach();
        $category = [];
        foreach ($this->request->get('category', []) as $value) {
            $test = Taxonomy::select('id', 'term_id')->find($value);
            $category[] = $test;
        }
        $post->taxonomies()->saveMany($category);
    }
}
