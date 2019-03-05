@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин') 
@section('keywords','Магазин')

@section('header')
    @include('partials.header.headerMin',[
            'image'  => $currentCategory->term->getContent('fullPicture') ?? $categories[1]->term->getContent('fullPicture'),
            'title' => 'Интернет-магазин',
            'breadcrumb' =>[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop'),
                            'name' => 'Интернет-магазин',
                    ],
                    'current' => 'Каталог товаров' ]
        ])
@endsection


@section('shop')

@php
    function num2word($num, $words)
        {
            $num = $num % 100;
            if ($num > 19) {
                $num = $num % 10;
            }
            switch ($num) {
                case 1: {
                    return($words[0]);
                }
                case 2: case 3: case 4: {
                    return($words[1]);
                }
                default: {
                    return($words[2]);
                }
            }
        }
    $colProd=$products->total().' '.num2word($products->total(), array('товар', 'товара', 'товаров'));    
    $colSearchProd=num2word($products->total(), array('Найден', 'Найдено', 'Найдено')).' '.$products->total().' '.num2word($products->total(), array('товар', 'товара', 'товаров'));    
@endphp



<section>
  <div class="container padder-v">
    <div class="row">
      <div class="col-md-3">
        <div></div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-xs-9 block-header">
            @if(!isset($newsAndSpec)) 
                {{$currentCategory->term->getContent('name')}}
            @elseif (isset($request['search']))
                {{$colSearchProd}}
            @else
                Новинки и спецпредложения
            @endif
          </div>
          <div class="col-xs-3">
         
            <em class="col-prod">{{ $colProd }}</em>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 list-view list-no-border categorymenu">
        <ul>
          @foreach($categories as $category)
            <li class="padder-v-micro">
              <a href="{{route('shop.products',$category->slug)}}" class="text-md font-bold @if(($category->slug === $currentCategory->slug) && (!isset($newsAndSpec))) text-green @else  text-black @endif">
                {{$category->term->getContent('name')}}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-9">
        <div class="row padder-v-micro sort-block">
           <div class="col-xs-10">
            <label for="sel1">Сортировать:</label>
            <div class="dropdown inline">
                @include('partials.shop.dropdownbtn',[
                    'items'  => $products,
                    'id'     => 'MenuSort',
                    'name'   => 'sort',
                    'default'=> $request['sort'] ?? 'price_asc',
                    'select' =>  [
                            'price_asc'     => 'От меньшей цены',
                            'price_desc'    => 'От большей цены',
                            'name_asc'      => 'От А до Я',
                            'name_desc'     => 'От Я до А',
                        ],
                    ])
            </div>
          </div>
          <div class="col-xs-2">
             <div class="dropdown inline pull-right">
                @include('partials.shop.dropdownbtn',[
                    'items'  => $products,
                    'id'     => 'MenuRowCount',
                    'name'   => 'perpage',
                    'default'=> $request['perpage'] ?? '15',
                    'select' =>  [
                            '3' => '3',
                            '15' => '15',
                            '30' => '30',
                            '60' => '60',
                            '90' => '90',
                        ],
                    ])
            </div>
          </div>
        </div>
        <div id="shop" class="row shop-products">
          @foreach($products as $product)
          <article class="col-sm-4 padder-v shop-product">
              <div class="panel panel-default box-shadow-lg pos-rlt">
                  <div data-mh="main-news-img">
                      <a href="{{route('shop.product',$product->slug)}}">
                            <img src="@if (!is_null($product->attachment->first())) {{$product->hero('medium')}} @else {{$currentCategory->term->getContent('smallPicture')}} @endif"
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
                          <a class="cart-button"  v-on:click="addIntoCart({{$product->id}})"><i class="cart-icon"></i></a>
                          <div class="clearfix"></div>
                      </div>
                  </div>
              </div>
          </article>
          @endforeach
        </div>
        
        @include('partials.shop.paginate',[
                    'paginate' => $products,
                    ])
      </div>
    </div>
  </div>
</section>
@endsection