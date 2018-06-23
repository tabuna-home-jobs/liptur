<?php

namespace App\Providers;

use App\Core\Models\Post;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

//use Orchid\Platform\Core\Models\Post;


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
        //


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

        Route::bind('news', function ($value) {
            //return  Cache::remember('news-'.$value, 5, function () use ($value) {
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
            //});
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

        Route::group([
            'middleware' => ['web', 'dashboard', 'access'],
            'namespace'  => $this->namespace,
        ], function ($router) {
            require base_path('routes/dashboard.php');
        });

    }
}
