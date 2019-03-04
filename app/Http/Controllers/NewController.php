<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Models\Post;

class NewController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //dd($request->page);
        if ($request->has('date')) {
            $date = Carbon::parse($request->date);
            $hasdate= true;
            $news =   \Cache::remember('new-controller-index-'.$date->format('Y-m-d').'-'.$request->page.'-'.App::getLocale(), \Carbon\Carbon::now()->addHour(), function () use ($date,$request) {
                return Post::published()
                    ->where('type', 'news')
                    ->whereNotNull('options->locale->' . App::getLocale())
                    ->whereDate('publish_at', $date->format('Y-m-d'))
                    ->orderBy('publish_at', 'DESC')
                    ->paginate(14);
            });

        } else {
            $date = Carbon::now();
            $hasdate= false;
            $news =   \Cache::remember('new-controller-index-'.$date->format('Y-m-d').'-'.$request->page.'-'.App::getLocale(), \Carbon\Carbon::now()->addHour(), function () use ($date,$request) {
                return  Post::published()
                    ->where('type', 'news')
                    ->whereNotNull('options->locale->' . App::getLocale())
                    ->orderBy('publish_at', 'DESC')
                    ->paginate(14);
            });
        }
        return view('listings.news', [
            'news' => $news,
            'hasdate' => $hasdate,
            'date' => $date,
            'page' => getPage('news'),
        ]);
    }

    /**
     * @param Post $new
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $new)
    {
        $similars =   \Cache::remember('new-controller-show-'.$new->id, \Carbon\Carbon::now()->addHour(), function () use ($new) {
            $tags = $new->tags->implode('slug', ', ');

             return Post::withTag($tags)
                ->where('type', 'news')
                ->published()
                ->where('id', '!=', $new->id)
                ->orderBy('id', 'Desc')
                ->limit(2)
                ->get();
        });

        return view('pages.news', [
                'new' => $new,
                'similars' => $similars,
            ]);


    }

    /**
     * RSS.
     */
    public function rss()
    {
        $feed = App::make('feed');
        $feed->setCache(60, 'rss-news-'.App::getLocale());

        if (!$feed->isCached()) {  // creating rss feed with our most recent 20 posts

            $news = Post::where('type', 'news')
                ->whereNotNull('options->locale->'.App::getLocale())
                ->whereDate('publish_at', '<', time())
                ->orderBy('publish_at', 'DESC')
                ->limit(20)
                ->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = 'Липецкий туристический портал';
            $feed->description = 'Липецкий туристический портал';
            $feed->logo = config('app.url').'/img/tour/logo.png';
            $feed->link = url('rss');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            //$feed->pubdate = $posts[0]->created_at;
            $feed->lang = App::getLocale();
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($news as $new) {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $new->getContent('name'),
                    'Липецкий туристический портал',//$post->author,
                    URL::to($new->slug),
                    $new->created_at,
                    $new->getContent('description'),
                    $new->getContent('body')
                );
            }
        }

        return $feed->render('atom');
    }
}
