@extends('layouts.app-new') 
@section('title','Магазин')
@section('description','Магазин') 
@section('keywords','Магазин')
@section('content')

<section class="container-fluid">
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
    <div class="col-md-12">
      <div class="row"> 
        <div class="block-header">
          Каталог товаров
        </div>
      </div>
      <div class="row">
        @for ($i = 0; $i < 11; $i++)
        <article class="col-md-4 padder-v">
          <div class="pos-rlt">
            <div data-mh="main-news-img" style="height: 200px;">
                <a href="/testurl"><img src="https://liptur.ru/storage/2018/06/26/99e442403acd1b9cd39de9342c8b4a801d7dbff2_medium.jpg" class="img-full img-post "></a>
            </div>
            <div class="padder-v">
              <a href="/testurl" class="text-green text-md">
                  Романовская игрушка
              </a>
            </div>
          </div>
        </article>
        @endfor
      </div>
    </div>
  </div>
</section>
@endsection