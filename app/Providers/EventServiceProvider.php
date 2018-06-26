<?php

namespace App\Providers;

use App\Core\Models\User;
use App\Core\Observers\TitzObserver;
use App\Core\Observers\UserObserver;
use App\Events\Shop\CategoryEvent;
use App\Listeners\Shop\CategoryBaseLister;
use App\Listeners\Shop\CategoryDescListner;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Orchid\Platform\Core\Models\Post;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CategoryEvent::class => [
            CategoryBaseLister::class,
            CategoryDescListner::class,
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
        Post::observe(TitzObserver::class);
    }
}
