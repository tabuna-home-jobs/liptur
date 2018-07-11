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
                            'name' => 'Коризина',
                    ],
                    'current' => 'Оформление заказа' ])
                </div>
            </nav>
        </div>
    </section>
@endsection

@section('shop')

<section>
  <div class="container padder-v">
    <div class="block-header m-b-xxl">
      Оформление заказа
    </div>
    <div id="shop-order" v-cloak>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6 no-padder-h-sm m-b">
            <div class="bg-black text-white inline wrapper-sm padder-md m-r-sm">Шаг 1 </div>
            Выберите способ получения заказа:
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <select name="delivery" class="select2 form-control" v-model="formData.delivery">
                <option value="mail">Почта</option>
                <option value="courier">Курьер</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 no-padder-h-sm m-b">
            <div class="bg-black text-white inline wrapper-sm padder-md m-r-sm">Шаг 2 </div>
            Выберите способ оплаты:
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <select name="payment" class="select2 form-control" v-model="formData.payment">
                <option value="cash">Наличными</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 no-padder-h-sm m-b">
            <div class="bg-black text-white inline wrapper-sm padder-md m-r-sm">Шаг 3 </div>
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
      <div class="clearfix m-b-md"></div>
      <div class="bg-yellow b-dashed b-1x wrapper-lg">
        <div class="font-bold text-center text-black text-lg">
          Если вы не авторизованы - <a href="{{url('/'.App::getLocale().'/login')}}" class="text-red">авторизуйтесь</a> или заполните поля ниже
        </div>
      </div>
      <div class="clearfix m-b-md"></div>
      <div class="col-md-4">
        <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.email }">
          <label class="text-sm text-left">Введите ваш Email (это будет логин):</label>
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
          <label class="text-sm text-left">Введите Пароль:</label>
          <input type="password" name="password" autofocus
                  v-model="formData.password"
                  <?php if (!Auth::guest()){ ?> disabled <?php } ?>
                  required  class="form-control"/>
          <span class="help-block" v-if="errors.password">
              <strong>@{{ errors.password[0]}}</strong>
          </span>
        </div>
        <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.password_confirmation }">
          <label class="text-sm text-left">Повторите пароль еще раз:</label>
          <input type="password" name="password_confirmation" autofocus
                  v-model="formData.password_confirmation"
                  <?php if (!Auth::guest()){ ?> disabled <?php } ?>
                  required  class="form-control"/>
          <span class="help-block" v-if="errors.password_confirmation">
              <strong>@{{ errors.password_confirmation[0]}}</strong>
          </span>
        </div>
        <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.nick }">
          <label class="text-sm text-left">Ваше имя (никнейм):</label>
          <input type="text" name="nick" autofocus class="form-control" v-model="formData.nick"/>
          <span class="help-block" v-if="errors.nick">
              <strong>@{{ errors.nick[0]}}</strong>
          </span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group m-t-sm"  v-bind:class="{ 'has-error': errors.name }">
          <label class="text-sm text-left">Имя:</label>
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
          <label class="text-sm text-left">Телефон:</label>
          <input type="phone" data-value="{{Auth::check()?Auth::user()->phone:null}}" name="phone" autofocus  class="form-control"  v-model="formData.phone" ref="phone"/>
          <span class="help-block" v-if="errors.phone">
              <strong>@{{ errors.phone[0]}}</strong>
          </span>
        </div>

         <div class="form-group m-t-xxl m-b-none">
              <div class="checkbox">
                  <label class="i-checks">
                      <input type="checkbox"  v-model="aggree" name="checkme"><i></i>   Я согласен на обработку <a href="" class="text-sm text-green" data-toggle="modal" data-target="#modalpage-personal-data">персональных данных</a> и ознакомился с <a href="" class="text-sm text-green" data-toggle="modal" data-target="#modalpage-terms-of-service">правилами сервиса</a>
                  </label>
              </div>
          </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Напишите комментарий к заказу:</label>
            <textarea class="form-control form-control-grey no-resize summernote" rows="14"
                      name="message" required  v-model="formData.message"></textarea>
        </div>
        <button :disabled="!aggree" v-on:click="sendOrder()" class="btn btn-success text-u-c w-full">Заказать</button>
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

