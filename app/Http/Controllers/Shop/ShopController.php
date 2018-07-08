<?php

namespace App\Http\Controllers\Shop;

use App\Core\Models\ShopCategory;
use App\Core\Models\Term;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Orchid\Platform\Core\Models\Post;

class ShopController extends Controller
{
    /**
     * AboutController constructor.
     */
    public function __construct()
    {
        $this->middleware('cache');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $newsAndSpecialAndWarnings = Post::type('product')
            ->with('attachment')
            ->whereNotNull('options->new')
            ->orWhereNotNull('options->special')
            ->orWhereNotNull('options->warning')
            ->get();

        $newsAndSpecial = $newsAndSpecialAndWarnings->where('options->special', '')->merge(
            $newsAndSpecialAndWarnings->where('options->new', '')
        )->take(4);

        $categories = ShopCategory::all();

        return view('shop.index', [
            'newsAndSpecial' => $newsAndSpecial,
            'warnings'       => $newsAndSpecialAndWarnings->where('options->warning', ''),
            'categories'     => $categories,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mostPopular(){
        $newsAndSpecialAndWarnings = Post::type('product')
            ->with('attachment')
            ->whereNotNull('options->new')
            ->orWhereNotNull('options->special')
            ->orWhereNotNull('options->warning')
            ->get();

        $newsAndSpecial = $newsAndSpecialAndWarnings->where('options->special', '')->merge(
            $newsAndSpecialAndWarnings->where('options->new', '')
        );

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
     * @param \Orchid\Platform\Core\Models\Post $product
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function product(Post $product): View
    {
        $warnings = Post::type('product')
            ->with('attachment')
            ->where('status', '<>', 'hidden')
            ->whereNotNull('options->warning')
            ->get();

        $category = optional($product->taxonomies()->first())->term ?? new Term();

        return view('shop.product', [
            'product'  => $product,
            'warnings' => $warnings,
            'category' => $category
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
        $category = ShopCategory::slug($slug)->first();

        $products = $category->posts()
            ->where('status', '<>', 'hidden');

        if (!is_null($request->get('sort'))) {
            $sort = $request->get('sort');
            $asort = [
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
            $products = $products->orderByRaw($orderBy[0].$orderBy[1]);
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
