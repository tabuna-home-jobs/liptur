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
          <div class="col-md-6 no-padder-h">
            <div class="bg-black text-white inline wrapper-sm padder-md m-r-sm">Шаг 1 </div>
            Выберите способ получения заказа:
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <select name="deliveryMethod" class="select2 form-control">
                <option value="pickup">Самовывоз</option>
                <option value="delivery">Доставка</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 no-padder-h">
            <div class="bg-black text-white inline wrapper-sm padder-md m-r-sm">Шаг 2 </div>
            Выберите способ оплаты:
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <select name="paymentMethod" class="select2 form-control">
                <option value="pickup">Наличными</option>
                <option value="delivery">Банковская карта</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 no-padder-h">
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
          Если вы не авторизованы - <a href="#" class="text-red">авторизуйтесь</a> или заполните поля ниже
        </div>
      </div>
      <div class="clearfix m-b-md"></div>
      <div class="col-md-4">
        <div class="form-group m-t-sm">
          <label class="text-sm text-left">Введите ваш Email (это будет логин):</label>
          <input type="email" name="email" autofocus
                  required  class="form-control">
        </div>
        <div class="form-group m-t-sm">
          <label class="text-sm text-left">Введите Пароль:</label>
          <input type="password" name="password" autofocus
                  required  class="form-control">
        </div>
        <div class="form-group m-t-sm">
          <label class="text-sm text-left">Повторите пароль еще раз:</label>
          <input type="password" name="retryPassword" autofocus
                  required  class="form-control">
        </div>
        <div class="form-group m-t-sm">
          <label class="text-sm text-left">Ваше имя (никнейм):</label>
          <input type="text" name="nick" autofocus class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group m-t-sm">
          <label class="text-sm text-left">Имя:</label>
          <input type="text" name="first_name" autofocus
                  required  class="form-control">
        </div>
        <div class="form-group m-t-sm">
          <label class="text-sm text-left">Фамилия:</label>
          <input type="text" name="last_name" autofocus  class="form-control">
        </div>

        <div class="form-group m-t-sm">
          <label class="text-sm text-left">Телефон:</label>
          <input type="phone" name="phone" autofocus  class="form-control">
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</section>
@endsection