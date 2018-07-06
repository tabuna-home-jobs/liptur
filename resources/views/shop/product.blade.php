@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин')
@section('keywords','Магазин')

@section('header')
    <div class="bg-white">
        <section class="container-lg">
            <div class="row">
                <div class="bg-bordo">
                    <div class="container">
                        <h1 class="brand-header">Интернет-магазин</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="container-lg">
        <div class="row">
            <nav>
                <div class="container">
                    @include('partials.breadcrumb',[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop'),
                            'name' => 'Магазин',
                    ],
                    'current' => 'Каталог товаров' ])
                </div>
            </nav>
        </div>
    </section>
@endsection


@section('shop')
  <div id="product">
    <section class="b-b box-shadow">
        <div class="container padder-v" v-cloak>

            <div class="row padder-v">
                <div class="col-md-12">
                    <div class="block-header">
                        {{$product->getContent('name')}}
                    </div>
                </div>
            </div>
            <div class="row">

                <main class="col-md-8">

                    <div id="shop-product-slider" class="slider-pro">

                        <div class="sp-slides   @if(count($product->attachment) > 1) col-md-9 @else col-md-12 @endif no-padder">
                            @foreach($product->attachment as $attachment)
                                <div class="sp-slide">
                                    <img class="sp-image im-responsive img-full" src="{{$attachment->url('high')}}"
                                         data-src="{{$attachment->url('high')}}"
                                         data-retina="{{$attachment->url()}}"/>
                                </div>
                            @endforeach
                        </div>

                        @if(count($product->attachment) > 1)
                            <div class="sp-thumbnails col-md-3 no-padder">
                                @foreach($product->attachment as $attachment)
                                    <div class="sp-thumbnail">
                                        <div class="sp-thumbnail-image-container">
                                            <img class="sp-thumbnail-image img-full"
                                                 src="{{$attachment->url('small')}}"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="padder-v">
                        {!! $product->getContent('body') !!}
                    </div>

                </main>
                <div class="col-md-4">

                    <div class="bg-white w-full b">

                        <div class="wrapper">
                            <div class="v-center">
                                <div class="col-xs-3 no-padder text-black m-t">Цена:</div>
                                <div class="col-xs-9 no-padder text-right h3 text-danger">
                                    {{number_format($product->getOption('price'),0 ,',', ' ')}}
                                    руб.
                                </div>
                            </div>
                        </div>

                        <div class="wrapper b-t">
                            <button class="btn btn-success btn-group-justified text-u-c"
                                    v-on:click="addIntoCart('{{$product->id}}')">в корзину
                            </button>

                            <div class="padder-v v-center text-lg">
                                       <span id="stars-existing" class="starrr text-warning-lt"
                                             {{-- $rating->percent / $item->id --}}
                                             data-rating='3' data-post-id='1'
                                             style="cursor: pointer;"></span>
                                <small class="m-l-sm"> Средний рейтинг 3</small>
                            </div>
                        </div>

                        <div class="wrapper b-t">
                            <ul class="list-unstyled text-sm text-grey">
                                <li>Артикул: <span>{{$product->getOption('ski')}}</span></li>
                                <li class="padder-v-micro">Продавец: <span
                                            class="text-black">{{$product->getContent('seller.name')}}</span></li>
                            </ul>

                        </div>
                    </div>

                    <script type="text/javascript">(function() {
                      if (window.pluso)if (typeof window.pluso.start == "function") return;
                      if (window.ifpluso==undefined) { window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                        var h=d[g]('body')[0];
                        h.appendChild(s);
                      }})();</script>
                    <div class="m-t-lg text-right">
                      <em class="text-grey padder-sm padder-v-micro">Поделиться: </em>
                      <div class="inline v-middle pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=06" data-services="vkontakte,odnoklassniki,facebook,google" data-url="https://liptur.orchid.software"></div>
                    </div>

                    <div class="m-t-lg">
                        <div class="b-t">
                            <div class="wrapper">
                                <div class="v-center text-grey">
                                    <div class="thumb-sm m-r-md">
                                        <img src="/img/shop/feature-1.png" class="img-responsive center">
                                    </div>
                                    <span>Удобная и быстрая доставка<br> по всей России</span>
                                </div>
                            </div>
                        </div>
                        <div class="b-t">
                            <div class="wrapper">
                                <div class="v-center text-grey">
                                    <div class="thumb-sm m-r-md">
                                        <img src="/img/shop/feature-2.png" class="img-responsive center">
                                    </div>
                                    <span>30 дней на возврат товара</span>
                                </div>
                            </div>
                        </div>
                        <div class="b-t">
                            <div class="wrapper">
                                <div class="v-center text-grey">
                                    <div class="thumb-sm m-r-md">
                                        <img src="/img/shop/feature-3.png" class="img-responsive center">
                                    </div>
                                    <span>Гарантия подлинности и качества</span>
                                </div>
                            </div>
                        </div>
                        <div class="b-t">
                            <div class="wrapper">
                                <div class="v-center text-grey">
                                    <div class="thumb-sm m-r-md">
                                        <img src="/img/shop/feature-4.png" class="img-responsive center">
                                    </div>
                                    <span>Все товары и цены - <br>напрямую от производителей</span>
                                </div>
                            </div>
                        </div>
                        <div class="b-t b-b">
                            <div class="wrapper">
                                <div class="v-center text-grey">
                                    <div class="thumb-sm m-r-md">
                                        <img src="/img/shop/feature-5.png" class="img-responsive center">
                                    </div>
                                    <span>Безопасность платежей гарантируется<br>использованием SSL протокола</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content-dark">
      <div class="container padder-v">
          <div class="block-header comment-header">
            Комментарии
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="panel panel-default padder-v">
                  <div class="col-xs-12">
                    @if (Auth::guest())
                    <a class="text-green text-bold">
                      <button class="btn btn-success btn-circled  m-r-xs">
                        <i class="user-auth-icon"></i>
                      </button>
                      Войти
                    </a>
                    @endif
                    <div class="padder-v">
                     <div class="form-group">
                      <textarea class="form-control no-resize no-border form-control-grey" placeholder="Напишите ваш комментарий" rows="5" id="comment"></textarea>
                    </div>
                    </div>
                    <div>
                      <button class="btn btn-success" disabled>ДОБАВИТЬ</button>
                      <button class="btn" disabled>ОТМЕНИТЬ</button>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div>
              Модераторы и администрация портала оставляют за собой право принимать те или иные решения по блокировке учетных записей и по удалению любого сообщения, размещенного на сайте без согласования с пользователями и без последующих комментариев своих действий.
            </div>
            <div class="padder-v-micro font-bold">
              Основные причины блокировки аккаунта
            </div>
            <ol class="padder-l">
              <li>Оскорбления и переход на личности.</li>
              <li>Неоднократные комментарии, не относящиеся к теме</li>
                  новостного материала, относятся к флуду.
              <li>Массовые ссылки (спам) на различные интернет-сайты.</li>
              <li>Использование нецензурной лексики.</li>
              <li>Реклама.</li>
              <li>Разжигание межэтнической и межконфессиональной розни.</li>
              <li>Неоднократный и настойчивый флуд и оффтоп-сообщения.</li>
              <li>Комментарии пользователей на любых языках, кроме русского.запрещены.</li>
            </ol>
            </p>
          </div>
      </div>
    </section>

    <section class="content">
      <div class="container padder-v">
            <div class="col-md-12">
                <div class="row">
                    <div class="block-header">
                        Обратите внимание
                    </div>
                </div>
                <div class="row warnings-carousel owl-carousel">
                    @foreach($warnings as $product)
                        <article class="owl-item shop-product">
                            <div class="panel panel-default box-shadow-lg pos-rlt">
                                <div data-mh="main-news-img">
                                    <a href="{{route('shop.product',$product->slug)}}">
                                        <img src="{{$product->attachment->first()->url()}}"
                                             class="img-full img-post">
                                    </a>
                                </div>
                                <div class="wrapper-md">

                                    <p class="h4 m-b-xs" data-mh="main-shop-header">
                                        <a href="{{route('shop.product',$product->slug)}}">{{$product->getContent('name')}}</a>
                                    </p>
                                    <p class="text-xs" data-mh="main-shop-body">
                                        {{$product->getContent('annotation')}}
                                    </p>

                                    <div>
                                        <p class="shop-product-price">
                                            {{number_format($product->getOption('price'),0 ,',', ' ')}} <span
                                                    class="">руб.</span>
                                        </p>
                                        <a  class="cart-button"  v-on:click="addIntoCart({{$product->id}})"><i class="cart-icon"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@endsection