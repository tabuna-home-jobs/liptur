@extends('layouts.app')

@section('content')


    <div class="container m-t-xxl">


        <div class="panel b box-shadow wrapper-lg">
            <div class="row">
                <div class="col-md-3 b-r b-light">

                    <!-- nav -->
                    <nav class="navi clearfix  wrapper-sm">
                        <ul class="nav">


                            <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                                <span>Мой профиль</span>
                            </li>
                            <li>
                                <a href="{{route('profile.liked')}}">
                                    <i class="icon-heart"></i>
                                    <span>Нравится</span>
                                </a>
                            </li>

                            {{--
                            <li class="disabled" title="Данная функция временно не доступна">
                                <a href="#">
                                    <i class="icon-tag"></i>
                                    <span>Мои закладки</span>
                                </a>
                            </li>
                            --}}

                            <li>
                                <a href="{{route('profile.routes')}}">
                                    <i class="icon-location-pin"></i>
                                    <span>Маршруты</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{route('profile.comments')}}">
                                    <i class="icon-speech"></i>
                                    <span>Комментарии</span>
                                </a>
                            </li>


                            <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                                <span class="">Общие настройки</span>
                            </li>
                            <li>
                                <a href="{{route('profile')}}">
                                    <i class="icon-wrench"></i>
                                    <span>Настройка</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('profile.password')}}">
                                    <i class="icon-lock-open"></i>
                                    <span>Смена пароля</span>
                                </a>
                            </li>


                            <li class="disabled" title="Данная функция временно не доступна">
                                <a href="#">
                                    <i class="icon-wallet"></i>
                                    <span>Платежи</span>
                                </a>
                            </li>


                        </ul>


                        <ul class="nav">
                            {{--
                             @if(Auth::user()->getRoles()->count() == 0)//Заменить в дальнейшем условие, которое ниже
                            --}}

                            @if(empty(Auth::user()->getRoles()))
                                <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                                    <span class="">Организация</span>
                                </li>

                                <li>
                                    <a href="{{route('profile.bid')}}" title="Хочу представить компанию">
                                        <i class="icon-pencil"></i>
                                        <span>Подать заявку</span>
                                    </a>
                                </li>
                            @elseif(Auth::user()->inRole('organization'))
                                <li class="disabled" title="Данная функция временно не доступна">
                                    <a href="#">
                                        <i class="icon-screen-desktop"></i>
                                        <span>Внешний вид</span>
                                    </a>
                                </li>

                                <li class="disabled" title="Данная функция временно не доступна">
                                    <a href="#">
                                        <i class="icon-list"></i>
                                        <span>Услуги</span>
                                    </a>
                                </li>

                                <li class="disabled" title="Данная функция временно не доступна">
                                    <a href="#">
                                        <i class="icon-folder-alt"></i>
                                        <span>Заявки</span>
                                    </a>
                                </li>

                                <li class="disabled" title="Данная функция временно не доступна">
                                    <a href="#">
                                        <i class="icon-pie-chart"></i>
                                        <span>Статистика</span>
                                    </a>
                                </li>
                            @elseif(Auth::user()->inRole('titz'))
                                <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                                    <span class="">Параметры ТИЦ</span>
                                </li>

                                <li>
                                    <a href="{{route('titz.edit')}}">
                                        <i class="icon-home"></i>
                                        <span>Cтраница ТИЦа</span>
                                    </a>
                                </li>
                            @elseif(Auth::user()->inRole('cfo'))
                                <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                                    <span class="">Параметры ЦФО</span>
                                </li>

                                <li>
                                    <a href="{{route('cfo.edit')}}">
                                        <i class="icon-home"></i>
                                        <span>Cтраница ЦФО</span>
                                    </a>
                                </li>
                            @elseif(Auth::user()->inRole('craftsmen'))
                                <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                                    <span class="">Параметры </span>
                                </li>

                                <li>
                                    <a href="{{route('craftsmen.edit')}}">
                                        <i class="icon-home"></i>
                                        <span>Публичная страница</span>
                                    </a>
                                </li>
                            @endif

                        </ul>


                        <ul class="nav">

                            <li class="hidden-folded text-danger padder m-t m-b-sm text-xs">
                                <span class="">Управление</span>
                            </li>


                            @if(Auth::user()->hasAccess('dashboard.index'))
                                <li>
                                    <a href="{{url('/dashboard')}}" title="Коммандная панель">
                                        <i class="icon-speedometer"></i>
                                        <span>Администрирование</span>
                                    </a>
                                </li>
                            @endif

                            <li class="disabled" title="Данная функция временно не доступна">
                                <a href="#">
                                    <i class="icon-support"></i>
                                    <span>Помощь</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i>
                                    <span>Выйти</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </li>


                        </ul>


                    </nav>
                    <!-- nav -->

                </div>

                <div class="col-md-9 ">


                    @yield('accounts')


                </div>
            </div>
        </div>
    </div>




@endsection
