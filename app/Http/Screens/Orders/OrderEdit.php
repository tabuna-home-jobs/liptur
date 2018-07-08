<?php

namespace App\Http\Screens\Orders;

use App\Core\Models\Order;
use Orchid\Platform\Facades\Alert;
use Orchid\Platform\Screen\Layouts;
use Orchid\Platform\Screen\Link;
use Orchid\Platform\Screen\Screen;

class OrderEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Заказ';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Редактирование статуса заказа';

    /**
     * Query data.
     *
     * @param TypeTran $typetran
     *
     * @return array
     */
    public function query($order_id = null) : array
    {
        $order = Order::whereId($order_id)->firstOrFail();

        return [
            'order'    => $order,
        ];
    }

    /**
     * Button commands.
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [
            Link::name('Save Order')->method('save'),
        ];
    }

    /**
     * Views.
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            Layouts::columns([
                'OrderEdit' => [
                    OrderEditLayout::class,
                ],
            ]),
        ];
    }

    /**
     * @param Order $order
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save($request, TypeTran $typetran)
    {
        //dd($typetran);
        /*
            $typetran->fill($this->request->get('typetran'))->save();
            Alert::info('TypeTran was saved');
            return redirect()->route('dashboard.uslugi.typetran.list');
        */
    }
}
