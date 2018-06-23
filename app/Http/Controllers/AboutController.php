<?php

namespace App\Http\Controllers;

use Orchid\Platform\Core\Models\TermTaxonomy;
use Orchid\Platform\Core\Models\Post;

class AboutController extends Controller
{

    /**
     * AboutController constructor.
     */
    public function __construct()
    {
        $this->middleware('cache');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.about', [
            'page' => getPage('about'),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        return view('pages.welcome');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function docs()
    {
        $docs = Post::where('type', 'docs')->with('attachment')->get();

        return view('listings.docs', [
            'docs' => $docs,
            'page' => getPage('docs'),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function press()
    {
        $press = Post::where('type', 'press')->orderBy('publish_at', 'desc')->with('attachment')->simplePaginate(10);

        return view('listings.press', [
            'press' => $press,
            'page'  => getPage('press'),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $contacts = Post::where('type', 'contact')->with('attachment')->get();

        return view('pages.regions', [
            'contacts' => $contacts,
            'page'     => getPage('regions'),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function investor()
    {
        $offers = TermTaxonomy::category()->slug('Investor')->first()->allChildrenTerm()->with(['posts' => function ($query) {
            $query->orderBy('publish_at', 'desc');
        }])->get();

        return view('pages.investor', [
            'offers' => $offers,
            'page'   => getPage('investor'),
        ]);
    }

}
