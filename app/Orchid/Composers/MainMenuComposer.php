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
            )->add('Main',
                ItemMenu::setLabel('Где разместиться')
                    ->setSlug('rest')
                    ->setIcon('icon-umbrella')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'hostel') . ',' .
                        route(self::MANY, 'recration-center') . ',' .
                        route(self::MANY, 'sanatorium')
                    )
            )
            ->add('rest',
                ItemMenu::setLabel('Гостиницы, Хостелы и т.д.')
                    ->setIcon('icon-umbrella')
                    ->setRoute(route(self::MANY, 'hostel'))
            )
            ->add('rest',
                ItemMenu::setLabel('Базы отдыха')
                    ->setIcon('icon-umbrella')
                    ->setRoute(route(self::MANY, 'recration-center'))
            )
            ->add('rest',
                ItemMenu::setLabel('Санатории')
                    ->setIcon('icon-umbrella')
                    ->setRoute(route(self::MANY, 'sanatorium'))
            )->add('Main',
                ItemMenu::setLabel('Что посетить')
                    ->setSlug('sights')
                    ->setIcon('icon-building')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'festivals') . ',' .
                        route(self::MANY, 'monument') . ',' .
                        route(self::MANY, 'gastronomy')
                    )
            )
            ->add('sights',
                ItemMenu::setLabel('Фестивали')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'festivals'))
            )
            ->add('sights',
                ItemMenu::setLabel('Достопримечательности')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'monument'))
            )
            ->add('sights',
                ItemMenu::setLabel('Гастрономия')
                    ->setIcon('icon-cup')
                    ->setRoute(route(self::MANY, 'gastronomy'))
            )
            ->add('sights',
                ItemMenu::setLabel('Православные святыни')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'shrines'))
            )
            ->add('sights',
                ItemMenu::setLabel('Усадьбы')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'granges'))
            )
            ->add('sights',
                ItemMenu::setLabel('Музеи')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'museums'))
            )
            ->add('sights',
                ItemMenu::setLabel('Активный отдых')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'leisure'))
            )
            ->add('sights',
                ItemMenu::setLabel('Детский отдых')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'childrest'))
            )
            ->add('sights',
                ItemMenu::setLabel('Заповедные места')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'reserves'))
            )
            ->add('sights',
                ItemMenu::setLabel('Парки')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'park'))
            )
            ->add('sights',
                ItemMenu::setLabel('Выставки')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'exhibitions'))
            )
            ->add('sights',
                ItemMenu::setLabel('Театры и дома культуры')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'arts_and_recreation'))
            )
            ->add('sights',
                ItemMenu::setLabel('Кинотеатры')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'сinema'))
            )
            ->add('sights',
                ItemMenu::setLabel('Развлекальные центры')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'center'))
            )
            ->add('sights',
                ItemMenu::setLabel('Охота')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'hunting'))
            )
            ->add('sights',
                ItemMenu::setLabel('Рыбалка')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'fishing'))
            )
            ->add('sights',
                ItemMenu::setLabel('Пляжи')
                    ->setIcon('icon-building')
                    ->setRoute(route(self::MANY, 'beach'))
            )
            ->add('Main',
                ItemMenu::setLabel('Туры')
                    ->setSlug('tours')
                    ->setIcon('icon-globe-alt')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'tour') . ',' .
                        route(self::MANY, 'agencie') . ',' .
                        route(self::MANY, 'guides')
                    )
            )
            ->add('tours',
                ItemMenu::setLabel('Туры')
                    ->setIcon('icon-cup')
                    ->setRoute(route(self::MANY, 'tour'))
            )
            ->add('tours',
                ItemMenu::setLabel('Туркомпании предлагают')
                    ->setIcon('icon-cup')
                    ->setRoute(route(self::MANY, 'agencie'))
            )
            ->add('tours',
                ItemMenu::setLabel('Путешествуем сами')
                    ->setIcon('icon-cup')
                    ->setRoute(route(self::MANY, 'guides'))
            )
            ->add('tours',
                ItemMenu::setLabel('Предложения тур операторов')
                    ->setIcon('icon-cup')
                    ->setRoute(route(self::MANY, 'tour_operation'))
            )
            ->add('tours',
                ItemMenu::setLabel('Маршруты')
                    ->setIcon('icon-cup')
                    ->setRoute(route(self::MANY, 'route'))
            )
            ->add('Main',
                ItemMenu::setLabel('События')
                    ->setSlug('events')
                    ->setIcon('icon-calendar')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'event_calendar') . ',' .
                        route(self::MANY, 'competition') . ',' .
                        route(self::MANY, 'concerts')
                    )
            )
            ->add('events',
                ItemMenu::setLabel('Календарь событий')
                    ->setIcon('icon-calendar')
                    ->setRoute(route(self::MANY, 'event_calendar'))
            )
            ->add('events',
                ItemMenu::setLabel('Соревнования')
                    ->setIcon('icon-calendar')
                    ->setRoute(route(self::MANY, 'competition'))
            )
            ->add('events',
                ItemMenu::setLabel('Концерты')
                    ->setIcon('icon-calendar')
                    ->setRoute(route(self::MANY, 'concerts'))
            )
            ->add('events',
                ItemMenu::setLabel('Новый Год')
                    ->setIcon('icon-calendar')
                    ->setRoute(route(self::MANY, 'new_year'))
            )
            ->add('events',
                ItemMenu::setLabel('Конкурсы')
                    ->setIcon('icon-calendar')
                    ->setRoute(route(self::MANY, 'contest'))
            )
            ->add('Main',
                ItemMenu::setLabel('Карта')
                    ->setSlug('maps')
                    ->setIcon('icon-location-pin')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'bus-station') . ',' .
                        route(self::MANY, 'airport') . ',' .
                        route(self::MANY, 'bank')
                    )
            )
            ->add('maps',
                ItemMenu::setLabel('Автовокзал')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'bus-station'))
            )
            ->add('maps',
                ItemMenu::setLabel('Аэропорт')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'airport'))
            )
            ->add('maps',
                ItemMenu::setLabel('Банки')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'bank'))
            )
            ->add('maps',
                ItemMenu::setLabel('Банкомат')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'atm'))
            )
            ->add('maps',
                ItemMenu::setLabel('Ж/Д вокзалы')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'railway'))
            )
            ->add('maps',
                ItemMenu::setLabel('Заправки')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'refill'))
            )
            ->add('maps',
                ItemMenu::setLabel('Обмен валюты')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'exchange'))
            )
            ->add('maps',
                ItemMenu::setLabel('Такси')
                    ->setIcon('icon-location-pin')
                    ->setRoute(route(self::MANY, 'taxi'))
            )
            ->add('Main',
                ItemMenu::setLabel('Интерент магазин')
                    ->setSlug('shop')
                    ->setIcon('icon-basket-loaded')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'product') . ',' .
                        route(self::MANY, 'shopslider')
                    )
            )
            ->add('shop',
                ItemMenu::setLabel('Продукты')
                    ->setIcon('icon-basket-loaded')
                    ->setRoute(route(self::MANY, 'product'))
            )->add('shop',
                ItemMenu::setLabel('Слайдер магазина')
                    ->setIcon('icon-basket')
                    ->setRoute(route(self::MANY, 'shopslider'))
            )
            ->add('shop',
                ItemMenu::setLabel('Доставка и оплата')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::PAGE, ['shipping-and-payment','shipping-and-payment']))
            )
            ->add('Main',
                ItemMenu::setLabel('Инвесторам')
                    ->setSlug('investors')
                    ->setIcon('icon-dollar')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'investor') . ',' .
                        route(self::PAGE, ['investor-links','investor-links'])
                    )
            )
            ->add('investors',
                ItemMenu::setLabel('Предложения инвесторам')
                    ->setIcon('icon-dollar')
                    ->setRoute(route(self::MANY, 'investor'))
            )
            ->add('investors',
                ItemMenu::setLabel('Наши инвесторы')
                    ->setIcon('icon-dollar')
                    ->setRoute(route(self::PAGE, ['investor-links','investor-links']))
            )

            ->add('Main',
                ItemMenu::setLabel('Разное')
                    ->setSlug('another')
                    ->setIcon('icon-docs')
                    ->setChilds(true)
                    ->setActive(
                        route(self::MANY, 'carousel') . ',' .
                        route(self::MANY, 'secondary-carousel') . ',' .
                        route(self::MANY, 'press')
                    )
            )
            ->add('another',
                ItemMenu::setLabel('Главная карусель')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'carousel'))
            )
            ->add('another',
                ItemMenu::setLabel('Побочная карусель')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'secondary-carousel'))
            )
            ->add('another',
                ItemMenu::setLabel('Пресса о нас')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'press'))
            )
            ->add('another',
                ItemMenu::setLabel('Контакты в регионах')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'contact'))
            )
            ->add('another',
                ItemMenu::setLabel('Сувениры и ремесла')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'gift_crafts'))
            )
            ->add('another',
                ItemMenu::setLabel('Информация')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'info'))
            )
            ->add('another',
                ItemMenu::setLabel('Фото Галлерея')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'gallery'))
            )
            ->add('another',
                ItemMenu::setLabel('Документы')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::MANY, 'docs'))
            )
            ->add('another',
                ItemMenu::setLabel('Персональные данные')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::PAGE, ['personal-data','personal-data']))
            )
            ->add('another',
                ItemMenu::setLabel('Правила сервиса')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::PAGE, ['terms-of-service','terms-of-service']))
            )
            ->add('another',
                ItemMenu::setLabel('Полезные ссылки')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::PAGE, ['carousel-links','carousel-links']))
            )
        ;
    }
}
