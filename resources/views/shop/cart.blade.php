@extends('layouts.app-new') 
@section('title','Корзина')
@section('description','Корзина') 
@section('keywords','Корзина')
@section('content')

<section class="container-lg">
  <div class="row">
    <div class="bg-bordo">
      <div class="container">
        <h1 class="brand-header">Корзина</h1>
      </div>
    </div>
    <nav>
      <div class="container">
        @include('partials.breadcrumb',[ 'breadcrumb' => [], 'current' => 'Корзина' ])
      </div>
    </nav>
  </div>
</section>

<section>
  <div class="container padder-v">
    <div class="row">
      <div class="block-header m-b-md">
        Корзина
      </div>
    </div>
    <div class="row" id="cart">
      <div class="col-md-9">
        @for ($i = 0; $i < 3; $i++)
          <div class="row panel panel-default box-shadow-lg pos-rlt">
            <div class="col-md-4 no-padder-h">
              <div class="img-full">
                <img src="https://images.pexels.com/photos/66869/green-leaf-natural-wallpaper-royalty-free-66869.jpeg?auto=compress&cs=tinysrgb&h=350"/>
              </div>
            </div>
            <div class="col-md-8 padder-v">
              <div class="text-green text-bold text-lg">Свистулька “Тиу-тиу-тиу”</div>
              <div class="padder-v-micro text-sm">
                Еврокомиссия (ЕК) закрыла антимонопольное расследование против «Газпрома», которое продолжалось в течение нескольких лет, говорится в заявлении на сайте ЕК...
              </div>
            </div>
          </div>
        @endfor
      </div>
      <div class="col-md-3">
      </div>
    </div>
  </div>
</section>
@endsection