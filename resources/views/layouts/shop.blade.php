@extends('layouts.app-new')
  @section('submenu')
  
      <div class="visible-xs padder-v-micro row"></div>
      <div id="shop-header" class="row padder-l-xl no-p-xs">
          <div class="col-xs-8 hidden-xs">
              @widget('shopHeaderMiddle')
          </div>
          <div class="col-xs-6 visible-xs">
              <button class="btn btn-link visible-xs m-r m-v" type="button" data-toggle="collapse"
                      data-target=".navbar-collapse">
                  <i class="fa fa-bars fa-lg"></i>
              </button>
          </div>
          <div class="col-xs-6 col-md-4 dropdown cart-dropdown no-padder-h">
              <ul class="nav nav-cart pull-right dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                  <li>
                      <a id="dropdownMenuShopCart" v-cloak>
                          <i class="cart-icon"></i> @{{cartTotalCount}} <span>@{{declOfNum(cartTotalCount, ['товар', 'товара', 'товаров'])}}</span>
                      </a>
                  </li>
              </ul>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuShopCart">
                <div class="wrapper-md">
                  <div style="max-height: 350px" class="scrollable m-r-n">
                    <div v-for="product in cartProducts" class="b-b padder-v-micro pos-rlt m-r">
                      <div class="col-xs-2 no-padder-h">
                        <div class="img-full">
                          <img v-bind:src="product.options.image"/>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <a class="text-white text-bold" v-bind:href="product.options.url">
                          @{{product.name}}
                        </a>
                        <div class="text-muted text-sm">
                          @{{product.options.annotation}}
                        </div>
                      </div>
                      <div class="col-xs-4 no-padder-h">
                        <div class="pull-right text-right">
                          <a v-on:click="destroy(product, $event)"><i class="fa fa-close text-muted"></i></a>
                          <div class="padder-v-micro">
                            <em class="text-white text-md">@{{formatPrice(product.subtotal)}}</em>&nbsp;<em class="text-sm text-white">руб.</em>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div v-if="cartProducts.length === 0" class="b-b padder-v-micro pos-rlt m-r">Нет товаров в корзине</div>
                  </div>
                  <div class="padder-v-micro">
                    <div class="col-xs-6 no-padder-h">
                      <em class="text-muted">Всего товаров:</em>
                      <em class="text-xxxl">@{{cartTotalCount}}</em>
                    </div>
                    <div class="col-xs-6 no-padder-h">
                      <div class="pull-right">
                        <em class="text-muted">На сумму:</em>
                        <em class="text-xxxl">@{{formatPrice(cartTotal)}}</em>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('shop.cart')}}" class="btn btn-success text-u-c w-full m-t-md">Перейти в корзину</a>
                </div>
              </div>
          </div>
      </div>
  @endsection
  
  @section('content')
    @yield('shop')
    @include('partials.shop.cart-modal')
  @endsection
