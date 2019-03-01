@extends('layouts.app-new')



@section('content')



  <div class="container-fluid bg-white">

    <div class="row b-b box-shadow">

      <div class="container">

        <div class="row">

          <div class="col-md-6">

            <ol class="breadcrumb">
              <li><a href="#">Главная</a></li>
              <li class="active">Оплата покупки</li>
            </ol>


            <div class="page-header">
              <h1>
                <small>{{$message}}</small>
              </h1>
            </div>

            <div class='pageOption'>
              <a href="/" class="btn btn-warning m-t w-full text-u-c">На главную</a>
            </div>

          </div>

        </div>
      </div>


    </div>

  </div>









@endsection