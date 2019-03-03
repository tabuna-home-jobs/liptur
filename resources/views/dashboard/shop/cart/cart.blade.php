<div class="bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="wrapper-md">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h3>Всего {{$order->options['count']}} товаров</h3>
                    </div>
                </div>
            @foreach ($order->options['content'] as $item)
                <div class="row py-1 @if ($loop->iteration%2) bg-light @endif">
                    <div class="col-md-3 text-center">
                        <a href="{{$item['options']['url']}}" target="_blank"><img height="90" src="{{url('/')}}{{$item['options']['image']}}"></a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{$item['options']['url']}}" target="_blank"><h4>{{$item['name']}}</h4></a>
                        <p>Цена: <b>{{$item['price']}} руб.</b></p>
                        <p>Колличество: <b>{{$item['qty']}} шт.</b></p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h5>{{$item['subtotal']}} руб.</h5>
                    </div>
                </div>
            @endforeach

                <div class="row mt-2">
                    <div class="col-md-12">
                        <h5>Итого: {{$order->options['total']}} рублей.</h5>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <h5>Доставка: {{$order->options['delivery_price']??0}} рублей.</h5>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Итого с доставкой: {{$order->options['total'] + ($order->options['delivery_price']??0)}} рублей.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
