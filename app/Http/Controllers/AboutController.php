<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Orchid\Press\Models\Taxonomy;
use Illuminate\Support\Facades\App;

class AboutController extends Controller
{
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
        $docs =   \Cache::remember('about-controller-docs', \Carbon\Carbon::now()->addHour(), function () {
            return Post::where('type', 'docs')
                ->with('attachment')
                ->get();
        });

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
        $press =   \Cache::remember('about-controller-press', \Carbon\Carbon::now()->addHour(), function () {
            return Post::where('type', 'press')
                ->orderBy('publish_at', 'desc')
                ->with('attachment')
                ->simplePaginate(10);
        });

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
        $contacts =   \Cache::remember('about-controller-contact', \Carbon\Carbon::now()->addHour(), function () {
            return Post::where('type', 'contact')
                ->with('attachment')
                ->get();
        });

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
        $offers =   \Cache::remember('about-controller-investor', \Carbon\Carbon::now()->addDay(2), function () {
            return Taxonomy::category()
                ->slug('Investor')
                ->first()
                ->allChildrenTerm()
                ->with(['posts' => function ($query) {
                    $query->orderBy('publish_at', 'desc');
                }])
                ->get();
        });

        $tab_content = \Cache::remember('about-controller-investor-tab-content', \Carbon\Carbon::now()->addDay(2), function () use ($offers) {
            return view('partials.investor.tab-content', [
                'offers' => $offers,
                'locale' => App::getLocale(),
            ])->render();
        });


        return view('pages.investor', [
            'offers' => $offers,
            'tab_content' =>$tab_content,
            'page'   => getPage('investor'),
            'locale' => App::getLocale(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ShippingAndPayment()
    {
        return view('pages.default', [
            'page' => getPage('shipping-and-payment'),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ShopContacts()
    {
        return view('pages.default', [
            'page' => getPage('shop-contacts'),
        ]);
    }
}
