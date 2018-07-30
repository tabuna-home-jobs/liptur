@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин')
@section('keywords','Магазин')

@section('header')
    <div class="bg-white">
        <section class="container-lg">
            <div class="row">
                <div class="bg-bordo" style="background-image: url('{{$category->getContent('fullPicture')}}');">
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
                                'name' => 'Интернет-магазин',
                        'breadcrumbs' => [
                            [
                                 'route' => route('shop.catalog'),
                                 'name' => 'Каталог',
                            ],
                            [
                                 'route' => route('shop.products',['slug' => $category->slug]),
                                 'name' => $category->getContent('name'),
                            ]
                        ],
                    ],'current' => $product->getContent('name') ])
                </div>
            </nav>
        </div>
    </section>
@endsection


@section('shop')
    <div id="product" product-id="{{$product->id}}">
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
                                                     src="{{$attachment->url('medium')}}"/>
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
                    <div class="col-md-4 product-right">

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
                                                class="text-darkred">{{$product->getContent('seller.name')}}</span></li>
                                </ul>

                            </div>
                        </div>

                        <script type="text/javascript">(function () {
                                if (window.pluso) if (typeof window.pluso.start == "function") return;
                                if (window.ifpluso == undefined) {
                                    window.ifpluso = 1;
                                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                    s.type = 'text/javascript';
                                    s.charset = 'UTF-8';
                                    s.async = true;
                                    s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
                                    var h = d[g]('body')[0];
                                    h.appendChild(s);
                                }
                            })();</script>
                        <div class="m-t-lg text-right m-r-sm">
                            <em class="text-grey padder-sm padder-v-micro">Поделиться: </em>
                            <div class="inline v-middle pluso" data-background="transparent"
                                 data-options="medium,square,line,horizontal,nocounter,theme=06"
                                 data-services="vkontakte,odnoklassniki,facebook,google"
                                 data-url="https://liptur.orchid.software"></div>
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
            @include('partials.comments.shop-comments',[
              'id' => $product->id,
              'comments' =>$product->comments,
              'post' => $product
             ] )
        </section>

        <section class="content prod-warnings">
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
                                            <img src="@if (!is_null($product->attachment->first())) {{$product->attachment->first()->url()}} @else  /img/icons/slon.png @endif"
                                                 class="img-full img-post">
                                        </a>
                                    </div>
                                    <div class="wrapper-md">

                                        <p class="h4 m-b-xs" data-mh="main-shop-header">
                                            <a href="{{route('shop.product',$product->slug)}}"
                                               title="{{$product->getContent('name')}}">{{$product->getContent('name')}}</a>
                                        </p>
                                        <p class="text-xs" data-mh="main-shop-body">
                                            {{$product->getContent('annotation')}}
                                        </p>

                                        <div>
                                            <p class="shop-product-price">
                                                {{number_format($product->getOption('price'),0 ,',', ' ')}} <span
                                                        class="">руб.</span>
                                            </p>
                                            <a class="cart-button" v-on:click="addIntoCart({{$product->id}})"><i
                                                        class="cart-icon"></i></a>
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