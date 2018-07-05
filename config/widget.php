<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Class Widgets
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */
    'widgets' => [
        'advertising'        => App\Http\Widgets\AdvertisingWidget::class,
        'mainNews'           => \App\Http\Widgets\MainNewsWidget::class,
        'mainEvents'         => \App\Http\Widgets\MainEventsWidget::class,
        'mainCinema'         => \App\Http\Widgets\MainCinemaWidget::class,
        'mainCoursel'        => \App\Http\Widgets\MainCarouselWidget::class,
        'mainCategory'       => \App\Http\Widgets\MainCategoryWidget::class,
        'secondarySlider'    => \App\Http\Widgets\SecondarySlider::class,
        'subscription'       => \App\Http\Widgets\EmailSubscription::class,
        'EmailSecondary'     => \App\Http\Widgets\EmailSecondaryWidget::class,
        'option'             => \App\Http\Widgets\OptionWidget::class,
        'reservation'        => \App\Http\Widgets\ReservationWidget::class,
        'FilmInfo'           => \App\Http\Widgets\FilmInfoWidget::class,
        'menuCategory'       => \App\Http\Widgets\MenuCategoryWidget::class,
        'menuTopMiddleColum' => \App\Http\Widgets\MenuTopMiddleColum::class,
        'menuFooter'         => \App\Http\Widgets\MenuFooterWidget::class,
        'menuWidget'         => \App\Http\Widgets\MenuWidget::class,
        'mainRoute'          => \App\Http\Widgets\RandomRouteWidget::class,
        'lastEventSidebar'   => \App\Http\Widgets\LastEventsSidebarWidget::class,
        'shopHeaderMiddle'   => \App\Http\Widgets\ShopHeaderMiddleWidget::class,
    ],
];
