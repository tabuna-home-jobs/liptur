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
        <div class="container padder-v">
            <div class="row">
                
            </div>
            <div class="row">
				<div class="col-sm-4 padder-v shop_master">
                                        					  
					  <img src="{{$masterlist[$curId]->photo}}" alt="">					  
                      
					
				</div>
				<div class="col-sm-8 padder-v shop-product">
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
						 <p>{{ $masterlist[$curId]->description }}</p>	
					 	</div>
						<div class="header_master"> 						 
						 <span>{{ $masterlist[$curId]->adress }}</span>
						</div>	
                      
					</div>
				</div>
                
            </div>
        </div>
		<div class="col-md-12">
        <div class="row padder-v-micro sort-block">
           
        </div>
        <div id="shop" class="row shop-products">
		@foreach($masterlist as $mastera)
		  @php 
		  $urlphoto = 'https://liptur.ru/image/medium/storage/masters/2.jpg';				  
		  @endphp
		
		<div class="flip-container col-sm-3" ontouchstart="this.classList.toggle('hover');">
		 <div class="flipper">
			  <div class="front">
			 <article class="padder-v shop-product">
              <div class="panel panel-default box-shadow-lg pos-rlt">
                  <div class="main-news-img" >
                      <a href="/shop/masterpage/{{$mastera->id}}">
					  
					  <img src="@if (file_exists(base_path().$mastera->photo)) {{$mastera->photo}} @else https://liptur.ru/image/medium/storage/masters/no-photo.jpg @endif"
                               class="img-full img-master">
                            
                      </a>
                  </div>
                  <div class="wrapper-md">
                      <p class="h4 m-b-xs" data-mh="main-shop-header">
                          <a href="" title="{{$mastera->fio}}">{{$mastera->fio}}</a>
                      </p>
                                           
                  </div>
              </div>
          </article>
			  </div>
			  <div class="back panel" style="background:#f8f8f8;">
			  
						<div class="back_header_master">	
						<a href="/shop/masterpage/{{$mastera->id}}" title="{{$mastera->fio}}">{{ $mastera->fio }}</a>
						</div>	
						 <div class="header_master_numb"> 
						 Вид ремесла: 
						 <span>{{ $mastera->remeslo }}</span>
						</div>
						<div class="back_master_info">
						 <p>{{ $mastera->description }}</p>	
					 	</div>
						<div class="back_master_fade"></div>
						<div class="wrapper-md h4 m-b-xs main-shop-header">
						  
						  <a href="/shop/masterpage/{{$mastera->id}}" title="{{$mastera->fio}}">Подробнее</a>
						  
					    </div>
                        						
			  </div>
		 </div>		 
        </div>
		 @endforeach
        </div>
    </section>
@endsection
