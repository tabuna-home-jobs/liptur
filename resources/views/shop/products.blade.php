@extends('layouts.app-new') 
@section('title','Магазин')
@section('description','Магазин') 
@section('keywords','Магазин')
@section('content')

<section class="container-lg">
  <div class="row">
    <div class="bg-bordo">
      <div class="container">
        <h1 class="brand-header">Интернет-магазин</h1>
      </div>
    </div>
    <nav>
      <div class="container b-b">
        @include('partials.breadcrumb',[ 'breadcrumb' => [], 'current' => 'Магазин' ])
      </div>
    </nav>
  </div>
</section>

<section>
  <div class="container padder-v">
    <div class="row">
      <div class="col-md-3">
        <div></div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-xs-9 block-header">
            Кружева, плетение, текстиль
          </div>
          <div class="col-xs-3">
            <em class="font-bold text-sm padder-v-micro pull-right">34 6348 товаров</em>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 list-view list-no-border">
        <ul>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Гончарные изделия</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Романовская игрушка</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green">Юрьевская игрушка</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Кружево, плетение, текстиль</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Елецкое кружево</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Липецкие узоры</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Обувь ручной работы</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Плетение из лозы, соломы</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Гастрономия </a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Тематическая литература</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">Сувениры</a></li>
          <li class="padder-v-micro"><a class="text-md font-bold text-green text-black">«Липецкая Земля»</a></li>
        </ul>
      </div>
      <div class="col-md-9">
        <div class="row padder-v-micro">
           <div class="col-xs-6">
            <label for="sel1">Сортировать:</label>
            <select class="form-control-green" id="sel1">
              <option>От меньшей цены</option>
              <option>От большей цены</option>
              <option>От А до Я      </option>
              <option>От Я до А       </option>
            </select>
          </div>
          <div class="col-xs-6">
            <select class="form-control-green pull-right" id="sel1">
              <option>15</option>
              <option>30</option>
              <option>60</option>
              <option>90</option>
            </select>
          </div>
        </div>
        <div class="row">
          @for ($i = 0; $i < 21; $i++)
          <article class="col-md-4 padder-v shop-product">
            <div class="panel panel-default box-shadow-lg pos-rlt">
              <div data-mh="main-news-img" style="height: 200px;">
                  <a href="/testurl"><img src="https://liptur.ru/storage/2018/06/26/99e442403acd1b9cd39de9342c8b4a801d7dbff2_medium.jpg" class="img-full img-post "></a>
              </div>
              <div class="wrapper-md">
                  <div data-mh="main-news-body" style="height: 100px;">
                      <p class="h4 m-b-xs"><a href="/testurl">Елецкие кружева</a>
                      </p>
                      <p class="text-xs">
                          Кратое описание в 2 троки. Остальное вываливаем за высоту блока...
                      </p>
                      <p class="shop-product-price">
                        5 999 <span class="">руб.</span>
                      </p>
                      <a class="cart-button"><i class="cart-icon"></i></a>
                      <div class="clearfix"></div>
                  </div>
                </div>
            </div>
          </article>
          @endfor
        </div>
        <div class="row padder-v">
          <div class="col-xs-2">
            <button class="btn btn-light btn-rounded" disabled><i class="brand-icon-left-dis"></i>НАЗАД</button>
          </div>
          <div class="col-xs-8">
            <button class="btn btn-rounded btn-success m-h-xs">1</button>
            <button class="btn btn-rounded btn-success m-h-xs">2</button>
            <button class="btn btn-rounded btn-success m-h-xs">3</button>
            <button class="btn btn-rounded btn-success m-h-xs">4</button>
            <button class="btn btn-rounded btn-success m-h-xs">5</button>
            <span class="text-green">...</span>
            <button class="btn btn-rounded btn-success m-h-xs">85</button>
          </div>
          <div class="col-xs-2">
            <button class="btn btn-light btn-rounded">ВПЕРЕД<i class="brand-icon-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection