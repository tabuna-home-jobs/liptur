@extends('layouts.shop')
@section('title','Оформление заказа')
@section('description','Оформление заказа') 
@section('keywords','Оформление заказа')


@section('header')
    <div class="bg-white">
        <section class="container-lg">
            <div class="row">
                <div class="bg-bordo">
                    <div class="container">
                        <h1 class="brand-header">Интернет-магазин</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="container-lg">
        <div class="row">
            <nav>
                <div class="container">
                    @include('partials.breadcrumb',[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop.cart'),
                            'name' => 'Корзина',
                    ],
                    'current' => 'Оформление заказа' ])
                </div>
            </nav>
        </div>
    </section>
@endsection

@section('shop')
@php 
    $order=(new App\Core\Models\Order)->ordervar;
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
                  <select name="delivery" class="select2 form-control text-darkred" v-model="formData.delivery">
                    @foreach ($order['delivery'] as $key=>$delivery)
                      <option value="{{$key}}">{{$delivery}}</option>
                    @endforeach 
                  </select>
                  <span class="caret"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 m-b">
                <div class="bg-darkred text-white inline wrapper-sm padder-md m-r-sm">Шаг 2 </div>
                Выберите способ оплаты:
              </div>
              <div class="col-md-6">
                <div class="form-group select-group">
                  <select name="payment" class="select2 form-control text-darkred" v-model="formData.payment">
                    @foreach ($order['payment'] as $key=>$payment)
                      <option value="{{$key}}">{{$payment}}</option>
                    @endforeach 
                  </select>
                  <span class="caret"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 m-b">
                <div class="bg-darkred text-white inline wrapper-sm padder-md m-r-sm">Шаг 3 </div>
                Ввведите ваши персональные данные к заказу:
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <em class="text-md">Стоимость доставки от ****</em><br/>
            <em class="text-sm">Точную стоимость доставки вам сообщит менеджер в момент подтверждения заказа.
            При выборе способа доставки - «Доставка курьером» - заполните
            в комментарии заказа - ваш адрес (населенный пункт, улицу, дом, квартиру)
            </em>
          </div>
        </div>
      
        @if (Auth::guest()) 
            <div class="row m-h-none">     
              <div class="bg-yellow b-dashed b-1x wrapper-lg">
                <div class="font-bold text-center text-black text-lg">
                  Если вы не авторизованы - <a href="{{url('/'.App::getLocale().'/login')}}" class="text-red">авторизуйтесь</a> или заполните поля ниже
                </div>
              </div>
            </div>
            <div class="clearfix m-b-md"></div>
        @endif
        <div class="row row-flex"> 
    
          <div class="col-md-4 flex-column">
            <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.email }">
              <label class="text-sm text-left">Введите ваш Email (это будет логин) <span class="text-red">*</span> :</label>
              <input v-model="formData.email" 
                      data-value="{{Auth::check()?Auth::user()->email:null}}" 
                      type="email" name="email" autofocus
                      ref="email"
                      required  class="form-control"/>
               <span class="help-block" v-if="errors.email">
                  <strong>@{{ errors.email[0]}}</strong>
              </span>
            </div>
            <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.password }">
              <label class="text-sm text-left">Введите пароль @if (Auth::guest())<span class="text-red">*</span>@endif:</label>
              <input type="password" name="password" autofocus
                      v-model="formData.password"
                      @if (!Auth::guest()) disabled @endif
                      required  class="form-control"/>
              <span class="help-block" v-if="errors.password">
                  <strong>@{{ errors.password[0]}}</strong>
              </span>
            </div>
            <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.password_confirmation }">
              <label class="text-sm text-left">Повторите пароль еще раз @if (Auth::guest())<span class="text-red">*</span>@endif :</label>
              <input type="password" name="password_confirmation" autofocus
                      v-model="formData.password_confirmation"
                      @if (!Auth::guest()) disabled @endif
                      required  class="form-control"/>
              <span class="help-block" v-if="errors.password_confirmation">
                  <strong>@{{ errors.password_confirmation[0]}}</strong>
              </span>
            </div>
            <div class="form-group m-t-sm "  v-bind:class="{ 'has-error': errors.nick }">
              <label class="text-sm text-left">Ваше имя (никнейм):</label>
              <input type="text" name="nick" autofocus class="form-control" v-model="formData.nick"/>
              <span class="help-block" v-if="errors.nick">
                  <strong>@{{ errors.nick[0]}}</strong>
              </span>
            </div>
          </div>
          <div class="col-md-4 flex-column">
            <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.name }">
              <label class="text-sm text-left">Имя <span class="text-red">*</span> :</label>
              <input type="text" name="first_name" autofocus
                      data-value="{{strtok(Auth::check()?Auth::user()->name:'', ' ')}}" 
                      v-model="formData.first_name"
                      ref="first_name"
                      required  class="form-control"/>
              <span class="help-block" v-if="errors.name">
                  <strong>@{{ errors.name[0]}}</strong>
              </span>
            </div>
            <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.name }">
              <label class="text-sm text-left">Фамилия:</label>
              <input type="text" name="last_name" autofocus class="form-control"
                  v-model="formData.last_name" 
                  ref="last_name"
                  data-value="{{strstr(Auth::check()?Auth::user()->name:'', ' ')}}" 
              />
              <span class="help-block" v-if="errors.name">
                  <strong>@{{ errors.name[0]}}</strong>
              </span>
            </div>

            <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.phone }">
              <label class="text-sm text-left">Телефон <span class="text-red">*</span> :</label>
              <em class="text-sm text-rigth pull-right">Пример: +7 123 456 7890</em>
              <input type="phone" data-value="{{Auth::check()?Auth::user()->phone:null}}" name="phone" autofocus  class="form-control"  v-model="formData.phone" ref="phone"/>
              <span class="help-block" v-if="errors.phone">
                  <strong>@{{ errors.phone[0]}}</strong>
              </span>
            </div>

             <div class="form-group m-t-sm m-b-none flex-item-bootom">
                  <div class="checkbox">
                      <label class="i-checks">
                          <input type="checkbox"  v-model="aggree" name="checkme"><i></i>   Я согласен на обработку <a href="" class="text-sm text-green" data-toggle="modal" data-target="#modalpage-personal-data">персональных данных</a> и ознакомился с <a href="" class="text-sm text-green" data-toggle="modal" data-target="#modalpage-terms-of-service">правилами сервиса</a>
                      </label>
                  </div>
              </div>
          </div>
          <div class="col-md-4 flex-column">
            <div class="form-group">
                <label class="control-label">Напишите комментарий к заказу:</label>
                <textarea class="form-control form-control-grey no-resize summernote" rows="14"
                          name="message" required  v-model="formData.message"></textarea>
            </div>
            <div class="form-group flex-item-bootom">
                <button :disabled="!aggree" v-on:click="sendOrder()" class="btn btn-success text-u-c w-full">Заказать</button>
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

