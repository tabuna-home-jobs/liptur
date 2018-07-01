@extends('layouts.shop')
@section('title','Корзина')
@section('description','Корзина') 
@section('keywords','Корзина')
@section('shop')

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
    <div class="block-header m-b-md">
      Корзина
    </div>
    <div id="cart" v-cloak>
      <div class="col-md-8 padder-md">
          <div v-for="product in products" class="row panel panel-default box-shadow-lg pos-rlt">
            <div class="col-md-4 col-xs-12 no-padder-h">
              <div class="img-full">
                <img height="190" src="https://images.pexels.com/photos/66869/green-leaf-natural-wallpaper-royalty-free-66869.jpeg?auto=compress&cs=tinysrgb&h=350"/>
              </div>
            </div>
            <div class="col-md-7 col-xs-12 padder-v">
              <div class="text-green text-bold text-lg">@{{product.name}}</div>
              <div class="padder-v-micro text-sm">
                Еврокомиссия (ЕК) закрыла антимонопольное расследование против «Газпрома», которое продолжалось в течение нескольких лет, говорится в заявлении на сайте ЕК...
              </div>
              <div class="row m-t">
                <div class="col-xs-4">
                  <div class="input-group cart-component">
                    <input type="text" class="form-control" v-model="product.qty" v-on:change="updateInput(product)"/>
                    <button type="button" class="btn btn-default" v-on:click="updateQty(product, parseInt(product.qty)+1)">
                      +
                    </button>
                    <button type="button" class="btn btn-default" v-on:click="updateQty(product, parseInt(product.qty)-1)">
                      -
                    </button>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="text-sm">Цена за 1 шт:</div>
                  <em class="text-green text-xxxl">@{{formatPrice(product.price)}}</em>&nbsp;<em class="text-sm text-green">руб.</em>
                </div>
                <div class="col-xs-4">
                  <div class="text-sm">Сумма:</div>
                  <em class="text-green text-xxxl">@{{formatPrice(product.subtotal)}}</em>&nbsp;<em class="text-sm text-green">руб.</em>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="top-right">
              <div class="padder-v padder text-center">
                <a v-on:click="destroy(product)">
                  <i class="fa fa-close fa-lg text-green"></i>
                </a>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-4 scroll-wrapper">
        <div class="panel panel-cart-1 box-shadow-lg pos-rlt wrapper-md m-n">
          <div>
            Товаров в корзине: <b>@{{totalCount}}</b>
          </div>
          <div class="row b-b m-b padder-v-micro">
            <div class="col-xs-12">
              <span class="text-md">На сумму:&nbsp;</span><em class="text-green text-35px">@{{ formatPrice(total) }}</em>&nbsp;<em class="text-green text-md">руб.</em>
            </div>
          </div>
          <button class="btn btn-success w-full m-t">ОФОРМИТЬ ЗАКАЗ</button>
        </div>
        <div class="panel panel-cart-2  box-shadow-lg pos-rlt wrapper-md">
          <div class="row">
            <div class="m-t-md">
              <div class="b-b b-t">
                  <div class="wrapper">
                      <div class="v-center">
                          <div class="thumb-sm m-r-md">
                              <img src="/img/shop/feature-1.png" class="img-responsive center">
                          </div>
                          <span>Удобная и быстрая доставка<br> по всей России</span>
                      </div>
                  </div>
              </div>
              <div class="b-b">
                  <div class="wrapper">
                      <div class="v-center">
                          <div class="thumb-sm m-r-md">
                              <img src="/img/shop/feature-2.png" class="img-responsive center">
                          </div>
                          <span>30 дней на возврат товара</span>
                      </div>
                  </div>
              </div>
              <div class="b-b">
                  <div class="wrapper">
                      <div class="v-center">
                          <div class="thumb-sm m-r-md">
                              <img src="/img/shop/feature-3.png" class="img-responsive center">
                          </div>
                          <span>Гарантия подлинности и качества</span>
                      </div>
                  </div>
              </div>
              <div class="b-b">
                  <div class="wrapper">
                      <div class="v-center">
                          <div class="thumb-sm m-r-md">
                              <img src="/img/shop/feature-4.png" class="img-responsive center">
                          </div>
                          <span>Все товары и цены - <br>напрямую от производителей</span>
                      </div>
                  </div>
              </div>
              <div class="b-b">
                  <div class="wrapper">
                      <div class="v-center">
                          <div class="thumb-sm m-r-md">
                              <img src="/img/shop/feature-5.png" class="img-responsive center">
                          </div>
                          <span>Безопасность платежей гарантируется<br>использованием SSL протокола</span>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</section>
@endsection