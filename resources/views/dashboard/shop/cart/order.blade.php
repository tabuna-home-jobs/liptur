{{-- dd($order) --}}

<div class="bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="wrapper-md">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Заказ №{{$order->slug}} </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Дата и время заказа:</p>
                    </div>
                    <div class="col-md-8">
                        <h5>{{$order->created_at}}</h5>
                    </div>
                </div>
                @if(isset($order->options['purchase']))
                    <div class="row">
                        <div class="col-md-4">
                            <p>Тип:</p>
                        </div>
                        <div class="col-md-8">
                            <h5>{{$order->options['purchase'] ? 'Покупка': 'Заказ'}}</h5>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <p>Способ получения:</p>
                    </div>
                    <div class="col-md-8">
                        <h5>{{$order->ordervar['delivery'][$order->options['delivery']]}}</h5>
                    </div>
                </div>
                @if ($order->options['delivery'] === 'mail')
                    <div class="row">
                        <div class="col-md-4">
                            <p>Адрес:</p>
                        </div>
                        <div class="col-md-8">
                            <h5>{{$order->options['delivery_address'] ?? 'не указан'}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Индекс:</p>
                        </div>
                        <div class="col-md-8">
                            <h5>{{$order->options['delivery_zip'] ?? 'не указан'}}</h5>
                        </div>
                    </div>
                @endif

                @if ($order->options['delivery'] === 'courier' && isset($order->options['delivery_id']))
                    <div class="row">
                        <div class="col-md-4">
                            <p>Город:</p>
                        </div>
                        <div class="col-md-8">
                            <h5>{{$order->options['delivery_city_name'] ?? 'не указан'}}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p>Пункт доставки:</p>
                        </div>
                        <div class="col-md-8">
                            <h5>{{$order->options['delivery_pvz_name'] ?? 'не указан'}} ({{$order->options['delivery_pvz_address']}})</h5>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <p>Способ оплаты:</p>
                    </div>
                    <div class="col-md-8">
                        <h5>{{$order->ordervar['payment'][$order->options['payment']]}}</h5>
                    </div>
                </div>

                @if (isset($order->options['payed_price']))
                    <div class="row">
                        <div class="col-md-4">
                            <p>Оплачено:</p>
                        </div>
                        <div class="col-md-8">
                            <h5>{{$order->options['payed_price']}} руб</h5>
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="wrapper-md">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h3>Данные покупателя</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Имя Фамилия</p>
                    </div>
                    <div class="col-md-8">
                        <h6>{{optional($order->user()->first())->name}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Телефон</p>
                    </div>
                    <div class="col-md-8">
                        <h6>{{optional($order->user()->first())->phone}}</h6>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-4">
                        <p>Email:</p>
                    </div>
                    <div class="col-md-8">
                        <h6>{{optional($order->user()->first())->email}}</h6>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-4">
                        <p>Адрес:</p>
                    </div>
                    <div class="col-md-8">
                        <h6>{{optional($order->user()->first())->adress}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Комментарий к заказу:</p>
                    </div>
                    <div class="col-md-8">
                        <h6>{{$order->message}}</h6>
                    </div>
                </div>  
             {{-- dd($order) --}}
            </div>
        </div>
    </div>
</div>
<div class="bg-white">        
    <div class="row">
        <div class="wrapper-md">
            <div class="col-md-12 mb-4">
                <h3>Статус заказа:</h3>
            </div>
        </div>
    </div>
</div>
