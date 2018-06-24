<?php

return [
  'anhskohbo/no-captcha' => [
    'providers' => [
      0 => 'Anhskohbo\\NoCaptcha\\NoCaptchaServiceProvider',
    ],
    'aliases' => [
      'NoCaptcha' => 'Anhskohbo\\NoCaptcha\\Facades\\NoCaptcha',
    ],
  ],
  'cartalyst/tags' => [
    'providers' => [
      0 => 'Cartalyst\\Tags\\TagsServiceProvider',
    ],
  ],
  'cviebrock/eloquent-sluggable' => [
    'providers' => [
      0 => 'Cviebrock\\EloquentSluggable\\ServiceProvider',
    ],
  ],
  'fideloper/proxy' => [
    'providers' => [
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ],
  ],
  'intervention/image' => [
    'providers' => [
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ],
    'aliases' => [
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ],
  ],
  'jenssegers/date' => [
    'providers' => [
      0 => 'Jenssegers\\Date\\DateServiceProvider',
    ],
    'aliases' => [
      'Date' => 'Jenssegers\\Date\\Date',
    ],
  ],
  'laravel/scout' => [
    'providers' => [
      0 => 'Laravel\\Scout\\ScoutServiceProvider',
    ],
  ],
  'laravel/socialite' => [
    'providers' => [
      0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
    ],
    'aliases' => [
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ],
  ],
  'laravel/tinker' => [
    'providers' => [
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ],
  ],
  'mcamara/laravel-localization' => [
    'providers' => [
      0 => 'Mcamara\\LaravelLocalization\\LaravelLocalizationServiceProvider',
    ],
    'aliases' => [
      'LaravelLocalization' => 'Mcamara\\LaravelLocalization\\Facades\\LaravelLocalization',
    ],
  ],
  'nunomaduro/collision' => [
    'providers' => [
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ],
  ],
  'orchid/platform' => [
    'providers' => [
      0 => 'Orchid\\Platform\\Providers\\FoundationServiceProvider',
    ],
    'aliases' => [
      'Dashboard' => 'Orchid\\Platform\\Facades\\Dashboard',
    ],
  ],
  'roumen/feed' => [
    'providers' => [
      0 => 'Roumen\\Feed\\FeedServiceProvider',
    ],
    'aliases' => [
      'Feed' => 'Roumen\\Feed\\Feed',
    ],
  ],
  'watson/active' => [
    'providers' => [
      0 => 'Watson\\Active\\ActiveServiceProvider',
    ],
    'aliases' => [
      'Active' => 'Watson\\Watson\\Facades\\Active',
    ],
  ],
];
