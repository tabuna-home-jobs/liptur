<?php

namespace App\Providers;

use App\Models\ProductArrival;
use App\Models\User;
use App\Observers\ProductObserver;
use App\Observers\TitzObserver;
use App\Observers\UserObserver;
use App\Observers\ProductArrivalObserver;
use App\Events\Shop\ShopCategoryEvent;
use App\Listeners\AdvertisingBaseListener;
use App\Listeners\AdvertisingCodeListener;
use App\Listeners\Shop\ShopCategoryBaseListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Models\Post;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ShopCategoryEvent::class => [
            ShopCategoryBaseListener::class,
        ],

        \App\Events\AdvertisingEvent::class => [
            AdvertisingBaseListener::class,
            AdvertisingCodeListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        User::observe(UserObserver::class);
        ProductArrival::observe(ProductArrivalObserver::class);
        Post::observe(TitzObserver::class);
        Post::observe(ProductObserver::class);
    }
}
