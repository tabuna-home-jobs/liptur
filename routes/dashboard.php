<?php

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

$this->domain(config('platform.domain'))->group(function () {
    $this->group([
        'middleware' => config('platform.middleware.private'),
        'prefix'     => \Orchid\Platform\Dashboard::prefix('/bids'),
    ], function (\Illuminate\Routing\Router $router) {
        $router->get('/', 'CRM\BidController@index')->name('dashboard.liptur.bids');
        $router->post('/deny/{post}', 'CRM\BidController@deny')->name('dashboard.liptur.bids.deny');
        $router->post('/success/{post}', 'CRM\BidController@success')->name('dashboard.liptur.bids.success');
    });

    $this->group([
        'middleware' => config('platform.middleware.private'),
        'prefix'     => \Orchid\Platform\Dashboard::prefix('/systems/shop'),
    ], function (\Illuminate\Routing\Router $router) {
        $router->resource('shop-category', 'Dashboard\Shop\CategoryController', [
            'only'  => [
                'index', 'create', 'edit', 'update', 'store', 'destroy',
            ],
            'names' => [
                'index'   => 'dashboard.liptur.shop.category',
                'create'  => 'dashboard.liptur.shop.category.create',
                'edit'    => 'dashboard.liptur.shop.category.edit',
                'update'  => 'dashboard.liptur.shop.category.update',
                'store'   => 'dashboard.liptur.shop.category.store',
                'destroy' => 'dashboard.liptur.shop.category.destroy',
            ],
        ]);
    });

    $this->group([
        'middleware' => config('platform.middleware.private'),
        'prefix'     => \Orchid\Platform\Dashboard::prefix('/systems/advertising'),
    ], function (\Illuminate\Routing\Router $router) {
        $router->resource('advertising', 'Dashboard\AdvertisingController', [
            'names' => [
                'index'  => 'dashboard.marketing.advertising.index',
                'create' => 'dashboard.marketing.advertising.create',
                'edit'   => 'dashboard.marketing.advertising.edit',
                'update' => 'dashboard.marketing.advertising.update',
                'store'  => 'dashboard.marketing.advertising.store',
            ],
        ]);
    });
});
