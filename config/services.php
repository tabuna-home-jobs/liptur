<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google-maps' => [
        'key' => env('GOOGLE_MAPS'),
    ],

    'openweathermap' => [
        'q'   => 'Lipetsk',
        'key' => env('WEATHER'),
    ],

    'google' => [
        'analytics' => [
            'key' => env('GOOGLE_ANALYTICS'),
        ],
        'maps'      => [
            'key' => env('GOOGLE_MAPS_ALT'),
        ],
        'recaptcha' => [
            'sitekey' => env('NOCAPTCHA_SITEKEY'),
        ],
    ],

    'rambler' => [
        'use_proxy'      => env('USE_PROXY', false),
        'api_key'        => env('RAMBLER_API_KEY', ''),
        'buy_widget_key' => env('RAMBLER_BUY_WIDGET_KEY', ''),
        'city_name'      => env('RAMBLER_CITY_NAME', 'липецк'),
    ],

    'cdek' => [
        'account'  => env('CDEK_ACCOUNT', ''),
        'password' => env('CDEK_PASSWORD', ''),
    ],

    'pochta' => [
        'auth' => [
            'otpravka' => [
                'key'           => env('OTPRAVKA_API_POCHTA_KEY', null),
                'token'         => env('OTPRAVKA_API_POCHTA_TOKEN', null)
            ]
        ]
    ],

    'sberbank' => [
        'token' => env('SBERBANK_TOKEN', null),
        'test' => env('SBERBANK_TEST', true)
    ]
];
