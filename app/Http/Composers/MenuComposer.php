<?php

namespace App\Http\Composers;

use Orchid\Platform\Kernel\Dashboard;
use App\Core\Models\Order;

class MenuComposer
{
    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * CRM.
     */
    public function compose()
    {
        //Experimentally!
        $this->registerMenuCRM($this->dashboard);
    }

    /**
     * @param Dashboard $dashboard
     */
    protected function registerMenuCRM(Dashboard $dashboard)
    {
        $dashboard->menu->add('Main', [
            'slug'       => 'Liptur',
            'icon'       => 'icon-grid',
            'route'      => '#',
            'label'      => 'Процессы',
            'childs'     => true,
            'main'       => true,
            'active'     => '*/dashboard/bids*',
            'permission' => 'dashboard.liptur',
            'sort'       => 100,
        ]);

        $dashboard->menu->add('Main', [
            'slug'       => 'Shop',
            'icon'       => 'icon-basket-loaded',
            'route'      => '#',
            'label'      => 'Магазин',
            'childs'     => true,
            'main'       => true,
            'active'     => '*/dashboard/shop*',
            'permission' => 'dashboard.liptur.shop',
            'sort'       => 110,
        ]);

        $dashboard->menu->add('Liptur', [
            'slug'       => 'bid',
            'icon'       => 'fa fa-gavel',
            'route'      => route('dashboard.liptur.bids'),
            'label'      => 'Заявки',
            'groupname'  => 'Процессы',
            'permission' => 'dashboard.liptur.bid',
            'sort'       => 1,
        ]);

        $dashboard->menu->add('Shop', [
            'slug'       => 'shop-category',
            'icon'       => 'icon-briefcase',
            'route'      => route('dashboard.liptur.shop.category'),
            'groupname'  => 'Интернет-магазин',
            'label'      => 'Категории',
            'permission' => 'dashboard.liptur.shop',
            'sort'       => 1,
        ]);

        $dashboard->menu->add('Shop', [
            'slug'       => 'shop-product',
            'icon'       => 'icon-present',
            'route'      => route('dashboard.posts.type', 'product'),
            'label'      => 'Продукты',
            'permission' => 'dashboard.liptur.shop',
            'sort'       => 10,
        ]);
        
        

        $dashboard->menu->add('Shop', [
            'slug'       => 'shop-order',
            'icon'       => 'icon-wallet',
            'route'      => route('dashboard.liptur.shop.order.list'),
            'label'      => 'Заказы',
            'groupname'  => 'Интернет-магазин',
            'permission' => 'dashboard.liptur.shop',
            'badge'      => [
                'class' => 'bg-primary',
                'data'  => function () {
                    return Order::where('options->status','new')->get()->count();
                },
            ],
            'sort'       => 20,
        ]);

        $dashboard->menu->add('Shop', [
            'slug'       => 'shop-shortvars',
            'icon'       => 'icon-doc',
            'route'      => route('dashboard.liptur.shop.shortvar.list'),
            'groupname'  => 'Переменные',
            'label'      => 'Переменные',
            'permission' => 'dashboard.liptur.shop',
            'divider'    => true,
            'sort'       => 30,
        ]);
    }
}
