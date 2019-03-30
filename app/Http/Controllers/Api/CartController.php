<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\User;
use App\Http\Requests\OrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;

use Voronkovich\SberbankAcquiring\OrderStatus;
use App\Business\Delivery;
use App\Business\Sberbank;
class CartController
{
    private function clearRows($rows) {
        foreach ($rows as $row) {
            Cart::remove($row->rowId);
        }
    }


    /**
     * @param $request
     * @param bool $is_purchase
     * @param array $custom
     * @return Order
     */
    private function createOrder($request,  bool $is_purchase = false, $custom = []): Order {
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

        $cartContent = get_cart_content(Cart::content(), $is_purchase);

        // проверка на пустоту корзины
        if($cartContent['count'] === 0) {
            return abort(400, "У вас пустая корзина!");
        }

        // проверка наличия товаров
        foreach ($cartContent['content'] as $item) {
            $product = Post::type('product')->whereId($item->id)->firstOrFail();
            $count = $product->options['count'] ?? 0;

            if($is_purchase && $count < $item->qty) {
                return abort(400, "Товара нет в наличии");
            }
        }

        $delivery = $request->get('delivery');
        $payment = $request->get('payment');

        $total = $cartContent['total'] ?? 0;
        $delivery_price = isset($custom['delivery_price']) ? $custom['delivery_price']?? 0 : 0;

        $total_with_delivery = $delivery_price + $total;

        $bank_fee_data = (new Order)->bank_fee;
        $bank_fee = $bank_fee_data[$payment] ?? null;
        $total_with_comission = !$bank_fee ? $total_with_delivery: round($total_with_delivery * (1 + $bank_fee), 2);

        $options = [
            'payment'  => $payment,
            'delivery' => $delivery,
            'message'  => $request->get('message'),
            'content'  => $cartContent['content'],
            'total'    => $total,
            'total_with_delivery'    => $total_with_delivery,
            'total_with_comission'    => $total_with_comission,
            'count'    => $cartContent['count'],
            'status'   => 'new',
            'purchase' => $is_purchase
        ];

        foreach ($custom as $key => $value) {
            $options[$key] = $value;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'slug'    => strtoupper(str_random(8)),
            'options' => $options,
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

        return $order;
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
        $delivery_type = $request->get('delivery');
        $delivery_opts = $request->get('delivery_opts');

        $delivery_data = Delivery::getDeliveryData($delivery_type, $delivery_opts);

        if(isset($delivery_data['errors'])) {
            return response()->json($delivery_data, 400);
        }

        $delivery_res = Delivery::calcDeliveryCart($delivery_type, $delivery_opts, true);
        $delivery_price = $delivery_res['price'] ?? 0;

        $custom = $delivery_data;
        $custom['delivery_price'] = $delivery_price;

        $order = $this->createOrder($request, true, $custom);


        if($request->get('payment') === 'card' && $order->options['total'] > 0) {
            return Sberbank::createSberbankOrder($order->id, $order->options['total_with_comission'] * 100);
        }

        return response(200);
    }

    /**
     * @param \App\Http\Requests\OrderRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function order(OrderRequest $request)
    {
        $this->createOrder($request);

        return response(200);
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function payedOrder(Order $order, Request $request)
    {
        if($order->options['status'] === 'payed') {
            return abort(404);
        }

        $sberOrderId = $request->get('orderId');

        $result = Sberbank::getOrderStatus($sberOrderId);

        if($result['orderNumber'] != $order->id) {
            return abort(404);
        }

        if (OrderStatus::isDeposited($result['orderStatus'])) {
            $options = $order->options;
            $options['status'] = 'payed';
            $options['payed_price'] = $result['amount'] / 100;
            $order->options = $options;
            $order->save();
            return view('pages.orderPayed', [
                'message' => "Ваша покупка оплачена"
            ]);
        }

        if (OrderStatus::isDeclined($result['orderStatus'])) {
            return view('pages.orderPayed', [
                'message' => "Не удалось оплатить покупку"
            ]);
        }
    }
}
