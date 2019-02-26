<?php

use App\Http\Screens\Orders\OrderEdit;
use App\Http\Screens\Orders\OrderList;
use App\Http\Screens\Shortvars\ShortvarEdit;
use App\Http\Screens\Shortvars\ShortvarsList;
use App\Http\Screens\ProductArrivals\ProductArrivalList;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\Comment\CommentEditScreen;
use App\Orchid\Screens\Comment\CommentListScreen;
use App\Orchid\Screens\Category\CategoryEditScreen;
use App\Orchid\Screens\Category\CategoryListScreen;
use App\Http\Controllers\CRM\BidController;
use App\Http\Screens\ShopCategory\ShopCategoryListScreen;
use App\Http\Screens\ShopCategory\ShopCategoryEditScreen;
use  App\Http\Controllers\Dashboard\AdvertisingController;

use App\Http\Controllers\Dashboard\Shop\CategoryController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
$this->screen('/main', PlatformScreen::class)->name('platform.main');

// Users...
$this->screen('users/{users}/edit', UserEditScreen::class)->name('platform.systems.users.edit');
$this->screen('users', UserListScreen::class)->name('platform.systems.users');

// Roles...
$this->screen('roles/{roles}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit');
$this->screen('roles/create', RoleEditScreen::class)->name('platform.systems.roles.create');
$this->screen('roles', RoleListScreen::class)->name('platform.systems.roles');

// Comments...
$this->screen('comments/{comments}/edit', CommentEditScreen::class)->name('platform.systems.comments.edit');
$this->screen('comments/create', CommentEditScreen::class)->name('platform.systems.comments.create');
$this->screen('comments', CommentListScreen::class)->name('platform.systems.comments');

// Categories...
$this->screen('category/{category}/edit', CategoryEditScreen::class)->name('platform.systems.category.edit');
$this->screen('category/create', CategoryEditScreen::class)->name('platform.systems.category.create');
$this->screen('category', CategoryListScreen::class)->name('platform.systems.category');

// Shop
$this->screen('shop/order/{order}/edit', OrderEdit::class)->name('platform.shop.order.edit');
$this->screen('shop/order', OrderList::class)->name('platform.shop.order.list');

$this->screen('shop/shortvar/{shortvar}/edit', ShortvarEdit::class)->name('dashboard.liptur.shop.shortvar.edit');
$this->screen('shop/shortvar/create', ShortvarEdit::class)->name('dashboard.liptur.shop.shortvar.create');
$this->screen('shop/shortvar', ShortvarsList::class)->name('dashboard.liptur.shop.shortvar.list');

// Categories...
$this->screen('shop/category/{shopcat}/edit', ShopCategoryEditScreen::class)->name('platform.shop.category.edit');
$this->screen('shop/category/create', ShopCategoryEditScreen::class)->name('platform.shop.category.create');
$this->screen('shop/category', ShopCategoryListScreen::class)->name('platform.shop.category');




$this->screen('shop/product-arrival', ProductArrivalList::class)->name('dashboard.liptur.shop.product-arrival.list');


$this->group([
    'middleware' => config('platform.middleware.private'),
    'prefix'     => \Orchid\Platform\Dashboard::prefix('/systems'),
],
    function (\Illuminate\Routing\Router $router, $path = 'dashboard.systems.recycle.') {
        $router->screen('recycle/{id}/edit', 'Recycle\RecycleEdit', $path . 'edit');
        $router->screen('recycle', 'Recycle\RecycleList', $path . 'list');
    });


$this->group([
    'middleware' => config('platform.middleware.private'),
    'prefix'     => \Orchid\Platform\Dashboard::prefix('/bids'),
], function (\Illuminate\Routing\Router $router) {
    $router->get('/',[BidController::class, 'index'])->name('dashboard.liptur.bids');
    $router->post('/deny/{post}', [BidController::class, 'deny'])->name('dashboard.liptur.bids.deny');
    $router->post('/success/{post}', [BidController::class, 'success'])->name('dashboard.liptur.bids.success');
});
