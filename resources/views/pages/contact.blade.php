@extends('layouts.app')

@section('content')



<section class="container-fluid">
<div class="row">


<div style="background:url(/img/tour/background/contact.jpg) center center; background-size:cover">
<div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt">
<div class="row m-t">


<div class="container m-t-md top-desc-block">


<div class="col-md-6  pull-bottom text-white">


  <h1 class="text-white text-ellipsis padder-v xs-x-scroll">Контакты</h1>

</div>


</div>


</div>
</div>
</div>


<nav class="bg-danger box-shadow-lg">
<div class="container">
@include('partials.breadcrumb',[
'breadcrumb' => [],
'current' => 'Контакты'
])
</div>
</nav>


</div>
</section>



<div class="bg-white box-shadow-lg">


<section class="container">
<div class="row wrapper-md  m-t-md m-b-xs">
<div id="helpletter" class="col-md-6 hidden-xs hidden-sm">
<p class="h3 font-thin m-b-md">Вам нужна <span class="text-danger">помощь</span>?</p>


<p class="semi-bold no-margin">Заполните эту форму, чтобы связаться с нами, если у вас есть
какие-либо дополнительные вопросы</p>

<form role="form" id="helpletter-form" class="m-t-md" v-on:submit.prevent="send">
<div class="row">
<div class="col-sm-6">
  <div class="form-group form-group-default">
      <label class="small">Ваше имя</label>
      <input type="text" required class="form-control" placeholder="Иван" v-model="formData.firstName">
  </div>
</div>
<div class="col-sm-6">
  <div class="form-group  form-group-default">
      <label class="small">Ваша фамилия</label>
      <input type="text" required class="form-control" placeholder="Иванович" v-model="formData.lastName">
  </div>
</div>
</div>

<div class="row m-t-xs">
<div class="col-sm-6">
  <div class="form-group  form-group-default">
      <label for="email" class="small">Ваш электронный адрес</label>
      <input type="email" class="form-control" name="email" required
             placeholder="ivanov@ivan.com" v-model="formData.email">
  </div>
</div>


<div class="col-sm-6">
  <div class="form-group form-group-default">
      <label for="phone" class="small">Ваш номер телефона</label>
      <input type="text" data-maSsk="+ 9-999-999-99-99" class="form-control" name="phone"
             required placeholder="+795554545" v-model="formData.phone">
  </div>
</div>
</div>


<div class="form-group form-group-default  m-t-xs">
<label class="small">Ваше сообщение</label>
<textarea placeholder="Введите сообщение, которое вы хотите отправить" required rows="5"
        class="form-control  no-resize" v-model="formData.message"></textarea>
</div>


<div class="m-t-md clearfix">
  <vue-recaptcha ref="recaptcha"
                @verify="onVerify"
                @expired="onExpired"
                data-sitekey="{{config('services.google.recaptcha.sitekey')}}">
  </vue-recaptcha>
</div>
<div v-if="errors['g-recaptcha-response']" class="alert alert-warning">
     <strong>Докажите, что вы не робот.</strong>
</div>
<div class="m-t-md clearfix">
<p class="pull-left small m-t-xs">Настоящим я подтверждаю, что даю согласие на обработку
  персональных данных </p>
<button form="helpletter-form" type="submit" class="btn btn-danger btn-rounded pull-right">
  Отправить сообщение
</button>
</div>


<div class="clearfix"></div>
</form>

</div>
<div class="col-md-6 col-xs-12 col-sm-12">

<p class="h3 font-thin m-b-md"><span class="text-danger">Контакты</span> для связи</p>

<div class="row">
<div class="col-sm-6">
<h5 class="block-title font-bold hint-text m-b-0">ОКУ «Центр кластерного развития туризма
  Липецкой области» </h5>
<address class="m-t-10">
  398059, г. Липецк,

  ул. Фрунзе, 10
</address>


<p class=""><span class="font-bold">Телефон:</span>
  <span class="font-thin"><a href="tel:+74742220360">+7(4742) 22-03-60</a></span>
  <span class="font-thin block text"><a href="tel:88001003048">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8-800-100-30-48</a></span>
</p>
<p class=""><span class="font-bold">Факс:</span>
  <span class="font-thin"><a href="tel:+74742220358">+7(4742) 22-03-58</a></span></p>
<p class=""><span class="font-bold">Электронная почта</span>
  <span class="font-thin"><a href="mailto:tourclaster@liptur.ru">tourclaster@liptur.ru</a></span></p>

</div>
<div class="col-sm-6">
<h5 class="block-title font-bold hint-text m-b-0">ОАУ «Областной Центр событийного
  туризма» </h5>
<br>
<address class="m-t-10">
  398024, г. Липецк,
   пр-т. Победы, 67а
</address>
<br>


<p class=""><span class="font-bold">Телефон:</span>
  <span class="font-thin"><a href="tel:+74742478292">+7(4742) 47-82-92</a></span>
  <span class="font-thin block text"><a href="tel:88001003048">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;
         8-800-200-81-20</a></span>
</p>

</div>
</div>


<div class="row">
<hr>
<div class="col-sm-6">
<h5 class="block-title font-bold hint-text m-b-0">Начальник управления культуры и туризма
  Липецкой области</h5>

<p>Волков Вадим Геннадьевич</p>

<p class=""><span class="font-bold">Телефон:</span>
  <span class="font-thin"><a href="tel:+74742724618">+7(4742) 72-46-18</a></span></p>
</div>



<div class="col-sm-6">
<h5 class="block-title font-bold hint-text m-b-0">Первый заместитель начальника управления культуры и туризма
  Липецкой области</h5>

<p>Тимохин Андрей Николаевич</p>

<p class=""><span class="font-bold">Телефон:</span>
  <span class="font-thin"><a href="tel:+74742724618">+7(4742) 27-24-57</a></span></p>
</div>




     <div class="col-sm-6">
<h5 class="block-title font-bold hint-text m-b-0">Начальник отдела по развитию туризма</h5>

<p>Стрельникова Светлана Валерьевна</p>


<p class=""><span class="font-bold">Телефон:</span>
  <span class="font-thin"><a href="tel:+74742272360">+7(4742) 27-23-60</a></span></p>
</div>


</div>

</div>
</div>
</section>


</div>




<div id="map-contact" class="maps">
</div>

@endsection




@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_9M5O7t88YovZa2mePQ9VX4f79c86cqg"
type="text/javascript"></script>
@endpush
