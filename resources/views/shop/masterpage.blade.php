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
                                        					  
					  <img src="@if (file_exists(public_path().$masterlist[$curId]->photo)|(file_exists(base_path().$masterlist[$curId]->photo))) {{$masterlist[$curId]->photo}} @else https://liptur.ru/image/medium/storage/masters/no-photo.jpg @endif"
                               class="img-full img-master">				  
                      
					
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
@endsection
