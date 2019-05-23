@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин')
@section('keywords','Магазин')
@section('shop')

    <section class="container-lg hidden-xs">	
        <div class="pos-abt bg-white left w-full h-sm"></div>
            @include('partials.shop.topslider',[
                'slides'=>$topslider
            ])        
            <nav>
                <div class="container">
                    @include('partials.breadcrumb',[ 'breadcrumb' => [], 'current' => 'Интернет-магазин' ])
                </div>
            </nav>
    </section>

    <section>
        <div class="container padder-v">
            <div class="row">
                <div class="block-header col-xs-12 pt-3">
                    Новинки
                    <a href="{{route('shop.newsproducts')}}">
                        Самое интересное
                    </a>
                </div>
            </div> 
            
            <div  id="shop" class="row">
                @foreach($newsAndSpecial as $product)
                    @if ($loop->index<4) 
                        <article class="col-sm-6 col-md-3 padder-v shop-product">
                            <div class="panel panel-default box-shadow-lg pos-rlt">
                                <div data-mh="main-news-img">
                                    <a href="{{route('shop.product',$product->slug)}}">
                                        <img src="{{$product->hero('medium') ?? '/img/icons/slon.png' }}"
                                            class="img-full img-post">
                                    </a>
                                </div>
                                <div class="wrapper-md">

                                    <p class="h4 m-b-xs" data-mh="main-shop-header">
                                        <a href="{{route('shop.product',$product->slug)}}" title="{{$product->getContent('name')}}">{{$product->getContent('name')}}</a>
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

        @include('partials.shop.index-masters',[
            'regionlists'=>$regionlists
        ])


        <div class="container padder-v">
            <div class="row">
                <div class="block-header  col-xs-12 pt-3">
                    Обратите внимание
                    <a href="{{route('shop.catalog')}}">
                        К каталогу
                    </a>
                </div>
            </div>
            <div id="shop1" class="row">
                @foreach($warnings as $product)
                    @if ($loop->index<8)
                        <article class="col-sm-6 col-md-3 padder-v shop-product">
                            <div class="panel panel-default box-shadow-lg pos-rlt">
                                <div data-mh="main-news-img">
                                    <a href="{{route('shop.product',$product->slug)}}">
                                        <img src="{{$product->hero('medium') ?? '/img/icons/slon.png' }}"
                                        class="img-full img-post">
                                    </a>
                                </div>
                                <div class="wrapper-md">

                                    <p class="h4 m-b-xs" data-mh="main-shop-header">
                                        <a href="{{route('shop.product',$product->slug)}}" title="{{$product->getContent('name')}}">{{$product->getContent('name')}}</a>
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
         @include('partials.shop.index-attantion',[
            'categories'=>$categories
        ])
    </section>
@endsection