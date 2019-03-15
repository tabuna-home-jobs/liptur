@extends('layouts.shop')
@section('title','Оформление покупки')
@section('description','Оформление покупки')
@section('keywords','Оформление покупки')

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
      'current' => 'Оформление покупки']
])
@endsection

@section('shop')
  @php
    $order=(new App\Models\Order)->ordervar;
  @endphp

  <section>
    <div class="container padder-v">
      <div class="block-header m-b-xxl">
        Оформление покупки
      </div>
      <div id="shop-order" :total="{{$cart['total']}}" v-cloak>

        {{--Personal--}}
        <div v-show="step === 0">
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12 m-b">
                  <div class="bg-darkred text-white inline wrapper-sm padder-md m-r-sm">Шаг 1</div>
                  Ввведите ваши персональные данные к заказу:
                </div>
              </div>
            </div>
          </div>
          <form v-on:submit="submitPersonal($event)">
            @include('shop.order.personal')
          </form>
        </div>

        <div v-show="step===1">
          {{-- Delivery --}}
          @include('shop.order.delivery')
          <div class="m-t-md">
            @include('shop.order.payment')
          </div>
          <div class="m-t-md" v-if="total && deliveryData[formData.delivery] && formData.payment">
            <p>
              Стоимость товара:          		         @{{ total.toFixed(2) }} руб. </br>
              Стоимость доставки:            		         @{{ deliveryPrice && deliveryPrice.toFixed(2) || '-'}} руб.</br>
              Общая стоимость заказа:                                @{{ (total + deliveryPrice).toFixed(2) }} руб.</br>
              Общая стоимость заказа
              с учетом банковского перевода:                 @{{ formData.payment !== 'cash' ? (1.04 * (total + deliveryPrice)).toFixed(2): '-'}} руб.</br>
            </p>
          </div>

          <div class="m-t-md row">
            <div class="col-md-6">
              <button v-on:click="gotoStep(0)" class="btn btn-success text-u-c w-full">Назад
              </button>
            </div>
            <div class="col-md-6">
              <button v-on:click="sendPurchase()" class="btn btn-success text-u-c w-full">Заказать
              </button>
            </div>
          </div>
        </div>

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

