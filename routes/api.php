<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['middleware' => ['api'], 'namespace' => 'Api'], function ($router) {
    $router->post('newsletter', 'NewsletterController@subscription');
    $router->post('reservation', 'ReservationController@subscription');
    $router->get('cart', 'CartController@index');
    $router->post('cart/order', 'CartController@order');
    $router->post('cart/{product}/{count?}', 'CartController@store');
    $router->put('cart/{row}/{count?}', 'CartController@update');
    $router->delete('cart/{row}', 'CartController@delete');
    $router->post('shop/{product}/comment', 'CommentController@comment');
});
