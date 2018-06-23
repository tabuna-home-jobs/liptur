<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Install
    |--------------------------------------------------------------------------
    |
    | Setup Activation Flag
    |
     */
    'install' => env('APP_INSTALL', false),

    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    |
    | Available settings
    |
     */
    'auth'    => [
        'display' => false,
        'image'   => '/orchid/img/background.jpg',
    ],

    /*
    |--------------------------------------------------------------------------
    | Pages
    |--------------------------------------------------------------------------
    |
    | Static pages
    |
     */

    'pages' => [
        \App\Core\Behaviors\Single\AboutPage::class,
        /*
    \App\Core\Behaviors\Single\AboutPage::class,
    \App\Core\Behaviors\Single\InvestorPage::class,
    \App\Core\Behaviors\Single\NewsPage::class,

    \App\Core\Behaviors\Single\InvestorPage::class,
    \App\Core\Behaviors\Single\NewsPage::class,
    \App\Core\Behaviors\Single\ExhibitionsPage::class,
    \App\Core\Behaviors\Single\CinemaPage::class,
    \App\Core\Behaviors\Single\ConcertsPage::class,
    \App\Core\Behaviors\Single\EventPage::class,
    \App\Core\Behaviors\Single\FestivalsPage::class,
    \App\Core\Behaviors\Single\CompetitionPage::class,
    //\App\Core\Behaviors\Single\TourPage::class, - Туры
    \App\Core\Behaviors\Single\MonumentsPage::class,
    \App\Core\Behaviors\Single\ParksPage::class,
    \App\Core\Behaviors\Single\ShrinesPage::class,
    \App\Core\Behaviors\Single\MuseumsPage::class,
    \App\Core\Behaviors\Single\CenterPage::class,
    \App\Core\Behaviors\Single\HotelsPage::class,
    \App\Core\Behaviors\Single\RestaurantsPage::class,
    \App\Core\Behaviors\Single\PeoplePage::class,
    \App\Core\Behaviors\Single\EventCalendarPage::class,
    \App\Core\Behaviors\Single\LeisurePage::class,
    \App\Core\Behaviors\Single\ReservesPage::class,
    \App\Core\Behaviors\Single\PressPage::class,
    \App\Core\Behaviors\Single\ArtsAndRecreation::class,
    \App\Core\Behaviors\Single\ContestPage::class,
    \App\Core\Behaviors\Single\GiftCraftsPage::class,
    \App\Core\Behaviors\Single\GrangesPage::class,
    \App\Core\Behaviors\Single\DocsPage::class,
    \App\Core\Behaviors\Single\BankPage::class,
    \App\Core\Behaviors\Single\ATMPage::class,
    \App\Core\Behaviors\Single\InfoPage::class,
    \App\Core\Behaviors\Single\HuntingPage::class,
    \App\Core\Behaviors\Single\ChildrenRestPage::class,
    \App\Core\Behaviors\Single\AirportPage::class,
    \App\Core\Behaviors\Single\BusStationPage::class,
    \App\Core\Behaviors\Single\BeachPage::class,
    \App\Core\Behaviors\Single\TourOperatorsPage::class,
    \App\Core\Behaviors\Single\AgenciePage::class,
    \App\Core\Behaviors\Single\FishingPage::class,
    \App\Core\Behaviors\Single\SanatoriumPage::class,
    \App\Core\Behaviors\Single\RecreationCenterPage::class,
    \App\Core\Behaviors\Single\GuidesPage::class,
    \App\Core\Behaviors\Single\ContactPage::class,
     */
    ],

    /*
    |--------------------------------------------------------------------------
    | Types
    |--------------------------------------------------------------------------
    |
    | An abstract pattern of behavior record
    |
     */

    'types'  => [

        //Общие записи
        \App\Core\Behaviors\Many\NewsType::class,
        \App\Core\Behaviors\Many\DocsType::class,
        \App\Core\Behaviors\Many\PressType::class,
        \App\Core\Behaviors\Many\ContactType::class,
        \App\Core\Behaviors\Many\CarouselType::class,
        \App\Core\Behaviors\Many\SecondaryCarouselType::class,
        \App\Core\Behaviors\Many\InfoType::class,
        \App\Core\Behaviors\Many\InvestorType::class,

        //Главные разделы
        \App\Core\Behaviors\Many\LeisureType::class,
        \App\Core\Behaviors\Many\RecreationCenterType::class,
        \App\Core\Behaviors\Many\ExhibitionsType::class,
        \App\Core\Behaviors\Many\RestaurantsType::class,
        \App\Core\Behaviors\Many\HotelsType::class,
        \App\Core\Behaviors\Many\ChildrenRestType::class,
        \App\Core\Behaviors\Many\MonumentsType::class,
        \App\Core\Behaviors\Many\ReservesType::class,
        \App\Core\Behaviors\Many\PeopleType::class,
        \App\Core\Behaviors\Many\GuidesType::class,
        \App\Core\Behaviors\Many\CinemaType::class,
        \App\Core\Behaviors\Many\ContestType::class,
        \App\Core\Behaviors\Many\ConcertsType::class,
        \App\Core\Behaviors\Many\MuseumsType::class,
        \App\Core\Behaviors\Many\HuntingType::class,
        \App\Core\Behaviors\Many\ParksType::class,
        \App\Core\Behaviors\Many\BeachType::class,
        \App\Core\Behaviors\Many\ShrinesType::class,
        \App\Core\Behaviors\Many\CenterType::class,
        \App\Core\Behaviors\Many\FishingType::class,
        \App\Core\Behaviors\Many\SanatoriumType::class,
        \App\Core\Behaviors\Many\CompetitionType::class,
        \App\Core\Behaviors\Many\GiftCraftsType::class,
        \App\Core\Behaviors\Many\ArtsAndRecreation::class,
        \App\Core\Behaviors\Many\AgencieType::class,
        \App\Core\Behaviors\Many\GrangesType::class,
        \App\Core\Behaviors\Many\FestivalsType::class,
        \App\Core\Behaviors\Many\RouteType::class,

        // Вспомогательные разделы
        \App\Core\Behaviors\Many\BankType::class,
        \App\Core\Behaviors\Many\ATMType::class,
        \App\Core\Behaviors\Many\ExchangeType::class,
        \App\Core\Behaviors\Many\RefillType::class,
        \App\Core\Behaviors\Many\AirportType::class,
        \App\Core\Behaviors\Many\BusStationType::class,
        \App\Core\Behaviors\Many\RailwayType::class,
        \App\Core\Behaviors\Many\TaxiType::class,
        \App\Core\Behaviors\Many\TourOperatorsType::class,

        //Другое
        \App\Core\Behaviors\Many\GalleryType::class,
        \App\Core\Behaviors\Many\FilmType::class,
        \App\Core\Behaviors\Many\EventCalendarType::class,

        //\App\Core\Behaviors\Many\EventType::class, - События были перенесены в фестивали
        \App\Core\Behaviors\Many\TourType::class, //- Туры

    ],

    /*
    |--------------------------------------------------------------------------
    | Available fields to form templates
    |--------------------------------------------------------------------------
    |
    | Declared fields for user filling.
    | Be shy and add to what you need
    |
     */
    'fields' => [
        'textarea' => Orchid\Fields\TextAreaField::class,
        'input'    => Orchid\Fields\InputField::class,
        'tags'     => Orchid\Fields\TagsField::class,
        'robot'    => Orchid\Fields\RobotField::class,
        'place'    => Orchid\Fields\PlaceField::class,
        'datetime' => Orchid\Fields\DateTimerField::class,
        'checkbox' => Orchid\Fields\CheckBoxField::class,
        'path'     => Orchid\Fields\PathField::class,
        'code'     => Orchid\Fields\CodeField::class,
        'wysiwyg'  => \Orchid\Fields\SummernoteField::class,
        'region'   => \App\Fields\RegionField::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Available menu
    |--------------------------------------------------------------------------
    |
    | Marked menu areas
    |
     */

    'menu' => [
        'header-middle' => 'Верхнее меню',
        'footer'        => 'Нижние меню',
    ],

    /*
    |--------------------------------------------------------------------------
    | Images
    |--------------------------------------------------------------------------
    |
    | Image processing 100x150x75
    | 100 - integer width
    | 150 - integer height
    | 75  - integer quality
    |
     */

    'images' => [
        'low'    => [
            'width'   => '50',
            'height'  => '50',
            'quality' => '50',
        ],
        'medium' => [
            'width'   => '600',
            'height'  => '300',
            'quality' => '75',
        ],
        'high'   => [
            'width'   => '1000',
            'height'  => '500',
            'quality' => '95',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Available locales
    |--------------------------------------------------------------------------
    |
    | Localization of records
    |
     */

    'locales'     => [
        'ru' => [
            'name'     => 'Russian',
            'script'   => 'Cyrl',
            'dir'      => 'ltr',
            'native'   => 'Русский',
            'regional' => 'ru_RU',
            'required' => true,
        ],

        'en' => [
            'name'     => 'English',
            'script'   => 'Latn',
            'dir'      => 'ltr',
            'native'   => 'English',
            'regional' => 'en_GB',
            'required' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Advertising areas
    |--------------------------------------------------------------------------
    |
    | Starred areas for ad units
    |
     */
    'advertising' => [
        'top'        => 'Верхний баннер',
        'main-left'  => 'Главный левый баннер',
        'main-right' => 'Главный правый баннер',
        'side'       => 'Боковой баннер',
        'social'     => 'Социальные сети',
        'footer'     => 'Подвал баннера',
        'investor'   => 'Инвесторы баннера',
    ],

    /*
    |--------------------------------------------------------------------------
    | Attachment types
    |--------------------------------------------------------------------------
    |
    | ...
    |
     */
    'attachment'  => [
        'image' => [
            'png',
            'jpg',
            'jpeg',
            'gif',
        ],
        'video' => [
            'mp4',
            'mkv',
        ],
        'docs'  => [
            'doc',
            'docx',
            'pdf',
            'xls',
            'xlsx',
            'xml',
            'txt',
            'zip',
            'rar',
            'svg',
            'ppt',
            'pptx',
        ],
    ],

];
