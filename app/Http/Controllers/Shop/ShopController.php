<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

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
        return view('shop.index', [
        ]);
    }
}
