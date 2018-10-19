@extends('layouts.app-new')


@section('title','О нас')
@section('description','Информация о нашей деятельности')
@section('keywords','')


@section('header')
    <div id="post-header" class="catalog-item">
        <div style="background:url('/img/category/about.jpg') center center; background-size:cover">
            <div class="bg-black-opacity bg-dark">
                <div class="container pos-rlt min-h-h">

                    <div class="row m-t-xxl m-b-md padder-v">
                        <div class="pull-bottom text-white padder-v m-l-xl">
                            <h1 class="text-white brand-header" itemprop="headline">О нас</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="container-lg">
            <div class="row">
                <nav>
                    <div class="container">
                        @include('partials.breadcrumb',[
                            'breadcrumb' => [],
                            'current' => 'О нас'
                        ])
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection


@section('content')


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
