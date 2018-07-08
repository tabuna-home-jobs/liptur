<?php
namespace App\Http\Screens\Orders;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Core\Models\User;
use Orchid\Platform\Facades\Alert;
use Orchid\Platform\Notifications\DashboardNotification;
use Orchid\Platform\Screen\Screen;
use Orchid\Platform\Screen\Layouts;
use Orchid\Platform\Screen\Link;

use App\Core\Models\Order;

class OrderList extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Список заказов';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'Список заказов товаров';
    /**
     * Query data
     *
     * @return array
     */
    public function query() : array
    {
		//dd(PackagePath);
        return [
            'orders' => Order::paginate()
        ];
    }
    /**
     * Button commands
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [
        ];
    }
    /**
     * Views
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            OrderListLayout::class,
        ];
    }
}