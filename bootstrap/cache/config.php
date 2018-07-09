<?php return array (
  'active' => 
  array (
    'class' => 'active',
  ),
  'app' => 
  array (
    'name' => 'Липецкий туристический портал',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://shop.liptur.loc:8000',
    'timezone' => 'Europe/Moscow',
    'locale' => 'ru',
    'fallback_locale' => 'en',
    'key' => 'base64:uuBwLSI8Hx7m/L4Syp6p5VL14DZadJSICiICJctjvz4=',
    'cipher' => 'AES-256-CBC',
    'log' => 'daily',
    'log_level' => 'debug',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Anhskohbo\\NoCaptcha\\NoCaptchaServiceProvider',
      23 => 'Orchid\\Platform\\Providers\\FoundationServiceProvider',
      24 => 'App\\Providers\\AppServiceProvider',
      25 => 'App\\Providers\\AuthServiceProvider',
      26 => 'App\\Providers\\EventServiceProvider',
      27 => 'App\\Providers\\RouteServiceProvider',
      28 => 'Mcamara\\LaravelLocalization\\LaravelLocalizationServiceProvider',
      29 => 'Roumen\\Feed\\FeedServiceProvider',
      30 => 'Conner\\Likeable\\LikeableServiceProvider',
      31 => 'willvincent\\Rateable\\RateableServiceProvider',
      32 => 'Jenssegers\\Date\\DateServiceProvider',
      33 => 'Gloudemans\\Shoppingcart\\ShoppingcartServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Localization' => 'Mcamara\\LaravelLocalization\\Facades\\LaravelLocalization',
      'Feed' => 'Roumen\\Feed\\Feed',
      'Date' => 'Jenssegers\\Date\\Date',
      'NoCaptcha' => 'Anhskohbo\\NoCaptcha\\Facades\\NoCaptcha',
      'Cart' => 'Gloudemans\\Shoppingcart\\Facades\\Cart',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Core\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/home/vagrant/code/shop.liptur.loc/storage/framework/cache',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'liptur',
  ),
  'captcha' => 
  array (
    'secret' => '6Ld9zF4UAAAAAJ7j4iCNGyFX3oYxvl19I1zYmPNn',
    'sitekey' => '6Ld9zF4UAAAAAB4WwU72PSW9WA4ElEZlCiy_1Out',
    'options' => 
    array (
      'timeout' => 2.0,
    ),
  ),
  'cart' => 
  array (
    'tax' => 0,
    'database' => 
    array (
      'connection' => NULL,
      'table' => 'shoppingcart',
    ),
    'destroy_on_logout' => false,
    'format' => 
    array (
      'decimals' => 0,
      'decimal_point' => '.',
      'thousand_seperator' => ' ',
    ),
  ),
  'category' => 
  array (
    'leisure' => 
    array (
      'category' => 
      array (
        'sports' => 'Спортивный',
        'entertaining' => 'Развлекательный',
        'informative' => 'Познавательный',
      ),
    ),
    'recration-center' => 
    array (
      'category' => 
      array (
        'bases-of-rest' => 'Базы отдыха',
        'guest-houses' => 'Гостевые дома',
      ),
    ),
    'exhibitions' => 
    array (
      'category' => 
      array (
        'artistic' => 'Художественная',
        'literary' => 'Литературная',
        'technical' => 'Техническая',
        'photo' => 'Фото',
        'orthodox' => 'Православная',
        'plants-and-animals' => 'Растения и животные',
        'branch' => 'Отраслевая',
      ),
    ),
    'gastronomy' => 
    array (
      'category' => 
      array (
        'restaurants' => 'Рестораны',
        'cafe' => 'Кафе',
        'bars' => 'Бары',
        'tastings' => 'Дегустации',
        'pub' => 'Пабы',
        'fast-food' => 'Фаст фуд',
        'night-club' => 'Ночные клубы',
        'pizzerias' => 'Пиццерии',
      ),
      'kitchens' => 
      array (
        'russian' => 'Русская',
        'european' => 'Европейская',
        'italian' => 'Итальянская',
        'caucasian' => 'Кавказская',
        'french' => 'Французская',
        'uzbek' => 'Узбекская',
        'ukrainian' => 'Украинская',
        'japanese' => 'Японская',
      ),
    ),
    'hostel' => 
    array (
      'category' => 
      array (
        'hotel' => 'Гостиница',
        'motel' => 'Мотель',
        'hostel' => 'Хостел',
        'mini-hotel' => 'Мини-гостиница',
        'guest-house' => 'Гостевой дом',
        'other' => 'Другие предложения',
      ),
    ),
    'agencie' => 
    array (
      'category' => 
      array (
        'the-offer-of-tour-operators' => 'Туроператоров',
        'the-offer-of-travel-agencies' => 'Турагентств',
      ),
    ),
  ),
  'clockwork' => 
  array (
    'enable' => NULL,
    'web' => true,
    'collect_data_always' => false,
    'storage' => 'files',
    'storage_files_path' => '/home/vagrant/code/shop.liptur.loc/storage/clockwork',
    'storage_sql_database' => '/home/vagrant/code/shop.liptur.loc/storage/clockwork.sqlite',
    'storage_sql_table' => 'clockwork',
    'storage_expiration' => 10080,
    'filter' => 
    array (
      0 => 'cacheQueries',
      1 => 'routes',
      2 => 'viewsData',
    ),
    'filter_uris' => 
    array (
      0 => '/__clockwork/.*',
    ),
    'ignored_events' => 
    array (
    ),
    'register_helpers' => true,
    'headers' => 
    array (
    ),
    'server_timing' => 10,
  ),
  'compile' => 
  array (
    'files' => 
    array (
    ),
    'providers' => 
    array (
    ),
  ),
  'content' => 
  array (
    'install' => true,
    'auth' => 
    array (
      'display' => false,
      'image' => '/orchid/img/background.jpg',
    ),
    'pages' => 
    array (
      0 => 'App\\Core\\Behaviors\\Single\\AboutPage',
    ),
    'types' => 
    array (
      0 => 'App\\Core\\Behaviors\\Many\\NewsType',
      1 => 'App\\Core\\Behaviors\\Many\\DocsType',
      2 => 'App\\Core\\Behaviors\\Many\\PressType',
      3 => 'App\\Core\\Behaviors\\Many\\ContactType',
      4 => 'App\\Core\\Behaviors\\Many\\CarouselType',
      5 => 'App\\Core\\Behaviors\\Many\\SecondaryCarouselType',
      6 => 'App\\Core\\Behaviors\\Many\\InfoType',
      7 => 'App\\Core\\Behaviors\\Many\\InvestorType',
      8 => 'App\\Core\\Behaviors\\Many\\LeisureType',
      9 => 'App\\Core\\Behaviors\\Many\\RecreationCenterType',
      10 => 'App\\Core\\Behaviors\\Many\\ExhibitionsType',
      11 => 'App\\Core\\Behaviors\\Many\\RestaurantsType',
      12 => 'App\\Core\\Behaviors\\Many\\HotelsType',
      13 => 'App\\Core\\Behaviors\\Many\\ChildrenRestType',
      14 => 'App\\Core\\Behaviors\\Many\\MonumentsType',
      15 => 'App\\Core\\Behaviors\\Many\\ReservesType',
      16 => 'App\\Core\\Behaviors\\Many\\PeopleType',
      17 => 'App\\Core\\Behaviors\\Many\\GuidesType',
      18 => 'App\\Core\\Behaviors\\Many\\CinemaType',
      19 => 'App\\Core\\Behaviors\\Many\\ContestType',
      20 => 'App\\Core\\Behaviors\\Many\\ConcertsType',
      21 => 'App\\Core\\Behaviors\\Many\\MuseumsType',
      22 => 'App\\Core\\Behaviors\\Many\\HuntingType',
      23 => 'App\\Core\\Behaviors\\Many\\ParksType',
      24 => 'App\\Core\\Behaviors\\Many\\BeachType',
      25 => 'App\\Core\\Behaviors\\Many\\ShrinesType',
      26 => 'App\\Core\\Behaviors\\Many\\CenterType',
      27 => 'App\\Core\\Behaviors\\Many\\FishingType',
      28 => 'App\\Core\\Behaviors\\Many\\SanatoriumType',
      29 => 'App\\Core\\Behaviors\\Many\\CompetitionType',
      30 => 'App\\Core\\Behaviors\\Many\\GiftCraftsType',
      31 => 'App\\Core\\Behaviors\\Many\\ArtsAndRecreation',
      32 => 'App\\Core\\Behaviors\\Many\\AgencieType',
      33 => 'App\\Core\\Behaviors\\Many\\GrangesType',
      34 => 'App\\Core\\Behaviors\\Many\\FestivalsType',
      35 => 'App\\Core\\Behaviors\\Many\\RouteType',
      36 => 'App\\Core\\Behaviors\\Many\\BankType',
      37 => 'App\\Core\\Behaviors\\Many\\ATMType',
      38 => 'App\\Core\\Behaviors\\Many\\ExchangeType',
      39 => 'App\\Core\\Behaviors\\Many\\RefillType',
      40 => 'App\\Core\\Behaviors\\Many\\AirportType',
      41 => 'App\\Core\\Behaviors\\Many\\BusStationType',
      42 => 'App\\Core\\Behaviors\\Many\\RailwayType',
      43 => 'App\\Core\\Behaviors\\Many\\TaxiType',
      44 => 'App\\Core\\Behaviors\\Many\\TourOperatorsType',
      45 => 'App\\Core\\Behaviors\\Many\\GalleryType',
      46 => 'App\\Core\\Behaviors\\Many\\FilmType',
      47 => 'App\\Core\\Behaviors\\Many\\EventCalendarType',
      48 => 'App\\Core\\Behaviors\\Many\\TourType',
    ),
    'fields' => 
    array (
      'textarea' => 'Orchid\\Fields\\TextAreaField',
      'input' => 'Orchid\\Fields\\InputField',
      'tags' => 'Orchid\\Fields\\TagsField',
      'robot' => 'Orchid\\Fields\\RobotField',
      'place' => 'Orchid\\Fields\\PlaceField',
      'datetime' => 'Orchid\\Fields\\DateTimerField',
      'checkbox' => 'Orchid\\Fields\\CheckBoxField',
      'path' => 'Orchid\\Fields\\PathField',
      'code' => 'Orchid\\Fields\\CodeField',
      'wysiwyg' => 'Orchid\\Fields\\SummernoteField',
      'region' => 'App\\Fields\\RegionField',
    ),
    'menu' => 
    array (
      'header-middle' => 'Верхнее меню',
      'footer' => 'Нижние меню',
    ),
    'images' => 
    array (
      'low' => 
      array (
        'width' => '50',
        'height' => '50',
        'quality' => '50',
      ),
      'medium' => 
      array (
        'width' => '600',
        'height' => '300',
        'quality' => '75',
      ),
      'high' => 
      array (
        'width' => '1000',
        'height' => '500',
        'quality' => '95',
      ),
    ),
    'locales' => 
    array (
      'ru' => 
      array (
        'name' => 'Russian',
        'script' => 'Cyrl',
        'dir' => 'ltr',
        'native' => 'Русский',
        'regional' => 'ru_RU',
        'required' => true,
      ),
      'en' => 
      array (
        'name' => 'English',
        'script' => 'Latn',
        'dir' => 'ltr',
        'native' => 'English',
        'regional' => 'en_GB',
        'required' => false,
      ),
    ),
    'advertising' => 
    array (
      'top' => 'Верхний баннер',
      'main-left' => 'Главный левый баннер',
      'main-right' => 'Главный правый баннер',
      'side' => 'Боковой баннер',
      'social' => 'Социальные сети',
      'footer' => 'Подвал баннера',
      'investor' => 'Инвесторы баннера',
    ),
    'attachment' => 
    array (
      'image' => 
      array (
        0 => 'png',
        1 => 'jpg',
        2 => 'jpeg',
        3 => 'gif',
      ),
      'video' => 
      array (
        0 => 'mp4',
        1 => 'mkv',
      ),
      'docs' => 
      array (
        0 => 'doc',
        1 => 'docx',
        2 => 'pdf',
        3 => 'xls',
        4 => 'xlsx',
        5 => 'xml',
        6 => 'txt',
        7 => 'zip',
        8 => 'rar',
        9 => 'svg',
        10 => 'ppt',
        11 => 'pptx',
      ),
    ),
  ),
  'database' => 
  array (
    'fetch' => 5,
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'lipturShop',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => 'LOCALHOST',
        'port' => '3306',
        'database' => 'lipturShop',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
        'modes' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => 'LOCALHOST',
        'port' => '3306',
        'database' => 'lipturShop',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'cluster' => false,
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/home/vagrant/code/shop.liptur.loc/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/home/vagrant/code/shop.liptur.loc/storage/app/public',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => 'your-key',
        'secret' => 'your-secret',
        'region' => 'your-region',
        'bucket' => 'your-bucket',
      ),
    ),
  ),
  'htmlmin' => 
  array (
    'blade' => false,
    'force' => false,
  ),
  'icon' => 
  array (
    'attributes' => 
    array (
      'icon-lip-live-music' => 'Живая музыка',
      'icon-lip-music' => 'Музыка',
      'icon-lip-american-football' => 'Американский футбол',
      'icon-lip-boxing' => 'Бокс',
      'icon-lip-bowling' => 'Боулинг',
      'icon-lip-stadium' => 'Стадион',
      'icon-lip-rapier' => 'Рапиры',
      'icon-lip-billiards' => 'Бильярд',
      'icon-lip-chess' => 'Шахматы',
      'icon-lip-volleyball' => 'Волейбол',
      'icon-lip-quad-bike' => 'Квадроцикл',
      'icon-lip-refill' => 'Заправка',
      'icon-lip-dolphinarium' => 'Дельфинарий',
      'icon-lip-snowmobile' => 'Снегоход',
      'icon-lip-hat' => 'Шляпа',
      'icon-lip-scooter' => 'Скутер',
      'icon-lip-skiing' => 'Лыжи',
      'icon-lip-dinner' => 'Обед',
      'icon-lip-towels' => 'Вешалка',
      'icon-lip-tennis' => 'теннис',
      'icon-lip-embroidery' => 'Вышивка',
      'icon-lip-backpack' => 'Рюкзак',
      'icon-lip-boat-trip' => 'Водная прогулка',
      'icon-lip-inflatable-boat' => 'Надувная лодка',
      'icon-lip-snowboard' => 'Сноуборд',
      'icon-lip-cableway' => 'Канатная дорого',
      'icon-lip-mountains' => 'Горы',
      'icon-lip-aqualung' => 'Акваланг',
      'icon-lip-balloon' => 'Воздушный шар',
      'icon-lip-tickets' => 'Билеты',
      'icon-lip-cocktail' => 'Коктейль',
      'icon-lip-run-baggage' => 'Тележка для багажа',
      'icon-lip-bike' => 'Велосипед',
      'icon-lip-map' => 'Карта',
      'icon-lip-table-tennis' => 'Настольный теннис',
      'icon-lip-passport' => 'Паспорт',
      'icon-lip-sailing-ship' => 'Парусная лодка',
      'icon-lip-key' => 'Ключ',
      'icon-lip-lunch-room' => 'Обеды в номер',
      'icon-lip-helicopter' => 'Вертолёт',
      'icon-lip-baggage' => 'Багаж',
      'icon-lip-masquerade' => 'Маскарад',
      'icon-lip-safe' => 'Сейф',
      'icon-lip-recliner' => 'Шезлонг',
      'icon-lip-train' => 'Поезд',
      'icon-lip-tent' => 'Палатка',
      'icon-lip-sandals' => 'Сандалии',
      'icon-lip-wigwam' => 'Виг-вам',
      'icon-lip-scuba-suit' => 'Водный костюм',
      'icon-lip-beach-cocktail' => 'Пляжный коктейль',
      'icon-lip-kayak' => 'Байдарка',
      'icon-lip-pizza' => 'Пицца',
      'icon-lip-burger' => 'Бургер',
      'icon-lip-rolls' => 'Ролы',
      'icon-lip-rice' => 'Рис',
      'icon-lip-soup' => 'Супы',
      'icon-lip-cooking' => 'Варка',
      'icon-lip-fish' => 'Рыба',
      'icon-lip-tea' => 'Чай',
      'icon-lip-frankfurters' => 'Немецкие сосиски',
      'icon-lip-administration' => 'Администрация',
      'icon-lip-church' => 'Церковь',
      'icon-lip-ferris-wheel' => 'Колесо обозрения',
      'icon-lip-hotel' => 'Отель',
      'icon-lip-summer-cafe' => 'Летнее кафе',
      'icon-lip-Coffee' => 'Кофе',
      'icon-lip-disabled' => 'Доступная среда',
      'icon-lip-champagne' => 'Шампанское',
      'icon-lip-guide' => 'Гид',
      'icon-lip-dog' => 'С животными',
      'icon-lip-building' => 'Строение',
      'icon-lip-park' => 'Парк',
      'icon-lip-bus' => 'Автобус',
      'icon-lip-taxi' => 'Такси',
      'icon-lip-parking' => 'Парковка',
      'icon-lip-afoot' => 'Пешком',
      'icon-lip-videography' => 'Видеосъемка',
      'icon-lip-photo' => 'Фотография',
      'icon-lip-credit-card' => 'Безналичный расчёт',
      'icon-lip-currency-exchange' => 'Обмен валюты',
      'icon-lip-temple' => 'Храм',
      'icon-lip-no-photo' => 'Фото запрещено',
      'icon-lip-no-smoking' => 'Не курить',
      'icon-lip-shops' => 'Магазин',
      'icon-lip-purchases' => 'Шопинг',
      'icon-lip-time' => 'Время',
      'icon-lip-wifi' => 'Wi-Fi',
      'icon-lip-list' => 'По списку',
      'icon-lip-support' => 'Помощь',
      'icon-lip-pass' => 'Требуется подтверждение личности',
      'icon-lip-meeting' => 'Митинг',
      'icon-lip-pool' => 'Бассейн',
      'icon-lip-swim' => 'Плавать',
      'icon-lip-extra-bed' => 'Дополнительная кровать',
      'icon-lip-double-bed' => 'Двуспальная кровать',
      'icon-lip-twin-beds' => 'Раздельные кровати',
      'icon-lip-hostel' => 'Хостел',
      'icon-lip-tv' => 'Телевизор',
      'icon-lip-gym' => 'Спортзал',
      'icon-lip-shower' => 'Душ',
      'icon-lip-aircraft' => 'Самолёт',
      'icon-lip-palm' => 'Пальмы',
      'icon-lip-abike' => 'Велосипед',
    ),
    'map' => 
    array (
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'laravellocalization' => 
  array (
    'supportedLocales' => 
    array (
      'en' => 
      array (
        'name' => 'English',
        'script' => 'Latn',
        'native' => 'English',
        'regional' => 'en_GB',
      ),
      'ru' => 
      array (
        'name' => 'Russian',
        'script' => 'Cyrl',
        'native' => 'русский',
        'regional' => 'ru_RU',
      ),
    ),
    'useAcceptLanguageHeader' => true,
    'hideDefaultLocaleInURL' => false,
    'localesOrder' => 
    array (
    ),
  ),
  'link' => 
  array (
    'phone' => '',
    'email' => 'tourclaster@liptur.ru',
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.yandex.ru',
    'port' => '465',
    'from' => 
    array (
      'address' => 'robot@octavian48.ru',
      'name' => 'Липецкий туристический портал',
    ),
    'encryption' => 'ssl',
    'username' => 'robot@octavian48.ru',
    'password' => 'MUiobDEpLudSJQWbwEvHDaNx3RtQxmZY',
    'sendmail' => '/usr/sbin/sendmail -bs',
  ),
  'platform' => 
  array (
    'headless' => false,
    'domain' => 'shop.liptur.loc',
    'prefix' => 'dashboard',
    'middleware' => 
    array (
      'public' => 
      array (
        0 => 'web',
      ),
      'private' => 
      array (
        0 => 'web',
        1 => 'dashboard',
      ),
    ),
    'auth' => 
    array (
      'display' => true,
      'image' => '/orchid/img/background.jpg',
      'slogan' => 'dashboard::auth/account.slogan',
    ),
    'locales' => 
    array (
      'ru' => 
      array (
        'name' => 'Russian',
        'script' => 'Cyrl',
        'dir' => 'ltr',
        'native' => 'Русский',
        'regional' => 'ru_RU',
        'required' => true,
      ),
      'en' => 
      array (
        'name' => 'English',
        'script' => 'Latn',
        'dir' => 'ltr',
        'native' => 'English',
        'regional' => 'en_GB',
        'required' => false,
      ),
    ),
    'fields' => 
    array (
      'textarea' => 'Orchid\\Platform\\Fields\\Types\\TextAreaField',
      'input' => 'Orchid\\Platform\\Fields\\Types\\InputField',
      'list' => 'Orchid\\Platform\\Fields\\Types\\ListField',
      'tags' => 'Orchid\\Platform\\Fields\\Types\\TagsField',
      'select' => 'Orchid\\Platform\\Fields\\Types\\SelectField',
      'relationship' => 'Orchid\\Platform\\Fields\\Types\\RelationshipField',
      'place' => 'Orchid\\Platform\\Fields\\Types\\PlaceField',
      'picture' => 'Orchid\\Platform\\Fields\\Types\\PictureField',
      'datetime' => 'Orchid\\Platform\\Fields\\Types\\DateTimerField',
      'checkbox' => 'Orchid\\Platform\\Fields\\Types\\CheckBoxField',
      'code' => 'Orchid\\Platform\\Fields\\Types\\CodeField',
      'wysiwyg' => 'Orchid\\Platform\\Fields\\Types\\TinyMCEField',
      'password' => 'Orchid\\Platform\\Fields\\Types\\PasswordField',
      'markdown' => 'Orchid\\Platform\\Fields\\Types\\SimpleMDEField',
      'region' => 'App\\Fields\\RegionField',
    ),
    'single' => 
    array (
      0 => 'App\\Core\\Behaviors\\Single\\AboutPage',
      1 => 'App\\Core\\Behaviors\\Single\\TermsOfServicePage',
      2 => 'App\\Core\\Behaviors\\Single\\ShippingAndPayment',
      3 => 'App\\Core\\Behaviors\\Single\\PersonalData',
    ),
    'many' => 
    array (
      0 => 'App\\Core\\Behaviors\\Many\\NewsType',
      1 => 'App\\Core\\Behaviors\\Many\\DocsType',
      2 => 'App\\Core\\Behaviors\\Many\\PressType',
      3 => 'App\\Core\\Behaviors\\Many\\ContactType',
      4 => 'App\\Core\\Behaviors\\Many\\CarouselType',
      5 => 'App\\Core\\Behaviors\\Many\\SecondaryCarouselType',
      6 => 'App\\Core\\Behaviors\\Many\\InfoType',
      7 => 'App\\Core\\Behaviors\\Many\\InvestorType',
      8 => 'App\\Core\\Behaviors\\Many\\LeisureType',
      9 => 'App\\Core\\Behaviors\\Many\\RecreationCenterType',
      10 => 'App\\Core\\Behaviors\\Many\\ExhibitionsType',
      11 => 'App\\Core\\Behaviors\\Many\\RestaurantsType',
      12 => 'App\\Core\\Behaviors\\Many\\HotelsType',
      13 => 'App\\Core\\Behaviors\\Many\\ChildrenRestType',
      14 => 'App\\Core\\Behaviors\\Many\\MonumentsType',
      15 => 'App\\Core\\Behaviors\\Many\\ReservesType',
      16 => 'App\\Core\\Behaviors\\Many\\PeopleType',
      17 => 'App\\Core\\Behaviors\\Many\\GuidesType',
      18 => 'App\\Core\\Behaviors\\Many\\CinemaType',
      19 => 'App\\Core\\Behaviors\\Many\\ContestType',
      20 => 'App\\Core\\Behaviors\\Many\\ConcertsType',
      21 => 'App\\Core\\Behaviors\\Many\\MuseumsType',
      22 => 'App\\Core\\Behaviors\\Many\\HuntingType',
      23 => 'App\\Core\\Behaviors\\Many\\ParksType',
      24 => 'App\\Core\\Behaviors\\Many\\BeachType',
      25 => 'App\\Core\\Behaviors\\Many\\ShrinesType',
      26 => 'App\\Core\\Behaviors\\Many\\CenterType',
      27 => 'App\\Core\\Behaviors\\Many\\FishingType',
      28 => 'App\\Core\\Behaviors\\Many\\SanatoriumType',
      29 => 'App\\Core\\Behaviors\\Many\\CompetitionType',
      30 => 'App\\Core\\Behaviors\\Many\\GiftCraftsType',
      31 => 'App\\Core\\Behaviors\\Many\\ArtsAndRecreation',
      32 => 'App\\Core\\Behaviors\\Many\\AgencieType',
      33 => 'App\\Core\\Behaviors\\Many\\GrangesType',
      34 => 'App\\Core\\Behaviors\\Many\\FestivalsType',
      35 => 'App\\Core\\Behaviors\\Many\\RouteType',
      36 => 'App\\Core\\Behaviors\\Many\\BankType',
      37 => 'App\\Core\\Behaviors\\Many\\ATMType',
      38 => 'App\\Core\\Behaviors\\Many\\ExchangeType',
      39 => 'App\\Core\\Behaviors\\Many\\RefillType',
      40 => 'App\\Core\\Behaviors\\Many\\AirportType',
      41 => 'App\\Core\\Behaviors\\Many\\BusStationType',
      42 => 'App\\Core\\Behaviors\\Many\\RailwayType',
      43 => 'App\\Core\\Behaviors\\Many\\TaxiType',
      44 => 'App\\Core\\Behaviors\\Many\\TourOperatorsType',
      45 => 'App\\Core\\Behaviors\\Many\\GalleryType',
      46 => 'App\\Core\\Behaviors\\Many\\FilmType',
      47 => 'App\\Core\\Behaviors\\Many\\EventCalendarType',
      48 => 'App\\Core\\Behaviors\\Many\\TourType',
      49 => 'App\\Core\\Behaviors\\Many\\ProductType',
      50 => 'App\\Core\\Behaviors\\Many\\ShopSliderType',
    ),
    'common' => 
    array (
      'user' => 'Orchid\\Platform\\Behaviors\\Base\\UserBase',
      'category' => 'Orchid\\Platform\\Behaviors\\Base\\CategoryBase',
    ),
    'menu' => 
    array (
      'header-middle' => 'Верхнее меню',
      'footer' => 'Нижние меню',
      'shop-header' => 'Верхнее меню магазин',
      'shop-header-middle' => 'Верхнее меню магазин (Вторая строка)',
      'shop-footer' => 'Нижние меню магазин',
    ),
    'disks' => 
    array (
      'media' => 'public',
    ),
    'images' => 
    array (
      'low' => 
      array (
        'width' => '50',
        'height' => '50',
        'quality' => '50',
      ),
      'medium' => 
      array (
        'width' => '600',
        'height' => '300',
        'quality' => '75',
      ),
      'high' => 
      array (
        'width' => '1000',
        'height' => '500',
        'quality' => '95',
      ),
    ),
    'attachment' => 
    array (
      'image' => 
      array (
        0 => 'png',
        1 => 'jpg',
        2 => 'jpeg',
        3 => 'gif',
      ),
      'video' => 
      array (
        0 => 'mp4',
        1 => 'mkv',
      ),
      'docs' => 
      array (
        0 => 'doc',
        1 => 'docx',
        2 => 'pdf',
        3 => 'xls',
        4 => 'xlsx',
        5 => 'xml',
        6 => 'txt',
        7 => 'zip',
        8 => 'rar',
        9 => 'svg',
        10 => 'ppt',
        11 => 'pptx',
      ),
    ),
    'main_widgets' => 
    array (
      0 => 'Orchid\\Platform\\Http\\Widgets\\UpdateWidget',
    ),
    'resource' => 
    array (
      'stylesheets' => 
      array (
      ),
      'scripts' => 
      array (
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'region' => 
  array (
    'volovskiy' => 
    array (
      'name' => 'Воловский район',
      'sort' => 10,
    ),
    'gryazi' => 
    array (
      'name' => 'Грязинский район',
      'sort' => 10,
    ),
    'dankovsky' => 
    array (
      'name' => 'Данковский район',
      'sort' => 10,
    ),
    'bobrinskii' => 
    array (
      'name' => 'Добринский район',
      'sort' => 10,
    ),
    'bobrovskij' => 
    array (
      'name' => 'Добровский район',
      'sort' => 10,
    ),
    'bolgorukovsky' => 
    array (
      'name' => 'Долгоруковский район',
      'sort' => 10,
    ),
    'eletskii' => 
    array (
      'name' => 'Елец',
      'sort' => 3,
    ),
    'zadonsk' => 
    array (
      'name' => 'Задонск',
      'sort' => 2,
    ),
    'izmalkovsky' => 
    array (
      'name' => 'Измалковский район',
      'sort' => 10,
    ),
    'krasninskoe' => 
    array (
      'name' => 'Краснинский район',
      'sort' => 10,
    ),
    'lebedyansky' => 
    array (
      'name' => 'Лебедянский район',
      'sort' => 10,
    ),
    'levTolstoy' => 
    array (
      'name' => 'Лев-Толстовский район',
      'sort' => 10,
    ),
    'lipetsk' => 
    array (
      'name' => 'Липецк',
      'sort' => 1,
    ),
    'stanovlyansky' => 
    array (
      'name' => 'Становлянский район',
      'sort' => 10,
    ),
    'terbunsky' => 
    array (
      'name' => 'Тербунский район',
      'sort' => 10,
    ),
    'usman' => 
    array (
      'name' => 'Усманский район',
      'sort' => 10,
    ),
    'khlevensky' => 
    array (
      'name' => 'Хлевенский район',
      'sort' => 10,
    ),
    'chaplyginsky' => 
    array (
      'name' => 'Чаплыгинский район',
      'sort' => 10,
    ),
    'tambov' => 
    array (
      'name' => 'Тамбовский район',
      'sort' => 50,
    ),
    'eletskii_area' => 
    array (
      'name' => 'Елецкий район',
      'sort' => 6,
    ),
    'zadonsk_area' => 
    array (
      'name' => 'Задонский район',
      'sort' => 5,
    ),
    'lipetsk_area' => 
    array (
      'name' => 'Липецкий район',
      'sort' => 4,
    ),
  ),
  'scout' => 
  array (
    'driver' => 'null',
    'prefix' => 'octavian',
    'queue' => true,
    'algolia' => 
    array (
      'id' => '',
      'secret' => '',
    ),
    'elasticsearch' => 
    array (
      'index' => 'liptur',
      'version' => '5.0.0',
      'config' => 
      array (
        'hosts' => 
        array (
          0 => 'localhost',
        ),
      ),
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
    'google-maps' => 
    array (
      'key' => 'AIzaSyB_9M5O7t88YovZa2mePQ9VX4f79c86cqg',
    ),
    'openweathermap' => 
    array (
      'q' => 'Lipetsk',
      'key' => 'e63a446c64e2ed9c50d202d36d17c023',
    ),
    'google' => 
    array (
      'analytics' => 
      array (
        'key' => '34148171340-p93lfd3vj04p62jktae0airf0u7n3e1p.apps.googleusercontent.com',
      ),
      'maps' => 
      array (
        'key' => 'AIzaSyB_9M5O7t88YovZa2mePQ9VX4f79c86cqg',
      ),
      'recaptcha' => 
      array (
        'sitekey' => '6Ld9zF4UAAAAAB4WwU72PSW9WA4ElEZlCiy_1Out',
      ),
    ),
    'rambler' => 
    array (
      'use_proxy' => false,
      'api_key' => '3c9f4e3a-30ae-40a9-959e-edddbef22e37',
      'buy_widget_key' => '004224e0-2c5e-4fef-bcc6-05753405cd0a',
      'city_name' => 'липецк',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => 920,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/home/vagrant/code/shop.liptur.loc/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'liptur_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
  ),
  'sluggable' => 
  array (
    'source' => NULL,
    'maxLength' => NULL,
    'maxLengthKeepWords' => true,
    'method' => NULL,
    'separator' => '-',
    'unique' => true,
    'uniqueSuffix' => NULL,
    'includeTrashed' => false,
    'reserved' => NULL,
    'onUpdate' => false,
  ),
  'tinker' => 
  array (
    'dont_alias' => 
    array (
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/home/vagrant/code/shop.liptur.loc/resources/views',
    ),
    'compiled' => '/home/vagrant/code/shop.liptur.loc/storage/framework/views',
  ),
  'widget' => 
  array (
    'widgets' => 
    array (
      'advertising' => 'App\\Http\\Widgets\\AdvertisingWidget',
      'mainNews' => 'App\\Http\\Widgets\\MainNewsWidget',
      'mainEvents' => 'App\\Http\\Widgets\\MainEventsWidget',
      'mainCinema' => 'App\\Http\\Widgets\\MainCinemaWidget',
      'mainCoursel' => 'App\\Http\\Widgets\\MainCarouselWidget',
      'mainCategory' => 'App\\Http\\Widgets\\MainCategoryWidget',
      'secondarySlider' => 'App\\Http\\Widgets\\SecondarySlider',
      'subscription' => 'App\\Http\\Widgets\\EmailSubscription',
      'EmailSecondary' => 'App\\Http\\Widgets\\EmailSecondaryWidget',
      'option' => 'App\\Http\\Widgets\\OptionWidget',
      'reservation' => 'App\\Http\\Widgets\\ReservationWidget',
      'FilmInfo' => 'App\\Http\\Widgets\\FilmInfoWidget',
      'menuCategory' => 'App\\Http\\Widgets\\MenuCategoryWidget',
      'menuTopMiddleColum' => 'App\\Http\\Widgets\\MenuTopMiddleColum',
      'menuFooter' => 'App\\Http\\Widgets\\MenuFooterWidget',
      'menuWidget' => 'App\\Http\\Widgets\\MenuWidget',
      'mainRoute' => 'App\\Http\\Widgets\\RandomRouteWidget',
      'lastEventSidebar' => 'App\\Http\\Widgets\\LastEventsSidebarWidget',
      'shopHeaderMiddle' => 'App\\Http\\Widgets\\ShopHeaderMiddleWidget',
    ),
  ),
);
