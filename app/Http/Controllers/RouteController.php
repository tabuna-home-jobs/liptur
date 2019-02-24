<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Orchid\Press\Models\Post;

class RouteController extends Controller
{
    /**
     * @var string
     */
    private $modelClass = Post::class;

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

        // Current locale

        // Records for pointed elements
        $dataRecords = $this->getRouteRecords($item);

        // Display route
        $displayRoute = $this->getDisplayRoute($item, $dataRecords);

        $rating = new \stdClass();
        $rating->percent = round($item->averageRating(), 2);

        return view('pages.item', [
            'item'         => $item,
            'type'         => $item->getBehaviorObject(),
            'displayRoute' => $displayRoute,
            'rating'       => $rating,
        ]);
    }

    /**
     * @param Post $item
     *
     * @return mixed
     */
    private function getRouteRecords(Post $item)
    {
        $route = collect($item->content['route']);

        $dataCursor = new $this->modelClass();

        $ids = $route->reject(function ($item) {
            return !isset($item['meta']['id']) && boolval($item['visible']);
        })->map(function ($item) {
            return $item['meta']['id'];
        })->toArray();

        $dataRecords = $dataCursor->whereIn('id', $ids)->get();

        return $dataRecords->keyBy('id');
    }

    /**
     * @param Post $item
     * @param      $dataRecords
     *
     * @return array
     */
    private function getDisplayRoute(Post $item, $dataRecords)
    {
        // Full route
        $route = $item->content['route'] ?? [];

        // Right column route
        $currentLocale = App::getLocale();

        $displayRoute = [];

        foreach ($route as $routePoint) {
            $displayPoint = [];

            if (isset($routePoint['meta']['id'])) {
                $record = $dataRecords->get($routePoint['meta']['id']);
                $recordContent = $record->content;

                // Language set
                $lang = $currentLocale;

                if (!isset($recordContent[$lang])) {
                    if (isset($recordContent['en'])) {
                        $lang = 'en';
                    } else {
                        $supportedLang = array_keys($recordContent);

                        if (count($supportedLang) > 0) {
                            $lang = $supportedLang[0];
                        } else {
                            // TODO дописать на выборку не указанного названия
                        }
                    }
                }

                $displayPoint = [
                    'name' => $recordContent[$lang]['name'],
                    'url'  => $this->getItemUrl($record),
                    'time' => $routePoint['time'],
                ];
            } else {
                $displayPoint = [
                    'name' => $routePoint['description'] ?? '',
                    'time' => $routePoint['time'] ?? '',
                ];
            }

            $displayRoute[] = $displayPoint;
        }

        return $displayRoute;
    }

    /**
     * @param Post $item
     *
     * @return string
     */
    private function getItemUrl(Post $item)
    {
        $categorySlug = $item->getBehaviorObject()->slug;
        $itemSlug = $item['slug'];
        $resultUrl = "/catalog/$categorySlug/$itemSlug";

        return $resultUrl;
    }
}
