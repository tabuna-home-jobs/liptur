<?php

return [

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
        'shop-header-mobile' => 'Верхнее меню магазин (мобильная версия)',
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

];
