<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Orchid\Platform\ItemMenu;
use Orchid\Platform\Dashboard;
use Illuminate\Support\Facades\Auth;

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
                    ->setShow(Auth::user()->hasAccess('platform.entities.type.news') || Auth::user()->hasAccess('platform.entities.type.people'))
                    ->setChilds(true)
            )
            ->add('about',
                ItemMenu::setLabel('Новости')
                    ->setIcon('icon-paste')
                    ->setPermission('platform.entities.type.news')
                    ->setRoute(route(self::MANY, 'news'))
            )
            ->add('about',
                ItemMenu::setLabel('Известные люди')
                    ->setIcon('icon-people')
                    ->setPermission('platform.entities.type.people')
                    ->setRoute(route(self::MANY, 'people'))
            )->add('Main',
                ItemMenu::setLabel('Где разместиться')
                    ->setSlug('rest')
                    ->setIcon('icon-umbrella')
                    ->setChilds(true)
                    ->setShow(Auth::user()->hasAccess('platform.entities.type.hostel')
                        || Auth::user()->hasAccess('platform.entities.type.recration-center')
                        || Auth::user()->hasAccess('platform.entities.type.sanatorium')
                    )
            )
            ->add('rest',
                ItemMenu::setLabel('Гостиницы, Хостелы и т.д.')
                    ->setIcon('icon-umbrella')
                    ->setPermission('platform.entities.type.hostel')
                    ->setRoute(route(self::MANY, 'hostel'))
            )
            ->add('rest',
                ItemMenu::setLabel('Базы отдыха')
                    ->setIcon('icon-umbrella')
                    ->setPermission('platform.entities.type.recration-center')
                    ->setRoute(route(self::MANY, 'recration-center'))
            )
            ->add('rest',
                ItemMenu::setLabel('Санатории')
                    ->setIcon('icon-umbrella')
                    ->setPermission('platform.entities.type.sanatorium')
                    ->setRoute(route(self::MANY, 'sanatorium'))
            )->add('Main',
                ItemMenu::setLabel('Что посетить')
                    ->setSlug('sights')
                    ->setIcon('icon-building')
                    ->setChilds(true)
            )
            ->add('sights',
                ItemMenu::setLabel('Фестивали')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.festivals')
                    ->setRoute(route(self::MANY, 'festivals'))
            )
            ->add('sights',
                ItemMenu::setLabel('Достопримечательности')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.monument')
                    ->setRoute(route(self::MANY, 'monument'))
            )
            ->add('sights',
                ItemMenu::setLabel('Гастрономия')
                    ->setIcon('icon-cup')
                    ->setPermission('platform.entities.type.gastronomy')
                    ->setRoute(route(self::MANY, 'gastronomy'))
            )
            ->add('sights',
                ItemMenu::setLabel('Православные святыни')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.shrines')
                    ->setRoute(route(self::MANY, 'shrines'))
            )
            ->add('sights',
                ItemMenu::setLabel('Усадьбы')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.granges')
                    ->setRoute(route(self::MANY, 'granges'))
            )
            ->add('sights',
                ItemMenu::setLabel('Музеи')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.museums')
                    ->setRoute(route(self::MANY, 'museums'))
            )
            ->add('sights',
                ItemMenu::setLabel('Активный отдых')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.leisure')
                    ->setRoute(route(self::MANY, 'leisure'))
            )
            ->add('sights',
                ItemMenu::setLabel('Детский отдых')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.childrest')
                    ->setRoute(route(self::MANY, 'childrest'))
            )
            ->add('sights',
                ItemMenu::setLabel('Заповедные места')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.reserves')
                    ->setRoute(route(self::MANY, 'reserves'))
            )
            ->add('sights',
                ItemMenu::setLabel('Парки')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.park')
                    ->setRoute(route(self::MANY, 'park'))
            )
            ->add('sights',
                ItemMenu::setLabel('Выставки')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.exhibitions')
                    ->setRoute(route(self::MANY, 'exhibitions'))
            )
            ->add('sights',
                ItemMenu::setLabel('Театры и дома культуры')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.arts_and_recreation')
                    ->setRoute(route(self::MANY, 'arts_and_recreation'))
            )
            ->add('sights',
                ItemMenu::setLabel('Кинотеатры')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.сinema')
                    ->setRoute(route(self::MANY, 'сinema'))
            )
            ->add('sights',
                ItemMenu::setLabel('Развлекальные центры')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.center')
                    ->setRoute(route(self::MANY, 'center'))
            )
            ->add('sights',
                ItemMenu::setLabel('Охота')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.hunting')
                    ->setRoute(route(self::MANY, 'hunting'))
            )
            ->add('sights',
                ItemMenu::setLabel('Рыбалка')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.fishing')
                    ->setRoute(route(self::MANY, 'fishing'))
            )
            ->add('sights',
                ItemMenu::setLabel('Пляжи')
                    ->setIcon('icon-building')
                    ->setPermission('platform.entities.type.beach')
                    ->setRoute(route(self::MANY, 'beach'))
            )
            ->add('Main',
                ItemMenu::setLabel('Туры')
                    ->setSlug('tours')
                    ->setIcon('icon-globe-alt')
                    ->setChilds(true)
                    ->setShow(Auth::user()->hasAccess('platform.entities.type.tour')
                        || Auth::user()->hasAccess('platform.entities.type.agencie')
                        || Auth::user()->hasAccess('platform.entities.type.guides')
                        || Auth::user()->hasAccess('platform.entities.type.tour_operation')
                        || Auth::user()->hasAccess('platform.entities.type.route')
                    )
            )
            ->add('tours',
                ItemMenu::setLabel('Туры')
                    ->setIcon('icon-cup')
                    ->setPermission('platform.entities.type.tour')
                    ->setRoute(route(self::MANY, 'tour'))
            )
            ->add('tours',
                ItemMenu::setLabel('Туркомпании предлагают')
                    ->setIcon('icon-cup')
                    ->setPermission('platform.entities.type.agencie')
                    ->setRoute(route(self::MANY, 'agencie'))
            )
            ->add('tours',
                ItemMenu::setLabel('Путешествуем сами')
                    ->setIcon('icon-cup')
                    ->setPermission('platform.entities.type.guides')
                    ->setRoute(route(self::MANY, 'guides'))
            )
            ->add('tours',
                ItemMenu::setLabel('Предложения тур операторов')
                    ->setIcon('icon-cup')
                    ->setPermission('platform.entities.type.tour_operation')
                    ->setRoute(route(self::MANY, 'tour_operation'))
            )
            ->add('tours',
                ItemMenu::setLabel('Маршруты')
                    ->setIcon('icon-cup')
                    ->setPermission('platform.entities.type.route')
                    ->setRoute(route(self::MANY, 'route'))
            )
            ->add('Main',
                ItemMenu::setLabel('События')
                    ->setSlug('events')
                    ->setIcon('icon-calendar')
                    ->setChilds(true)
                    ->setShow(Auth::user()->hasAccess('platform.entities.type.event_calendar')
                        || Auth::user()->hasAccess('platform.entities.type.competition')
                        || Auth::user()->hasAccess('platform.entities.type.concerts')
                        || Auth::user()->hasAccess('platform.entities.type.new_year')
                        || Auth::user()->hasAccess('platform.entities.type.contest')
                    )
            )
            ->add('events',
                ItemMenu::setLabel('Календарь событий')
                    ->setIcon('icon-calendar')
                    ->setPermission('platform.entities.type.event_calendar')
                    ->setRoute(route(self::MANY, 'event_calendar'))
            )
            ->add('events',
                ItemMenu::setLabel('Соревнования')
                    ->setIcon('icon-calendar')
                    ->setPermission('platform.entities.type.competition')
                    ->setRoute(route(self::MANY, 'competition'))
            )
            ->add('events',
                ItemMenu::setLabel('Концерты')
                    ->setIcon('icon-calendar')
                    ->setPermission('platform.entities.type.concerts')
                    ->setRoute(route(self::MANY, 'concerts'))
            )
            ->add('events',
                ItemMenu::setLabel('Новый Год')
                    ->setIcon('icon-calendar')
                    ->setPermission('platform.entities.type.new_year')
                    ->setRoute(route(self::MANY, 'new_year'))
            )
            ->add('events',
                ItemMenu::setLabel('Конкурсы')
                    ->setIcon('icon-calendar')
                    ->setPermission('platform.entities.type.contest')
                    ->setRoute(route(self::MANY, 'contest'))
            )
            ->add('Main',
                ItemMenu::setLabel('Карта')
                    ->setSlug('maps')
                    ->setIcon('icon-location-pin')
                    ->setChilds(true)
                    ->setShow(Auth::user()->hasAccess('platform.entities.type.bus-station')
                        || Auth::user()->hasAccess('platform.entities.type.airport')
                        || Auth::user()->hasAccess('platform.entities.type.bank')
                        || Auth::user()->hasAccess('platform.entities.type.atm')
                        || Auth::user()->hasAccess('platform.entities.type.railway')
                        || Auth::user()->hasAccess('platform.entities.type.refill')
                        || Auth::user()->hasAccess('platform.entities.type.exchange')
                        || Auth::user()->hasAccess('platform.entities.type.taxi')
                    )
            )
            ->add('maps',
                ItemMenu::setLabel('Автовокзал')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.bus-station')
                    ->setRoute(route(self::MANY, 'bus-station'))
            )
            ->add('maps',
                ItemMenu::setLabel('Аэропорт')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.airport')
                    ->setRoute(route(self::MANY, 'airport'))
            )
            ->add('maps',
                ItemMenu::setLabel('Банки')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.bank')
                    ->setRoute(route(self::MANY, 'bank'))
            )
            ->add('maps',
                ItemMenu::setLabel('Банкомат')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.atm')
                    ->setRoute(route(self::MANY, 'atm'))
            )
            ->add('maps',
                ItemMenu::setLabel('Ж/Д вокзалы')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.railway')
                    ->setRoute(route(self::MANY, 'railway'))
            )
            ->add('maps',
                ItemMenu::setLabel('Заправки')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.refill')
                    ->setRoute(route(self::MANY, 'refill'))
            )
            ->add('maps',
                ItemMenu::setLabel('Обмен валюты')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.exchange')
                    ->setRoute(route(self::MANY, 'exchange'))
            )
            ->add('maps',
                ItemMenu::setLabel('Такси')
                    ->setIcon('icon-location-pin')
                    ->setPermission('platform.entities.type.taxi')
                    ->setRoute(route(self::MANY, 'taxi'))
            )
            ->add('Main',
                ItemMenu::setLabel('Интерент магазин')
                    ->setSlug('shop')
                    ->setIcon('icon-basket-loaded')
                    ->setChilds(true)
                    ->setPermission('dashboard.liptur.shop')
                    ->setActive(
                        route(self::MANY, 'product') . ',' .
                        route(self::MANY, 'shopslider')
                    )
            )
            ->add('shop',
                ItemMenu::setLabel('Продукты')
                    ->setIcon('icon-basket-loaded')
                    ->setRoute(route(self::MANY, 'product'))
            )
            ->add('shop',
                ItemMenu::setLabel('Приход товара')
                    ->setIcon('icon-basket')
                    ->setRoute('dashboard.liptur.shop.product-arrival.list')
            )
            ->add('shop',
                ItemMenu::setLabel('Категории')
                    ->setIcon('icon-basket-loaded')
                    ->setRoute('platform.shop.category')
            )
            ->add('shop',
                ItemMenu::setLabel('Заказы')
                    ->setIcon('icon-basket-loaded')
                    ->setRoute('platform.shop.order.list')
            )
            ->add('shop',
                ItemMenu::setLabel('Слайдер магазина')
                    ->setIcon('icon-basket')
                    ->setRoute(route(self::MANY, 'shopslider'))
            )
            ->add('shop',
                ItemMenu::setLabel('Доставка и оплата')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::PAGE, ['shipping-and-payment','shipping-and-payment']))
            )
            ->add('shop',
                ItemMenu::setLabel('Контакты')
                    ->setIcon('icon-docs')
                    ->setRoute(route(self::PAGE, ['shop-contacts','shop-contacts']))
            )
            ->add('shop',
                ItemMenu::setLabel('Переменные')
                    ->setIcon('icon-docs')
                    ->setRoute('platform.xsetting.list')
            )
            ->add('Main',
                ItemMenu::setLabel('Инвесторам')
                    ->setSlug('investors')
                    ->setIcon('icon-dollar')
                    ->setShow(Auth::user()->hasAccess('platform.entities.type.investor') || Auth::user()->hasAccess('platform.entities.type.investor-links'))
                    ->setChilds(true)
            )
            ->add('investors',
                ItemMenu::setLabel('Предложения инвесторам')
                    ->setIcon('icon-dollar')
                    ->setPermission('platform.entities.type.investor')
                    ->setRoute(route(self::MANY, 'investor'))
            )
            ->add('investors',
                ItemMenu::setLabel('Наши инвесторы')
                    ->setIcon('icon-dollar')
                    ->setPermission('platform.entities.type.investor-links')
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
                    ->setPermission('platform.entities.type.carousel')
                    ->setRoute(route(self::MANY, 'carousel'))
            )
            ->add('another',
                ItemMenu::setLabel('Побочная карусель')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.secondary-carousel')
                    ->setRoute(route(self::MANY, 'secondary-carousel'))
            )
            ->add('another',
                ItemMenu::setLabel('Пресса о нас')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.press')
                    ->setRoute(route(self::MANY, 'press'))
            )
            ->add('another',
                ItemMenu::setLabel('Контакты в регионах')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.contact')
                    ->setRoute(route(self::MANY, 'contact'))
            )
            ->add('another',
                ItemMenu::setLabel('Сувениры и ремесла')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.gift_crafts')
                    ->setRoute(route(self::MANY, 'gift_crafts'))
            )
            ->add('another',
                ItemMenu::setLabel('Информация')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.info')
                    ->setRoute(route(self::MANY, 'info'))
            )
            ->add('another',
                ItemMenu::setLabel('Фото Галлерея')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.gallery')
                    ->setRoute(route(self::MANY, 'gallery'))
            )
            ->add('another',
                ItemMenu::setLabel('Документы')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.docs')
                    ->setRoute(route(self::MANY, 'docs'))
            )
            ->add('another',
                ItemMenu::setLabel('Рекламные блоки')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.advertising')
                    ->setRoute(route(self::MANY, 'advertising'))
            )
            ->add('another',
                ItemMenu::setLabel('Персональные данные')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.personal-data')
                    ->setRoute(route(self::PAGE, ['personal-data','personal-data']))
            )
            ->add('another',
                ItemMenu::setLabel('Правила сервиса')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.terms-of-service')
                    ->setRoute(route(self::PAGE, ['terms-of-service','terms-of-service']))
            )
            ->add('another',
                ItemMenu::setLabel('Полезные ссылки')
                    ->setIcon('icon-docs')
                    ->setPermission('platform.entities.type.carousel-links')
                    ->setRoute(route(self::PAGE, ['carousel-links','carousel-links']))
            )
            ->add('Main',
                ItemMenu::setLabel('Корзина')
                    ->setSlug('Recycle')
                    ->setIcon('icon-trash')
                    ->setRoute(route('dashboard.systems.recycle.list'))
                  
            )
        ;
    }
}
