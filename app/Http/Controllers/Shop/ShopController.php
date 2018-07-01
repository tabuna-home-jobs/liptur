<?php

namespace App\Http\Controllers\Shop;

use App\Core\Models\ShopCategory;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
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
        $newsAndSpecial = Post::type('product')
            ->with('attachment')
            ->whereNotNull('options->new')
            ->orWhereNotNull('options->special')
            ->get();

        $warnings = Post::type('product')
            ->with('attachment')
            ->whereNotNull('options->warning')
            ->get();

        return view('shop.index', [
            'newsAndSpecial' => $newsAndSpecial,
            'warnings' => $warnings,
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product(Post $product): View
    {
        return view('shop.product', [
            'product' => $product,
        ]);
    }

    /**
     * @param string $slug
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function products(string $slug): View
    {
        $categories = ShopCategory::all();
        $category = ShopCategory::slug($slug)->first();
        $products = $category->posts()->paginate();

        return view('shop.products', [
            'categories' => $categories,
            'currentCategory' => $category,
            'products' => $products,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart(): View
    {
        return view('shop.cart');
    }
}
