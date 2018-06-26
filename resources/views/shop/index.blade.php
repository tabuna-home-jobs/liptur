@extends('layouts.app-new') 
@section('title','Магазин')
@section('description','Магазин') 
@section('keywords','Магазин')
@section('content')

<section class="container-fluid">
  <div class="row">
    <div class="owl-carousel owl-theme main-carousel owl-with-dots">
        <div class="item">
            <img class="img-responsive" src="/img/tour/background/news.png"
                  alt=""
                  style="width: auto;margin: 0 auto;     max-height: 600px;">
            <div class="owl-shop-block">
              <div class="owl-shop-title">
                Настоящие Елецие кружева
              </div>
              <div class="owl-shop-description">
                На восточной окраине Киевской Руси одним из древнейших был город Воргол. Название города, как утверждают краеведы, возникло до славянской колонизации. Слово "воргол" в переводе с древне-мордовского на современный русский язык означает "лесная река". В период феодальной раздробленности Воргол стал центром воргольского удельного княжества ...
              </div>
              <div class="owl-shop-price">
                <span>от</span> 999 руб.
              </div>
            </div>
        </div>
        <div class="item">
            <img class="img-responsive owl-lazy"
                  data-src="/img/tour/background/news.png" alt=""
                  style="width: auto;margin: 0 auto;    max-height: 600px;"/>
            <div class="owl-shop-block">
              <div class="owl-shop-title">
                Настоящие Елецие кружева
              </div>
              <div class="owl-shop-description">
                На восточной окраине Киевской Руси одним из древнейших был город Воргол. Название города, как утверждают краеведы, возникло до славянской колонизации. Слово "воргол" в переводе с древне-мордовского на современный русский язык означает "лесная река". В период феодальной раздробленности Воргол стал центром воргольского удельного княжества ...
              </div>
              <div class="owl-shop-price">
                <span>от</span> 999 руб.
              </div>
            </div>
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
          Новинки и спецпредложения
          <a>
            Самое интересное
          </a>
        </div>
      </div>
      <div class="row">
        @for ($i = 0; $i < 4; $i++)
        <article class="col-md-3 padder-v shop-product">
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
    </div>
  </div>
  <div class="wrapper bg-white b-b box-shadow-lg padder-v">
    <div class="container shop-categories-widget">
      @for ($i = 0; $i < 15; $i++)
        <article>
          <a>
            <img src="/img/icons/slon.png" />
            <p>Гончарные изделия</p>
          </a>
        </article>
      @endfor
    </div>
  </div>
  <div class="container padder-v">
    <div class="col-md-12">
      <div class="row"> 
        <div class="block-header">
          Обратите внимание
          <a>
            К каталогу
          </a>
        </div>
      </div>
      <div class="row">
        @for ($i = 0; $i < 8; $i++)
        <article class="col-md-3 shop-product wrapper-sm">
          <div class="panel panel-default box-shadow-lg pos-rlt m-n">
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
    </div>
  </div>
</section>
@endsection