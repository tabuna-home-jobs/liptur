@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин')
@section('keywords','Магазин')

@section('header')
    @include('partials.header.headerMin',[
                'image'  => '/storage/2018/08/01/f317e8bb69a5e806ade3e8a452237ead40a1cf6e.png',
                'title' => 'Интернет-магазин',
                'breadcrumb' =>[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop'),
                            'name' => 'Интернет-магазин',
                    ],
                    'current' => 'Мастер земли липецкой' ]
            ])
@endsection

@section('shop')

    <section>
        <div class="container padder-v mastersingle">
            <div class="row">
              
            </div>
            <div class="row">
				<div class="col-sm-3 padder-v shop_master">                     
					  <img src="@if (file_exists(public_path().$masterlist[$curId]->photo)|(file_exists(base_path().$masterlist[$curId]->photo))) {{$masterlist[$curId]->photo}} @else https://liptur.ru/image/medium/storage/masters/no-photo.jpg @endif"
                               class="img-full img-master">
		  
					  
					
				</div>
				  
				<div class="col-sm-9 padder-v shop-product">
                    <div class="text_master">  
						<div class="header_master">
						Имя мастера: <span>{{ $masterlist[$curId]->fio }}</span>
						</div>
						 <div class="header_master"> 
						 Телефон: 
						 <span>{{ $masterlist[$curId]->contacts }}</span>
						</div>
						 <div class="header_master"> 
						 Вид ремесла: 
						 <span>{{ $masterlist[$curId]->remeslo }}</span>
						</div>
						<div class="header_master"> 
						 <span>О мастере:</span>
						 <p>{{ strip_tags($masterlist[$curId]->description) }}</p>	
					 	</div>
						<div class="header_master"> 						 
						 <span>{{ $masterlist[$curId]->adress }}</span>
						</div>	
                      
					</div>
				</div>
                
            </div>
        </div>
		 </section>
		<div class="row white">
        
		
		  <!--div id="shop" class="row shop-products">
		  <h1>Блок с товарами</h1>		 
		  @foreach($warnings as $items)
		 <h3>{{$items->getContent('name')}}</h3>
		 <h3>{{$items->getContent('annotation')}}</h3>
		 <h3>{{number_format($items->getOption('price'),0 ,',', ' ')}}</h3>
		 <a href="">
                            <img src="@if (!is_null($items->attachment->first())) {{$items->hero('medium')}} @else {{$currentCategory->term->getContent('smallPicture')}} @endif"
                               class="img-full img-post">
                      </a>
		   @endforeach
        </div-->
		
		
        <div id="shop" class="container padder-v" style="padding:0;">
		<div class="col-xs-12 block-header">
		Изделия мастера	
		</div>
		@foreach($warnings as $product)
		<div class="flip-container product col-sm-3" ontouchstart="this.classList.toggle('hover');">
		 <div class="flipper">
			  <div class="front product">
			 <article class="padder-v shop-product">
              <div class="panel panel-default box-shadow-lg pos-rlt">
                  <div class="main-news-img" >
                      <a href="{{route('shop.product',$product->slug)}}">
                            <img src="@if (!is_null($product->attachment->first())) {{$product->hero('medium')}} @else {{$currentCategory->term->getContent('smallPicture')}} @endif"
                               class="img-full img-post">
                      </a>
                  </div>
                  <div class="wrapper-md">
                      <p class="h4 m-b-xs" data-mh="main-shop-header">
                          <a href="" title="{{$product->getContent('name')}}">{{$product->getContent('name')}}</a>
                      </p>
					  <p class="shop-product-price">
                              {{number_format($product->getOption('price'),0 ,',', ' ')}} <span
                                      class="">руб.</span>
                          </p>
						   <!--a class="cart-button"  v-on:click="addIntoCart({{$product->id}})"><i class="cart-icon"></i></a-->
                          <div class="clearfix"></div>                                           
                  </div>
              </div>
          </article>
			  </div>
			  <div class="back product panel" style="background:#f8f8f8;">
			  
						<div class="back_header_master">	
						<a href="{{route('shop.product',$product->slug)}}" title="{{$product->getContent('name')}}">{{$product->getContent('name')}}</a>
						</div>							
						<div class="back_master_info product">
						<span>{{$product->getContent('annotation')}}</span>				 
					 	</div>
						<div class="back_master_fade"></div>
						<div class="master_product_price">
						<p class="shop_product_price">
                              {{number_format($product->getOption('price'),0 ,',', ' ')}} <span
                                      >руб.</span>
                          </p>	
						  <a class="cart_button"  v-on:click="addIntoCart({{$product->id}})"><i class="cart-icon"></i><span>Купить</span></a>
					    </div>
                        						
			  </div>
		 </div>		 
        </div>
		 @endforeach
        </div>
		</div>
   
@endsection
