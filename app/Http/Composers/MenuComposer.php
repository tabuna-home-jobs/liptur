<?php

namespace App\Http\Composers;

use Orchid\Platform\Kernel\Dashboard;

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
     * CRM
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
            'active'     => 'dashboard.liptur.*',
            'permission' => 'dashboard.liptur',
            'sort'       => 100,
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

    }

}
