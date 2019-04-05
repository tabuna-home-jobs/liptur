@extends('layouts.app-new')

@section('header')
    <div id="post-header" class="catalog-item">
        <div style="background:url('{{isset($user->titz['avatar']) ? $user->titz['avatar'] : $user->avatar}}') center center; background-size:cover">
            <div class="bg-black-opacity bg-dark">
                <div class="container pos-rlt min-h-h">

                    <div class="row m-t-xxl m-b-md padder-v">
                        <div class="pull-bottom text-white padder-v m-l-xl">
                            <h1 class="text-white brand-header" itemprop="headline">{{$user->name}}</h1>
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
                            'base' => [
                                'route' => route('titz'),
                                'name' => 'Туристско-Информационные центры',
                            ],
                            'current' => $user->name
                        ])
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection



@section('content')

    <section class="container"  id="post-header">

        <div class="row m-t-md m-b-md">

            <div class="col-md-3">

                <!-- nav -->
                <nav class="navi clearfix  wrapper-sm">
                    <ul class="nav">


                        <li class="hidden-folded text-success  padder m-t m-b-sm text-xs">
                            <span>Каталог ТИЦа</span>
                        </li>
                        <li>
                            <a href="{{route('titz.catalog',[$user->id,'news'])}}" class="text-ellipsis">
                                <i class="icon-lip-list text-lg"></i>
                                <span>Новости</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('titz.catalog',[$user->id,'festivals'])}}" class="text-ellipsis">
                                <i class="icon-lip-festival text-lg"></i>
                                <span>Фестивали</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('titz.catalog',[$user->id,'monument'])}}" class="text-ellipsis">
                                <i class="icon-lip-architect text-lg"></i>
                                <span>Достопримечательности</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('titz.catalog',[$user->id,'route'])}}" class="text-ellipsis">
                                <i class="fa fa-bus text-lg" style="color: #777"></i>
                                <span>Маршруты</span>
                            </a>
                        </li>

                         <li>
                            <a href="{{route('titz.catalog',[$user->id,'museums'])}}" class="text-ellipsis">
                                <i class="icon-lip-monument text-lg"></i>
                                <span>Музеи</span>
                            </a>
                        </li>

                         <li>
                            <a href="{{route('titz.catalog',[$user->id,'gift_crafts'])}}" class="text-ellipsis">
                                <i class="icon-lip-ferris-wheel text-lg"></i>
                                <span>Сувениры и ремесла</span>
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
                            <a href="{{route('titz.photo',[$user->id])}}" class="text-ellipsis">
                                <i class="icon-lip-photo text-lg"></i>
                                <span>Галерея</span>
                            </a>
                        </li>

                        <!-- <li>
                            <a href="{{route('titz.catalog',[$user->id,'contest'])}}" class="text-ellipsis">
                                <i class="icon-lip-concert text-lg"></i>
                                <span>Концерты</span>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="{{route('titz.catalog',[$user->id,'agencie'])}}" class="text-ellipsis">
                                <i class="icon-lip-passport text-lg"></i>
                                <span>Заказать экскурсию</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="{{route('titz.catalog',[$user->id,'leisure'])}}" class="text-ellipsis">
                                <i class="icon-lip-festivites text-lg"></i>
                                <span>Досуг</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="{{route('titz.catalog',[$user->id,'childrest'])}}" class="text-ellipsis">
                                <i class="icon-lip-ferris-wheel text-lg"></i>
                                <span>Детский отдых</span>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="{{route('titz.catalog',[$user->id,'exhibitions'])}}" class="text-ellipsis">
                                <i class="icon-lip-exibition text-lg"></i>
                                <span>Выставки</span>
                            </a>
                        </li> -->
                    </ul>




                </nav>
                <!-- nav -->

            </div>

            <div class="col-md-5">

                    @yield('titz_main')
            </div>


            <aside class="col-md-4 hidden-xs hidden-sm">

                @if(!empty($user->phone))
                    @include('partials.item.phone',[
                        'phone' => $user->phone,
                        'address' => $user->address,
                    ])
                @endif

                @widget('lastEventSidebar',10)

            </aside>


        </div>

    </section>



@endsection
