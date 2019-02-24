<?php

namespace App\Providers;

use App\Http\Composers\MenuComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard)
    {
        View::composer('dashboard::layouts.dashboard', MenuComposer::class);
        Paginator::useBootstrapThree();
        $dashboard->registerPermissions($this->registerPermissions());
    }

    /**
     * @return array
     */
    protected function registerPermissions()
    {
        return [
            'Liptur' => [
                [
                    'slug'        => 'dashboard.liptur',
                    'description' => 'Процессы лип тура',
                ],
                [
                    'slug'        => 'dashboard.liptur.bid',
                    'description' => 'Заявки от организации',
                ],
                [
                  'slug'        => 'dashboard.liptur.shop',
                  'description' => 'Интернет магазин',
                ],
                [
                    'slug'        => 'dashboard.liptur.shortvar',
                    'description' => 'Переменные',
                ],
            ],

        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
