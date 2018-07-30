<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Available locales
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


];