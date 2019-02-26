<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use App\Models\Term;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Post;

class ShopController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $newsAndSpecial = Post::type('product')
            ->with('attachment')
            ->where(function ($q) {
                $q->whereNotNull('options->new')
                    ->orWhereNotNull('options->special');
            })
            ->where('status', '<>', 'hidden')
            ->whereNotNull('options->count')
            ->where('options->count', '>', 0)
            ->get()->take(4);

        $warnings = Post::type('product')
            ->with('attachment')
            ->whereNotNull('options->warning')
            ->where('status', '<>', 'hidden')
            ->whereNotNull('options->count')
            ->where('options->count', '>', 0)
            ->get()->take(8);

        $categories = ShopCategory::all();

        $topslider = Post::type('shopslider')
            ->with('attachment')
            ->get();

        return view('shop.index', [
            'newsAndSpecial' => $newsAndSpecial,
            'warnings'       => $warnings,
            'categories'     => $categories,
            'topslider'      => $topslider,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mostPopular()
    {
        $newsAndSpecial = Post::type('product')
            ->with('attachment')
            ->where(function ($q) {
                $q->whereNotNull('options->new')
                    ->orWhereNotNull('options->special');
            })
            ->where('status', '<>', 'hidden')
            ->whereNotNull('options->count')
            ->where('options->count', '>', 0)
            ->get();

        return view('shop.index', [
            'newsAndSpecial' => $newsAndSpecial,
        ]);
    }

    /**
     * @return View
     */
    public function catalog(): View
    {
        $categories = ShopCategory::all();

        return view('shop.catalog', [
            'categories' => $categories,
        ]);
    }

    /**
     * @param \App\Models\Post $product
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function product(Post $product): View
    {
        $warnings = Post::type('product')
            ->with('attachment')
            ->whereNotNull('options->warning')
            ->where('status', '<>', 'hidden')
            ->whereNotNull('options->count')
            ->where('options->count', '>', 0)
            ->get();

        $category = optional($product->taxonomies()->first())->term ?? new Term();

        $comments = $product->comments()->where('approved', 1)->orderBy('created_at', 'DESC')->get();

        return view('shop.product', [
            'product'  => $product,
            'warnings' => $warnings,
            'category' => $category,
            'comments' => $comments,
        ]);
    }

    /**
     * @param string $slug
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function products(string $slug, Request $request): View
    {
        $categories = ShopCategory::all();
        $category   = ShopCategory::slug($slug)->first();

        $products = $category->posts()
            ->where('status', '<>', 'hidden')
            ->whereNotNull('options->count')
            ->where('options->count', '>', 0);

        if (!is_null($request->get('sort'))) {
            $sort    = $request->get('sort');
            $asort   = [
                'price_asc'  => ["CAST(options->'$.price' AS DECIMAL(10,2)) ", 'asc', true],
                'price_desc' => ["CAST(options->'$.price' AS DECIMAL(10,2)) ", 'desc', true],
                'name_asc'   => ['content->ru->name', 'asc', false],
                'name_desc'  => ['content->ru->name', 'desc', false],
            ];
            $orderBy = $asort[$sort];
        } else {
            $orderBy = ["CAST(options->'$.price' AS DECIMAL(10,2)) ", 'asc', true];
        }
        if ($orderBy[2]) {
            $products = $products->orderByRaw($orderBy[0] . $orderBy[1]);
        } else {
            $products = $products->orderBy($orderBy[0], $orderBy[1]);
        }

        $products = $products->paginate($request->get('perpage') ?? 15)
            ->appends($request->all());

        return view('shop.products', [
            'categories'      => $categories,
            'currentCategory' => $category,
            'products'        => $products,
            'request'         => $request->all(),
        ]);
    }

    /**
     * @param string $slug
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function newsproducts(Request $request): View
    {
        if (!is_null($request->get('search'))) {
            $products = Post::type('product')
                ->whereRaw('LOWER(`content`) LIKE \'%' . mb_strtolower($request->get('search')) . '%\' ')
                ->whereNotNull('options->count')
                ->where('options->count', '>', 0)
                ->with('attachment');
        } else {
            $products = Post::type('product')
                ->with('attachment')
                ->where(function ($q) {
                    $q->whereNotNull('options->new')
                        ->orWhereNotNull('options->special');
                })
                ->whereNotNull('options->count')
                ->where('options->count', '>', 0)
                ->where('status', '<>', 'hidden');
        }

        $categories = ShopCategory::all();

        if (!is_null($request->get('sort'))) {
            $sort    = $request->get('sort');
            $asort   = [
                'price_asc'  => ["CAST(options->'$.price' AS DECIMAL(10,2)) ", 'asc', true],
                'price_desc' => ["CAST(options->'$.price' AS DECIMAL(10,2)) ", 'desc', true],
                'name_asc'   => ['content->ru->name', 'asc', false],
                'name_desc'  => ['content->ru->name', 'desc', false],
            ];
            $orderBy = $asort[$sort];
        } else {
            //$orderBy=['created_at','asc',false];
            $orderBy = ["CAST(options->'$.price' AS DECIMAL(10,2)) ", 'asc', true];
        }
        if ($orderBy[2]) {
            $products = $products->orderByRaw($orderBy[0] . $orderBy[1]);
        } else {
            $products = $products->orderBy($orderBy[0], $orderBy[1]);
        }

        $products = $products->paginate($request->get('perpage') ?? 15)
            ->appends($request->all());

        return view('shop.products', [
            'categories'      => $categories,
            'currentCategory' => $categories[0],
            'products'        => $products,
            'request'         => $request->all(),
            'newsAndSpec'     => true,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart(): View
    {
        return view('shop.cart');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order(): View
    {
        return view('shop.order');
    }
}
