@extends('layouts.shop')
@section('title','Оформление заказа')
@section('description','Оформление заказа')
@section('keywords','Оформление заказа')


@section('header')
  @include('partials.header.headerMin',[
          'image'  => '',
          'title' => 'Интернет-магазин',
          'breadcrumb' =>[
              'breadcrumb' => [],
              'base' => [
                      'route' => route('shop.cart'),
                      'name' => 'Корзина',
              ],
              'current' => 'Оформление заказа' ]
      ])
@endsection

@section('shop')
  @php
    $order=(new App\Models\Order)->ordervar;
  @endphp

  <section>
    <div class="container padder-v">
      <div class="block-header m-b-xxl">
        Оформление заказа
      </div>
      <div id="shop-order" v-cloak>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6 m-b">
                  <div class="text-white inline wrapper-sm padder-md m-r-sm bg-darkred">Шаг 1 </div>
                  Выберите способ получения заказа:
                </div>
                <div class="col-md-6">
                  <div class="form-group select-group">
                    <select name="delivery" class="select2 form-control text-darkred" v-model="formData.delivery" v-on:change="formData.payment = 'card'">
                      @foreach ($order['delivery'] as $key=>$delivery)
                        <option value="{{$key}}">{{$delivery}}</option>
                      @endforeach
                    </select>
                    <span class="caret"></span>
                  </div>
                </div>
              </div>
              @include('shop.order.payment', [
                'step' => 2
              ])
              <div class="row">
                <div class="col-md-6 m-b">
                  <div class="bg-darkred text-white inline wrapper-sm padder-md m-r-sm">Шаг 3 </div>
                  Ввведите ваши персональные данные к заказу:
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <em class="text-md">Стоимость доставки от @{{ deliveryPrices[formData.delivery] || '***'}} руб.</em><br/>
              <em class="text-sm">Точную стоимость доставки вам сообщит менеджер в момент подтверждения заказа. Ваш адрес (населенный пункт, улицу, дом, квартиру) - заполните в комментарии к заказу.
              </em>
            </div>
          </div>
        <form v-on:submit="sendOrder($event)">
          @include('shop.order.personal')
        </form>
      </div>
    </div>
  </section>


  @include('partials.modals.page',[
      'slugpage' => 'terms-of-service',
  ])
  @include('partials.modals.page',[
      'slugpage' => 'personal-data',
  ])
@endsection

