@extends('layouts.app')



@section('content')



    <div class="container-fluid bg-white">

        <div class="row b-b box-shadow">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        <ol class="breadcrumb">
                            <li><a href="#">Главная</a></li>
                            <li class="active">503</li>
                        </ol>


                        <div class="page-header">
                            <h1>Наш сайт обновляется<br>
                                <small>Извините за временные неудобства!</small>
                            </h1>
                        </div>


                        <div>
                            <p class="h4 padder-v">
                                Мы постараемся завершить все работы в ближайшее время
                            </p>
                            <p class="small">

                            </p>

                        </div>


                    </div>

                    <div class="col-md-6">

                        <div class='pageOption pull-right'>
                            <a href='/' class='option' title="На главную">
                                <img src='/img/update.jpg'>
                            </a>
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>









@endsection