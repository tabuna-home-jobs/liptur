<?php


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

$router->group([
    'prefix' => 'dashboard/liptur',
], function () {

    $this->get('/bids', 'CRM\BidController@index')->name('dashboard.liptur.bids');
    $this->post('/bids/deny/{post}', 'CRM\BidController@deny')->name('dashboard.liptur.bids.deny');
    $this->post('/bids/success/{post}', 'CRM\BidController@success')->name('dashboard.liptur.bids.success');

});
