<?php

namespace App\Providers;

use App\Http\Composers\MenuComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Kernel\Dashboard;

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
        $permission = $this->registerPermissions();
        $dashboard->permission->registerPermissions($permission);
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
