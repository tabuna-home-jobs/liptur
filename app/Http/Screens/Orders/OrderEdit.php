<?php

namespace App\Http\Screens\Orders;

use App\Core\Models\Order;
use Illuminate\Support\Facades\Mail;
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
                'Левая колонка' => [
                    OrderEditLayout::class,
                    OrderStatusLayout::class,
                ],
                'Правая колонка' => [
                    OrderCartLayout::class,
                ],
            ]),
        ];
    }

    /**
     * @param Order $order
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save($order_id)
    {
        
        $order = Order::whereId($order_id)->firstOrFail();
        $options = $this->request->get('order')['options'];
        
        if ($options['status']!==$order->options['status']) {
            Alert::info('Отправка сообщения заказчику');
            
            $mailtitle= 'Изменение статуса заказа на сайте Liptur.ru на '.$order->ordervar['status'][$options['status']];
            
            Mail::send('emails.order', ['order' => $order], function ($message) use ($order, $mailtitle) {
                //$m->from('sender@test.com', 'Sender');
                $message->to($order->user()->first()->email,$order->user()->first()->name)
                    ->subject($mailtitle);
            });
            //Send mail
        }
        
        $options=array_merge($order->options,$options);
        $order->update(['options' => $options]);

        Alert::info('Заказ изменен');
        return redirect()->route('dashboard.liptur.shop.order.list');
        
    }
}
