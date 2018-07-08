<?php

$this->domain(config('platform.domain'))->group(function () {
    $this->group([
        'middleware' => config('platform.middleware.private'),
        'prefix'     => \Orchid\Platform\Kernel\Dashboard::prefix('/shop'),
    ],
    function (\Illuminate\Routing\Router $router, $path = 'dashboard.liptur.shop') {
        $router->screen('order/{order}/edit', 'Orders\OrderEdit', $path.'.order.edit');
        $router->screen('order', 'Orders\OrderList', $path.'.order.list');
    });
});
