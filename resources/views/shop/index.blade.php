@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин')
@section('keywords','Магазин')
@section('shop')

    <section class="container-lg">
        <div class="pos-abt bg-white left w-full h-sm"></div>
        
            <div class="owl-carousel main-carousel owl-theme owl-with-dots hidden-xs">
                @for ($i = 0; $i < 4; $i++)
                    <div class="item">
                        <img class="img-responsive" src="/img/carusel/index/{{$i+1}}.jpg"/>
                        <div class="owl-shop-block container">
                            <div class="row row-flex">
                                <div class="col-md-8 col-sm-12">
                                    <div class="owl-shop-title">
                                        Настоящие Елецие кружева
                                    </div>
                                    <div class="owl-shop-description">
                                        На восточной окраине Киевской Руси одним из древнейших был город Воргол.
                                        Название города, как утверждают краеведы, возникло до славянской колонизации.
                                        Слово "воргол" в переводе с древне-мордовского на современный русский язык
                                        означает "лесная река". В период феодальной раздробленности Воргол стал центром
                                        воргольского удельного княжества ...
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 owl-shop-price">
                                    <div class="to-bottom">
                                        <span>от</span> 999 <span>руб.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <nav>
                <div class="container">
                    @include('partials.breadcrumb',[ 'breadcrumb' => [], 'current' => 'Магазин' ])
                </div>
            </nav>
        
    </section>

    <section>
        <div class="container padder-v">
            <div class="row">
                <div class="block-header col-xs-12">
                    Новинки и спецпредложения
                    <a>
                        Самое интересное
                    </a>
                </div>
            </div>
            
            <div  id="shop" class="row">
                @foreach($newsAndSpecial as $product)
                    @if ($loop->index<4) 
                        <article class="col-md-3 padder-v shop-product">
                            <div class="panel panel-default box-shadow-lg pos-rlt">
                                <div data-mh="main-news-img">
                                    <a href="{{route('shop.product',$product->slug)}}">
                                        <img src="@if (!is_null($product->attachment->first())) {{$product->attachment->first()->url()}} @else  /img/icons/slon.png @endif"
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
                                        <a class="cart-button" v-on:click="addIntoCart({{$product->id}})"><i class="cart-icon"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endif    
                @endforeach
            </div>
        </div>
 
        @include('partials.shop.index-category',[
            'categories'=>$categories
        ])
        
        
        <div class="container padder-v">
            <div class="col-md-12">
                <div class="row">
                    <div class="block-header">
                        Обратите внимание
                        <a href="{{route('shop.catalog')}}">
                            К каталогу
                        </a>
                    </div>
                </div>
                <div id="shop1" class="row">
                    @foreach($warnings as $product)
                        @if ($loop->index<8) 
                            <article class="col-md-3 padder-v shop-product">
                                <div class="panel panel-default box-shadow-lg pos-rlt">
                                    <div data-mh="main-news-img">
                                        <a href="{{route('shop.product',$product->slug)}}">
                                            <img src="@if (!is_null($product->attachment->first())) {{$product->attachment->first()->url()}} @else /img/icons/slon.png @endif"
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
                                            <a class="cart-button" v-on:click="addIntoCart({{$product->id}})"><i class="cart-icon"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endif    
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection