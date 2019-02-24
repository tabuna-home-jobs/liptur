<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Orchid\Platform\ItemMenu;
use Orchid\Platform\Dashboard;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     *
     */
    const PAGE = 'platform.entities.type.page';

    /**
     *
     */
    const MANY = 'platform.entities.type';

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
     * Registering the main menu items.
     */
    public function compose()
    {
        //dd();

        // Main
        $this->dashboard->menu
            ->add('Main',
                ItemMenu::setLabel('Липецкая Земля')
                    ->setSlug('about')
                    ->setIcon('icon-heart')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'people') . ',' .
                        route(self::MANY, 'news')
                    )
            )
            ->add('about',
                ItemMenu::setLabel('Новости')
                    ->setIcon('icon-paste')
                    ->setRoute(route(self::MANY, 'news'))
            )
            ->add('about',
                ItemMenu::setLabel('Известные люди')
                    ->setIcon('icon-people')
                    ->setRoute(route(self::MANY, 'people'))
            );
    }
}
