<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Headless
    |--------------------------------------------------------------------------
    |
    | If the dashboard is turned true, then all routes stop working,
    | this is required if you are building your control panel or you do not need it
    |
    */

    'headless' => false,

    /*
    |--------------------------------------------------------------------------
    | Sub-Domain Routing
    |--------------------------------------------------------------------------
    |
    | You can use the admin panel on a separate subdomain.
    | For example: 'admin.example.com'
    |
    */

    'domain' => env('DASHBOARD_DOMAIN', dashboard_domain()),

    /*
    |--------------------------------------------------------------------------
    | Route Prefixes
    |--------------------------------------------------------------------------
    |
    | This prefix method can be used for the prefix of each
    | route in the administration panel. For example, you can change to 'admin'
    |
    */

    'prefix' => env('DASHBOARD_PREFIX', 'dashboard'),

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | Provide a convenient mechanism for filtering HTTP
    | requests entering your application.
    |
    */

    'middleware' => [
        'public'  => ['web'],
        'private' => ['web', 'dashboard'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    |
    | Available settings
    |
    */

    'auth' => [
        'display' => true,
        'image'   => '/orchid/img/background.jpg',
        'slogan'  => 'dashboard::auth/account.slogan',
    ],

    /*
    |--------------------------------------------------------------------------
    | Locales
    |--------------------------------------------------------------------------
    |
    | Localization of records
    |
    */

    'locales' => [
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
    | Available fields to form templates
    |--------------------------------------------------------------------------
    |
    | Declared fields for user filling.
    | Be shy and add to what you need
    |
    */

    'fields' => [
        'textarea'     => Orchid\Platform\Fields\Types\TextAreaField::class,
        'input'        => Orchid\Platform\Fields\Types\InputField::class,
        'list'         => Orchid\Platform\Fields\Types\ListField::class,
        'tags'         => Orchid\Platform\Fields\Types\TagsField::class,
        'select'       => Orchid\Platform\Fields\Types\SelectField::class,
        'relationship' => Orchid\Platform\Fields\Types\RelationshipField::class,
        'place'        => Orchid\Platform\Fields\Types\PlaceField::class,
        'picture'      => Orchid\Platform\Fields\Types\PictureField::class,
        'datetime'     => Orchid\Platform\Fields\Types\DateTimerField::class,
        'checkbox'     => Orchid\Platform\Fields\Types\CheckBoxField::class,
        'code'         => Orchid\Platform\Fields\Types\CodeField::class,
        'wysiwyg'      => Orchid\Platform\Fields\Types\TinyMCEField::class,
        'password'     => Orchid\Platform\Fields\Types\PasswordField::class,
        'markdown'     => Orchid\Platform\Fields\Types\SimpleMDEField::class,
        'region'       => \App\Fields\RegionField::class,
        'arrayjson'    => \App\Fields\ArrayJsonField::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Single Behaviors
    |--------------------------------------------------------------------------
    |
    | Static pages
    |
    */

    'single' => [
        \App\Core\Behaviors\Single\AboutPage::class,
        \App\Core\Behaviors\Single\TermsOfServicePage::class,
        \App\Core\Behaviors\Single\ShippingAndPayment::class,
        \App\Core\Behaviors\Single\PersonalData::class,
        \App\Core\Behaviors\Single\CarouselLinks::class,
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
    | Many Behaviors
    |--------------------------------------------------------------------------
    |
    | An abstract pattern of behavior record
    |
    */

    'many' => [

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

        //Магазин
        \App\Core\Behaviors\Many\ProductType::class,
        \App\Core\Behaviors\Many\ShopSliderType::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Common Behaviors
    |--------------------------------------------------------------------------
    */

    'common' => [
        'user'     => Orchid\Platform\Behaviors\Base\UserBase::class,
        'category' => Orchid\Platform\Behaviors\Base\CategoryBase::class,
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
        'header-middle'      => 'Верхнее меню',
        'footer'             => 'Нижние меню',
        'shop-header'        => 'Верхнее меню магазин',
        'shop-header-middle' => 'Верхнее меню магазин (Вторая строка)',
        'shop-footer'        => 'Нижние меню магазин',
    ],

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [
        'media' => 'public',
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
    | Attachment types
    |--------------------------------------------------------------------------
    |
    | Grouping attachments by file extension type
    |
    */

    'attachment' => [
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

    /*
    |--------------------------------------------------------------------------
    | Dashboard Widgets
    |--------------------------------------------------------------------------
    |
    | Widgets that will be displayed on the main screen
    |
    */

    'main_widgets' => [
        Orchid\Platform\Http\Widgets\UpdateWidget::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Dashboard Resource
    |--------------------------------------------------------------------------
    |
    | Automatically connect the stored links. For example js and css files
    |
    */

    'resource' => [
        'stylesheets' => [],
        'scripts'     => [],
    ],

];
