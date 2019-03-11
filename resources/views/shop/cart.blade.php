@extends('layouts.shop')
@section('title','Корзина')
@section('description','Корзина') 
@section('keywords','Корзина')


@section('header')
    @include('partials.header.headerMin',[
            'image'  => '',
            'title' => 'Корзина',
            'breadcrumb' =>[
                'breadcrumb' => [],
                'base' => [
                        'route' => route('shop'),
                        'name' => 'Интернет-магазин',
                ],
                'current' => 'Корзина' ]
        ])
@endsection

@section('shop')

<section>
  <div class="container padder-v">
    <div class="block-header m-b-sm">
      Корзина
    </div>
    <div id="cart" v-cloak>
      <div class="padder-md m-b-sm">
        <div class="row">
          <p><small>Изделия в количестве более 1 шт. изготавливаются мастером на заказ.</br>
            Срок изготовления уточнит менеджер, который свяжется с вами в ближайшее время.</br>
              Для продолжения оформления такого заказа перейдите в корзину ПОД ЗАКАЗ.</small></p>
        </div>
      </div>
      <div class="text-center text-xl m-b-sm">
        <a class="btn-link text-green inline m-h-sm" v-bind:class="isPurchase && 'selected'" v-on:click="changeIsPurchase(true)">
          Товар в наличии @{{ purchaseCount }}
        </a>
        <a class="btn-link text-green inline m-h-sm" v-bind:class="!isPurchase && 'selected'" v-on:click="changeIsPurchase(false)">
          Под заказ @{{ orderCount }}
        </a>
      </div>
      <div class="col-md-8 padder-md" id="cart-affix-target">
          <div v-for="product in products" class="row row-flex panel box-shadow-lg pos-rlt">
            <div class="col-sm-4 col-xs-12 no-padder-h">
              <div class="img-full">
                <img height="190" v-bind:src="product.options.image"/>
              </div>
            </div>
            <div class="col-sm-7 col-xs-12 padder-v prod-desc">
                <a class="text-green text-bold text-lg" v-bind:href="product.options.url">
                  @{{product.name}}
                </a>
                <div class="padder-v-micro text-sm">
                  @{{product.options.annotation}}
                </div>
                <div class="row m-t row-flex">
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
                  <i class="close-cart"></i>
                </a>
              </div>
            </div>
          </div>
          <div v-if="products.length === 0" class="wrapper-md panel panel-default box-shadow-lg pos-rlt">Нет товаров в корзине</div>
      </div>
      <div class="col-md-4">
        <div id="cart-affix">
          <div class="panel box-shadow-lg pos-rlt wrapper-md m-n">
            <div>
              Товаров в корзине: <b>@{{totalCount}}</b>
            </div>
            <div class="row b-b m-b padder-v-micro">
              <div class="col-xs-12">
                <span class="text-md">На сумму:&nbsp;</span><em class="text-green text-35px">@{{ formatPrice(total) }}</em>&nbsp;<em class="text-green text-md">руб.</em>
              </div>
            </div>
            <a v-if="isPurchase" href="{{route('shop.purchase')}}" class="btn btn-success w-full m-t">КУПИТЬ</a>
            <a v-if="!isPurchase" href="{{route('shop.order')}}" class="btn btn-success w-full m-t">ОФОРМИТЬ ЗАКАЗ</a>
          </div>
          <div class="pos-rlt wrapper-md">
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
                            <span>Только ручная работа</span>
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
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  </div>
</section>
@endsection