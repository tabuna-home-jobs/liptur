<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

$router->group([
    'prefix' => Localization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'carbon-localize'],
], function () {

    /*
    |--------------------------------------------------------------------------
    | Auth Routes
    |--------------------------------------------------------------------------
    |
     */
    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');
    $this->post('ulogin', 'Auth\UloginController@login');
    // Registration Routes...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');

    /*
    |--------------------------------------------------------------------------
    | News Routes
    |--------------------------------------------------------------------------
    |
     */
    $this->get('news', 'NewController@index')->name('news');
    $this->get('rss', 'NewController@rss')->name('rss');
    $this->get('news/{news}', 'NewController@show')->name('new');

    $this->post('newletter', 'SubscriptionController@store')->name('newletter');
    $this->post('helpletter', 'ContactsController@store')->name('helpletter'); //remove

    /*
    |--------------------------------------------------------------------------
    | Event Routes
    |--------------------------------------------------------------------------
    |
     */
    $this->get('calendar-event', 'Other\CalendarEvent@index')->name('calendar-event');

    /*
    |--------------------------------------------------------------------------
    | News Routes
    |--------------------------------------------------------------------------
    |
     */
    $this->get('catalog/route/{catalog}/{item}', 'RouteController@show')->name('route.item');

    $this->put('like/{item}', 'Other\LikeController@update')->name('like');
    $this->post('rating/{item}', 'Other\RatingController@store')->name('rating');

    /*
    |--------------------------------------------------------------------------
    | Catalog Routes
    |--------------------------------------------------------------------------
    |
     */
    $this->get('catalog/{catalog}', 'CatalogController@index')->name('catalog');
    $this->get('category/{category}', 'CatalogController@category')->name('category');
    $this->get('catalog/{catalog}/{item}', 'CatalogController@show')->name('item');

    /*
    |--------------------------------------------------------------------------
    | Catalog Routes
    |--------------------------------------------------------------------------
    |
     */
    //$this->get('afisha', 'AfishaController@index')->name('afisha');
    //$this->get('afisha/{item}', 'AfishaController@category')->name('afisha.show');

    /*
    |--------------------------------------------------------------------------
    | Static Routes
    |--------------------------------------------------------------------------
    |
     */
    $this->get('/about', 'AboutController@index')->name('about');

    $this->post('/contacts', 'ContactsController@send')->name('contacts.submit');
    $this->get('/contacts', 'ContactsController@index')->name('contacts');
    $this->get('/investor', 'AboutController@investor')->name('investor');
    $this->get('/press', 'AboutController@press')->name('press');
    $this->get('/docs', 'AboutController@docs')->name('docs');
    $this->get('/regions', 'AboutController@contact')->name('regions');

    /*
    |--------------------------------------------------------------------------
    | Maps Routes
    |--------------------------------------------------------------------------
    |
     */
    $this->resource('maps', 'MapsController', ['names' => [
        'index' => 'maps.index',
        'type' => 'maps.type',
    ]]);

    $this->group(['middleware' => 'auth', 'prefix' => 'profile'], function () {
        $this->get('/', 'ProfileController@index')->name('profile');
        $this->put('/', 'ProfileController@update')->name('profile.update');
        $this->get('/password', 'ProfileController@password')->name('profile.password');
        $this->put('/password', 'ProfileController@changePassword')->name('profile.password.update');
        $this->get('/comments', 'ProfileController@comments')->name('profile.comments');
        $this->get('/liked', 'ProfileController@liked')->name('profile.liked');
        $this->get('/bid', 'ProfileController@bid')->name('profile.bid');
        $this->post('/bid', 'CRM\BidController@store')->name('profile.bid.store');
        $this->get('/post', 'CRM\PostController@index')->name('profile.post');

        $this->get('/route', 'UsersRouteController@index')->name('profile.routes');
        $this->get('/route/{id}', 'UsersRouteController@show')->name('profile.route');
        $this->get('/places/{id}', 'UsersRouteController@places');
        $this->post('/places/store', 'UsersRouteController@store');
        $this->post('/route/delete', 'UsersRouteController@delete');
    });

    $this->get('/comment/{item}', 'CommentController@index')->name('comment.list');
    $this->put('/comment/{item}', 'CommentController@update')->name('comment.add');

    $this->get('gallery', 'GalleryController@index');
    $this->put('gallery/like/{id}', 'GalleryController@like');
    $this->put('gallery/comment/{id}', 'GalleryController@comment');
    $this->post('gallery/{id}', 'GalleryController@store');

    $this->get('/', 'AboutController@welcome');

    $this->group(['prefix' => 'titz', 'namespace' => 'Titz'], function () {
        $this->get('/', 'TitzController@index');
        $this->get('/edit', 'TitzController@edit')->name('titz.edit');
        $this->put('/edit', 'TitzController@update')->name('titz.update');

        $this->get('/{user}/photo', 'TitzController@gallery')->name('titz.photo');
        $this->get('/{user}/news', 'TitzController@news')->name('titz.news');
        $this->get('/{user}/{catalog}', 'TitzController@listing')->name('titz.catalog');
    });

    // ЦФО
    $this->group(['prefix' => 'cfo', 'namespace' => 'Cfo'], function () {
        $this->get('/', 'CfoController@index');
        $this->get('/edit', 'CfoController@edit')->name('cfo.edit');
        $this->put('/edit', 'CfoController@update')->name('cfo.update');

        $this->get('/{user}/photo', 'CfoController@gallery')->name('cfo.photo');
        $this->get('/{user}/invest', 'CfoController@invest')->name('cfo.invest');
        $this->get('/{user}/contacts', 'CfoController@contacts')->name('cfo.contacts');

        $this->get('/{user}/{catalog}', 'CfoController@listing')->name('cfo.catalog');
    });

    $this->group(['prefix' => 'craftsmen', 'namespace' => 'Craftsmen'], function () {
        $this->get('/', 'CraftsmenController@index');
        $this->get('/edit', 'CraftsmenController@edit')->name('craftsmen.edit');
        $this->put('/edit', 'CraftsmenController@update')->name('craftsmen.update');

        $this->get('/{user}/photo', 'CraftsmenController@gallery')->name('craftsmen.photo');
        $this->get('/{user}/news', 'CraftsmenController@news')->name('craftsmen.news');
        $this->get('/{user}/{catalog}', 'CraftsmenController@listing')->name('craftsmen.catalog');
    });

    $this->group(['prefix' => 'shop', 'namespace' => 'Shop'], function () {
        $this->get('/product/{product}', 'ShopController@product')->name('shop.product');
        $this->get('/catalog', 'ShopController@catalog')->name('shop.catalog');
        $this->get('/products/{slug}', 'ShopController@products')->name('shop.products');
        $this->get('/cart', 'ShopController@cart')->name('shop.cart');
        $this->get('/order', 'ShopController@order')->name('shop.order');
        $this->get('/', 'ShopController@index')->name('shop');
    });

    /*
    |--------------------------------------------------------------------------
    | Auth Routes
    |--------------------------------------------------------------------------
    |
     */
    $this->get('search', 'SearchController@index')->name('search');
    $this->post('search/places', 'SearchController@places')->name('search.places');
});
