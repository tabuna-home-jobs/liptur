<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * @param $typeRequest
     *
     * @return View
     */
    public function index($typeRequest): View
    {
        $typeObject = dashboard_posts()->where('slug', $typeRequest)->first() ?? abort(404);

        $query = Post::published()->type($typeRequest)
            //->orderBy('publish_at', 'ASC')
            ->whereNotNull('options->locale->'.App::getLocale())
            ->filtersApply($typeRequest);

        if ($typeRequest !== 'festivals') {
            $query->orderBy('publish_at', 'DESC');
        }
        $elements = $query->simplePaginate(10);

        $view = property_exists($typeObject, 'listing') ? $typeObject->listing : 'listings.catalog';

        return view($view, [
            'elements' => $elements,
            'type'     => $typeObject,
            'name'     => $typeObject->name,
            'page'     => getPage($typeRequest),
        ]);
    }

    /**
     * @param      $typeRequest
     * @param Post $item
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($typeRequest, Post $item)
    {
        $types = dashboard_posts();
        $typeObject = null;
        foreach ($types as $type) {
            if ($type->slug == $typeRequest) {
                $typeObject = $type;
                break;
            }
        }

        if (is_null($typeObject)) {
            abort(404);
        }

        $rating = new \stdClass();
        $rating->percent = round($item->averageRating(), 2);

        $view = $item->getOption('view', 'pages.item');

        $viewTemplate = property_exists($typeObject, 'viewTemplate') ? $typeObject->viewTemplate : $view;
        $parametersMap = [
            'item'   => $item,
            'type'   => $typeObject,
            'rating' => $rating,
        ];


        if (method_exists($typeObject, 'getAdditionalData')) {
            $data = $typeObject->getAdditionalData([
                'movieId' => $item->getContent('ObjectID'),
            ]);

            $parametersMap['addition'] = $data;
        }

        return view($viewTemplate, $parametersMap);
    }

    /**
     * @param $category
     *
     * @return View
     */
    public function category($category)
    {
        $elements = $category->post()
            ->whereNotNull('options->locale->'.App::getLocale())
            ->whereDate('publish_at', '<', time())
            ->orderBy('id', 'DESC')
            ->simplePaginate();

        return view('listings.catalog', [
            'elements' => $elements,
            'name'     => $category->getContent('name'),
        ]);
    }


    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function search(Request $request)
    {
        $typeObject = dashboard_posts()->where('slug', 'news')->first() ?? abort(404);


        $posts = Post::published()->whereRaw('LOWER(content) LIKE ?', '%'.mb_strtolower($request->get('search')).'%')->simplePaginate();

        $posts->transform(function ($post, $key) {
            $type = dashboard_posts()->where('slug', $post->type)->first() ?? abort(404);
            switch ($post->type) {
                case 'carousel':
                case 'advertising':
                    return null;
                    break;
                case 'news':
                    $route =  route($type->route(),[$post->slug]);
                    break;
                default:
                    $route =  route($type->route(),[$post->type,$post->slug]);
            }
            $post->route = $route;
            return $post;
        });

        return view('listings.search', [
            'elements' => $posts,
            'type'     => $typeObject,
            'name'     => 'Поиск',
        ]);
    }

}
