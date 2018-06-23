@extends('layouts.app')



@section('content')


    <section class="container-fluid">
        <div class="row">

            <div style="background:url('{{isset($user->cfo['avatar']) ? $user->cfo['avatar'] : $user->avatar}}') center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row m-t">

                        <div class="container m-t-md top-desc-block">
                            <div class="col-md-6  pull-bottom text-white">
                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">{{$user->name}}</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <nav class="bg-danger box-shadow-lg">
                <div class="container">

                    @include('partials.breadcrumb',[
                        'breadcrumb' => [
                             '../cfo'=> 'Туризм в регионах Центрального Федерального Округа'
                        ],
                        'current' => $user->name
                    ])

                </div>
            </nav>


        </div>
    </section>




    <section class="container"  id="post-header">

        <div class="row m-t-md m-b-md">

            <div class="col-md-3">

                <!-- nav -->
                <nav class="navi clearfix  wrapper-sm">
                    <ul class="nav">


                        <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                            <span>Каталог ЦФО</span>
                        </li>
                        <li>
                            <a href="{{route('cfo.catalog',[$user->id,'festivals'])}}" class="text-ellipsis">
                                <i class="icon-lip-festival text-lg"></i>
                                <span>События</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cfo.catalog',[$user->id,'monument'])}}" class="text-ellipsis">
                                <i class="icon-lip-architect text-lg"></i>
                                <span>Достопримечательности</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cfo.invest',[$user->id,])}}" class="text-ellipsis">
                                <i class="icon-lip-architect text-lg"></i>
                                <span>Инвестиционные предложения </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('cfo.photo',[$user->id])}}" class="text-ellipsis">
                                <i class="icon-lip-photo text-lg"></i>
                                <span>Фото</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cfo.contacts',[$user->id,])}}" class="text-ellipsis">
                                <i class="icon-lip-architect text-lg"></i>
                                <span>Контакты </span>
                            </a>
                        </li>

                    </ul>




                </nav>
                <!-- nav -->

            </div>

            <div class="col-md-9">
                    @yield('cfo_main')
            </div>


        </div>

    </section>



@endsection
