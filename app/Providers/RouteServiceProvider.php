<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Post;
use App\Models\ShopCategory;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        Route::bind('shop-category', function ($value) {
            if (is_numeric($value)) {
                return ShopCategory::where('id', $value)->firstOrFail();
            }

            return ShopCategory::findOrFail($value);
        });

        Route::bind('product', function ($value) {
            return  \Cache::remember('route-product-'.$value, \Carbon\Carbon::now()->addHour(), function () use ($value) {
                if (is_numeric($value)) {
                    return Post::where('id', $value)
                        ->where('status', '<>', 'hidden')
                        ->where('type', 'product')
                        ->with(['attachment',
                            'comments.author',
                            'likeCounter'])
                        ->firstOrFail();
                }

                return Post::where('slug', $value)
                    ->where('status', '<>', 'hidden')
                    ->where('type', 'product')
                    ->with(['attachment',
                        'comments.author',
                        'likeCounter'])
                    ->firstOrFail();
            });
        });

        Route::bind('order', function ($value) {
           return Order::whereId($value)->firstOrFail();
        });

        Route::bind('news', function ($value) {
            return  \Cache::remember('route-news-'.$value, \Carbon\Carbon::now()->addHour(), function () use ($value) {
                if (is_numeric($value)) {
                    return Post::where('id', $value)
                        ->where('type', 'news')
                        ->with('comments.author')
                        ->firstOrFail();
                }

                return Post::where('slug', $value)
                    ->where('type', 'news')
                    ->with(['comments.author', 'likeCounter'])
                    ->firstOrFail();
            });
        });

        Route::bind('event', function ($value) {
            if (is_numeric($value)) {
                return Post::where('id', $value)
                    ->with('comments.author')
                    ->where('type', 'event')
                    ->firstOrFail();
            }

            return Post::where('slug', $value)
                ->where('type', 'event')
                ->with('comments.author')
                ->firstOrFail();
        });

        Route::bind('item', function ($value) {
            //   return  Cache::remember('item-'.$value, 5, function () use ($value) {
            if (is_numeric($value)) {
                return Post::where('id', $value)
                    ->firstOrFail();
            }

            return Post::where('slug', $value)
                ->firstOrFail();
            // });
        });

        Route::bind('advertising', function ($value) {
            if (is_numeric($value)) {
                return Post::type('advertising')->where('id', $value)->firstOrFail();
            }

            return Post::type('advertising')->where('slug', $value)->firstOrFail();
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace,
            'prefix'     => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }
}
