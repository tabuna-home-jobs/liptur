@extends('layouts.app')



@section('content')


    <section class="container-fluid">
        <div class="row">

            <div style="background:url('{{$user->avatar}}') center center; background-size:cover">
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
                             '/craftsmen'=> 'Ремесленики'
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
                            <span>Каталог Ремесленников</span>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'news'])}}" class="text-ellipsis">
                                <i class="icon-lip-list text-lg"></i>
                                <span>Новости</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'festivals'])}}" class="text-ellipsis">
                                <i class="icon-lip-festival text-lg"></i>
                                <span>События</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'monument'])}}" class="text-ellipsis">
                                <i class="icon-lip-architect text-lg"></i>
                                <span>Достопримечательности</span>
                            </a>
                        </li>
                        {{--
                        <li>
                            <a href="#" class="text-ellipsis">
                                <i class="icon-lip-photo text-lg"></i>
                                <span>Галерея</span>
                            </a>
                        </li>
                        --}}
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'contest'])}}" class="text-ellipsis">
                                <i class="icon-lip-concert text-lg"></i>
                                <span>Концерты</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'agencie'])}}" class="text-ellipsis">
                                <i class="icon-lip-passport text-lg"></i>
                                <span>Заказать экскурсию</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'leisure'])}}" class="text-ellipsis">
                                <i class="icon-lip-festivites text-lg"></i>
                                <span>Активный отдых</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'childrest'])}}" class="text-ellipsis">
                                <i class="icon-lip-ferris-wheel text-lg"></i>
                                <span>Детский отдых</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'exhibitions'])}}" class="text-ellipsis">
                                <i class="icon-lip-exibition text-lg"></i>
                                <span>Выставки</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'icon-lip-embroidery'])}}" class="text-ellipsis">
                                <i class="icon-lip-ferris-wheel text-lg"></i>
                                <span>Сувениры и ремесла</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('craftsmen.catalog',[$user->id,'museums'])}}" class="text-ellipsis">
                                <i class="icon-lip-monument text-lg"></i>
                                <span>Музеи</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('craftsmen.photo',[$user->id])}}" class="text-ellipsis">
                                <i class="icon-lip-photo text-lg"></i>
                                <span>Фото</span>
                            </a>
                        </li>

                    </ul>




                </nav>
                <!-- nav -->

            </div>

            <div class="col-md-5">

                    @yield('craftsmen_main')
            </div>


            <aside class="col-md-4 hidden-xs hidden-sm">


                <div class="panel wrapper-xl b box-shadow-lg padder-lg text-center">
                    <p class="h3 font-thin m-b-lg">Контактный <span class="text-danger">Телефон</span>
                    </p>

                    <p class="h3 font-thin">
                        <i class="icon-phone text-danger icon-title"></i>
                        <a href="tel://{{$user->phone}}" class="phone block m-t-md">{{$user->phone}}</a>
                    </p>

                    <p class="m-t padder small">{{$user->address}}</p>
                </div>


                @widget('lastEventSidebar',10)

            </aside>


        </div>

    </section>



@endsection
