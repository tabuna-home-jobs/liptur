<?php

namespace App\Http\Controllers\Api;

use App\Core\Models\Order;
use App\Core\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Orchid\Platform\Core\Models\Post;

class CartController
{
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
     * @param \App\Core\Models\Post $post
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

        $order=Order::create([
            'user_id' => Auth::id(),
            'options' => [
                'payment'  => $request->get('payment'),
                'delivery' => $request->get('delivery'),
                'message'  => $request->get('message'),
                'content'  => Cart::content(),
                'total'    => Cart::total(),
                'count'    => Cart::count(),
                'status'   => 'new',
            ],
        ]);
        
        $order->slug=$order->id.''.strtoupper(str_random(8));
        //$order->update('slug'=>$order->id.''.strtoupper(str_random(8)));
        
        Mail::send('emails.order', ['order' => $order ], function ($message) {
                //$m->from('sender@test.com', 'Sender');
                $message->to(setting('shop_admin_email'),'Администратор')
                    ->subject('Новый заказ на сайте Liptur.ru');
            });
        
        

        Cart::destroy();

        return response(200);
    }
}
