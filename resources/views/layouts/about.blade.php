@extends('layouts.app')


@section('title','О нас')
@section('description','Информация о нашей деятельности')
@section('keywords','')



@section('content')


    <section class="container-fluid">
        <div class="row">


            <div style="background:url('/img/category/about.jpg') center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row m-t">
                        <div class="container m-t-md top-desc-block">
                            <div class="col-md-6  pull-bottom text-white">
                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">О нас</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="bg-danger box-shadow-lg">
                <div class="container">

                    @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                        'current' => 'О нас'
                    ])

                </div>
            </nav>

        </div>
    </section>





    <section>
        <div class="container padder-v">

            <div class="col-sm-4">
                <div class="padder-v">
                    <div class="list-group list-group-lg  list-no-border">
                        <a href="{{route('press')}}" class="list-group-item clearfix {{active('press')}}">Пресса о
                            нас</a>
                        <a href="{{route('docs')}}" class="list-group-item clearfix {{active('docs')}}">Документы</a>

                        <a href="{{route('regions')}}" class="list-group-item clearfix {{active('regions')}}">Контакты в
                            районах</a>
                    </div>
                </div>

                <div class="panel b box-shadow-lg" data-mh="main-info-block"
                     style="width: 100%; display: flex; align-items: center; justify-content: center; max-height: 500px; background: rgb(198, 198, 198);">

                    @widget('advertising','side')

                </div>

                <div class="panel b box-shadow-lg  text-center">
                    @widget('advertising','social')
                </div>

                @widget('EmailSecondary')

            </div>


            <div class="col-sm-8">
                <div class="padder-v">
                    @yield('listing')
                </div>
            </div>


        </div>


    </section>






@endsection
