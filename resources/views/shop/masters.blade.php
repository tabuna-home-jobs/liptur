@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин') 
@section('keywords','Магазин')

@section('header')
    @include('partials.header.headerMin',[
            'image'  => '/storage/2019/02/03/6a5e937cb9959639b2a4afe90af2f5e13d6afab0.png',
            'title' => 'Интернет-магазин',
            'breadcrumb' =>[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop'),
                            'name' => 'Интернет-магазин',
                    ],
                    'current' => 'Мастера земли липецкой' ]
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
		$totalCount = count($masterlist);
    $colProd=$totalCount.' '.num2word($totalCount, array('мастер', 'мастера', 'мастеров'));    
    $colSearchProd=num2word($totalCount, array('Найден', 'Найдено', 'Найдено')).' '.$totalCount.' '.num2word($totalCount, array('мастер', 'мастера', 'мастеров'));    
@endphp



<section>
  <div class="container padder-v">
    <div class="row">
      
      <div class="col-md-12">
        <div class="row">
          <div class="col-xs-9 block-header">
            @if(!isset($newsAndSpec)) 
                {{$currentCategoryName}}
            @elseif (isset($request['search']))
                {{$colSearchProd}}
            @else
                Мастера
            @endif
          </div>
          <div class="col-xs-3">
         
            <em class="col-prod">{{ $colProd }}</em>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--div class="col-md-3 list-view list-no-border categorymenu">
        <ul>
          @foreach($categoriesMaster as $category)
            <li class="padder-v-micro">
              <a href="{{route('shop.masters',$category->id)}}" class="text-md font-bold @if(($category->id === $curentMasterCategory) && (!isset($newsAndSpec))) text-green @else  text-black @endif">
                {{$category->content}}
              </a>
            </li>
          @endforeach
        </ul>
      </div-->
      <div class="col-md-12">
        <div class="row padder-v-micro sort-block">
           <div class="col-xs-10">
            <label for="sel1">Выберите район:</label>
            <div class="dropdown inline">
                @include('partials.shop.dropdownbtn_masters',[
                    'items'  => $products,
                    'id'     => 'Menu',
                    'name'   => 'urli',
                    'default'=> $request['urli'] ?? '1',                
                    ])
            </div>
          </div>
          <div class="col-xs-2">
             
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
					  
					  
							   
							   <img src="@if ((file_exists(public_path().$mastera->photo)| file_exists(base_path().$mastera->photo)) & $mastera->photo!='') {{$mastera->photo}} @else https://liptur.ru/image/medium/storage/masters/no-photo.jpg @endif"
                               class="img-full img-master">
                            
                      </a>
                  </div>
                  <div class="wrapper-md">
                      <p class="h4 m-b-xs" data-mh="main-shop-header">
                          <a href="" title="{{$mastera->fio}}">{{$mastera->fio}}</a>
                      </p>
                      <!--p class="text-xs" data-mh="main-shop-body">
					  <b>Вид ремесла:</b> <br />
                          {{$mastera->remeslo}}
                      </p-->                      
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
						 <p>{{strip_tags($mastera->description)}}</p>	
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
        
        @include('partials.shop.paginate',[
                    'paginate' => $products,
                    ])
      </div>
    </div>
  </div>
</section>
@endsection