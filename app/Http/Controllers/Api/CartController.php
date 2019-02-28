<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\User;
use App\Http\Requests\OrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use Voronkovich\SberbankAcquiring\Client;
use Voronkovich\SberbankAcquiring\Currency;
use Voronkovich\SberbankAcquiring\OrderStatus;

class CartController
{
    private function getCartContent($cartContent, $isPurchase) {
        $content = [];
        $total = 0;
        $count = 0;

        foreach ($cartContent as $item) {
            if($isPurchase && $item->qty == 1 || !$isPurchase && $item->qty > 1) {
                $content[] = $item;
                $total += $item->qty * $item->price;
                $count += $item->qty;
            }
        }

        return [
            "content" => $content,
            "total" => $total,
            "count" => $count,
        ];
    }

    private function clearRows($rows) {
        foreach ($rows as $row) {
            Cart::remove($row->row_id);
        }
    }

    private function getSberbankClient() {
       return new Client([
            'token' => 'vm82h0bfbjsdiko8sphlf2utgj',
            'apiUri' => Client::API_URI_TEST,
        ]);
    }

    private function createSberbankOrder($orderId, $orderAmount) {
        $client = $this->getSberbankClient();

        $returnUrl   = config('app.url').'/api/order/'.$orderId.'/payed';

        $params['currency'] = Currency::RUB;
        $params['failUrl']  = config('app.url').'/api/order/'.$orderId.'/payed-fail';

        $result = $client->registerOrder($orderId, $orderAmount, $returnUrl, $params);

        $paymentFormUrl = $result['formUrl'];

        header('Location: ' . $paymentFormUrl);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if (Auth::check()) {
            Cart::restore(Auth::id());
        }

        return response()->json([
            'content' => Cart::content(),
            'total'   => Cart::total(),
            'count'   => Cart::count(),
        ]);
    }

    /**
     * @param \App\Models\Post $post
     * @param int                   $qty
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Post $post, $qty = 1)
    {
        abort_if($post->type !== 'product', 404);

        $post->setAttribute('image', optional($post->attachment()->first())->url());
        $post->setAttribute('annotation', $post->getContent('annotation'));
        $post->setAttribute('url', route('shop.product', $post->slug));

        Cart::add($post->id, $post->getContent('name'), $qty, $post->getOption('price'), $post->toArray());

        if (Auth::check()) {
            Cart::store(Auth::id());
        }

        return $this->index();
    }

    /**
     * @param     $rowId
     * @param int $qty
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($rowId, $qty = 1)
    {
        Cart::update($rowId, $qty);

        if (Auth::check()) {
            Cart::store(Auth::id());
        }

        return $this->index();
    }

    /**
     * @param $rowId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($rowId)
    {
        Cart::remove($rowId);

        if (Auth::check()) {
            Cart::store(Auth::id());
        }

        return $this->index();
    }

    public function purchase(OrderRequest $request)
    {
        if (Auth::check()) {
            Cart::restore(Auth::id());
        } else {
            $user = User::create([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'phone'    => $request->get('name'),
            ]);

            Auth::login($user);
        }

        $cartContent = $this->getCartContent(Cart::content(), true);


        $order = Order::create([
            'user_id' => Auth::id(),
            'slug'    => strtoupper(str_random(8)),
            'options' => [
                'payment'  => $request->get('payment'),
                'delivery' => $request->get('delivery'),
                'message'  => $request->get('message'),
                'content'  => $cartContent['content'],
                'total'    => $cartContent['total'],
                'count'    => $cartContent['count'],
                'status'   => 'new',
            ],
        ]);

        //$order->slug=$order->id.''.strtoupper(str_random(8));
        //$order->update(['slug'=>$order->id.''.strtoupper(str_random(8))]);

        Mail::send('emails.orderadmin', ['order' => $order], function ($message) {
            //$m->from('sender@test.com', 'Sender');
            $message->to(setting('shop_admin_email'), 'Администратор')
                ->subject('Новый заказ на сайте Liptur.ru');
        });

        Mail::send('emails.order', ['order' => $order], function ($message) use ($order) {
            $message->to($order->user()->first()->email, $order->user()->first()->name)
                ->subject('Новый заказ на сайте Liptur.ru');
        });
        if($request->get('payment') === 'card' && $cartContent['total'] > 0) {
            return $this->createSberbankOrder($order->id, $cartContent['total'] * 100);
        }

        $this->clearRows($cartContent['content']);

        return response(200);
    }

    public function payedOrder(Order $order)
    {
        $client = $this->getSberbankClient();

        $result = $client->getOrderStatus($order->id);

        if (OrderStatus::isDeposited($result['orderStatus'])) {
            echo "Order #$order->id is deposited!";
        }

        if (OrderStatus::isDeclined($result['orderStatus'])) {
            echo "Order #$order->id was declined!";
        }
    }

    /**
     * @param \App\Http\Requests\OrderRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function order(OrderRequest $request)
    {
        if (Auth::check()) {
            Cart::restore(Auth::id());
        } else {
            $user = User::create([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'phone'    => $request->get('name'),
            ]);

            Auth::login($user);
        }

        $cartContent = $this->getCartContent(Cart::content(), false);

        $order = Order::create([
            'user_id' => Auth::id(),
            'slug'    => strtoupper(str_random(8)),
            'options' => [
                'payment'  => $request->get('payment'),
                'delivery' => $request->get('delivery'),
                'message'  => $request->get('message'),
                'content'  => $cartContent['content'],
                'total'    => $cartContent['total'],
                'count'    => $cartContent['count'],
                'status'   => 'new',
            ],
        ]);

        //$order->slug=$order->id.''.strtoupper(str_random(8));
        //$order->update(['slug'=>$order->id.''.strtoupper(str_random(8))]);

        Mail::send('emails.orderadmin', ['order' => $order], function ($message) {
            //$m->from('sender@test.com', 'Sender');
            $message->to(setting('shop_admin_email'), 'Администратор')
                ->subject('Новый заказ на сайте Liptur.ru');
        });

        Mail::send('emails.order', ['order' => $order], function ($message) use ($order) {
            $message->to($order->user()->first()->email, $order->user()->first()->name)
                ->subject('Новый заказ на сайте Liptur.ru');
        });

        $this->clearRows($cartContent['content']);

        return response(200);
    }
}
