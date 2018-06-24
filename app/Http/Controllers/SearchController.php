<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Orchid\Platform\Core\Models\Post;

class SearchController extends Controller
{
    /**
     * @var
     */
    public $lang;

    /**
     * SearchController constructor.
     */
    public function __construct()
    {
        $this->lang = App::getLocale();
    }

    /**
     * @param SearchRequest $request
     *
     * @return mixed
     */
    public function index(SearchRequest $request)
    {

        //$posts = Post::published()->where('content', 'like', '%' . $request->query('query') . '%')->paginate()->items();
        $posts = Post::published()->whereRaw('LOWER(content) LIKE ?', '%'.mb_strtolower($request->query('query')).'%')->paginate()->items();
        //dd($posts);

        foreach ($posts as $key => $value) {
            try {
                $posts[$key]->name = $value->getContent('name');
                $posts[$key]->description = str_strip_limit_words(($value->getContent('body')));
                $posts[$key]->url = $value->getBehaviorObject()->route();

                if (!empty($posts[$key]->url)) {
                    if ($posts[$key]->url == 'item') {
                        $posts[$key]->url = route($posts[$key]->url, [$value->type, $value->slug]);
                    } else {
                        $posts[$key]->url = route($posts[$key]->url, $value->slug);
                    }

                    // $posts[$key]->url = route($posts[$key]->url,$value->slug);
                } else {
                    unset($posts[$key]);
                }

                unset($posts[$key]->content);
            } catch (\Exception $exception) {
                unset($posts[$key]);
            }
        }

        $posts = array_values($posts);

        return response()->json($posts);
    }

    public function places(SearchRequest $request)
    {
        $places = DB::table('posts')
            ->whereNotIn('type', ['gift_crafts', 'reserves', 'leisure', 'contact', 'festivals', 'news', 'event', 'holidays', 'test', 'tour', 'page', 'investor', 'secondary-carousel', 'press', 'film', 'guides', 'info', 'shrines', 'people', 'investor', 'event_calendar', 'carousel', 'docs', 'contest', 'advertising', 'agencie', 'bid', 'competition', 'concerts'])
            ->whereRaw('LOWER(content->"$.'.App::getLocale().'.name") like ?',
                '%'.mb_strtolower($request->input('query')).'%')
            ->get();

        $items = [];
        foreach ($places as $place) {
            array_push($items, $place->id);
        }

        $markers = Post::find($items);

        $place = collect();

        foreach ($markers as $marker) {
            $place->push([
                'id'          => $marker->id,
                'slug'        => $marker->slug,
                'type'        => $marker->type,
                'display'     => $marker->getBehaviorObject()->display(),
                'image'       => $marker->hero('medium'),
                'description' => str_strip_limit_words($marker->getContent('body'), 200),
                'name'        => $marker->getContent('name'),
                'place'       => $marker->getContent('place'),
            ]);
        }

        $header = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'Charset'      => 'utf-8',
        ];

        $response = response()->json($place, 200, $header, JSON_UNESCAPED_UNICODE);

        return $response;
    }
}
