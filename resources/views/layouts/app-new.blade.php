<!DOCTYPE html>
<html id="html" lang="{{App::getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta name="generator" content="WordPress">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',setting('site_title','')) - Липецкий туристский портал</title>
    <meta name="description" content="@yield('description',setting('site_description',''))">
    <meta name="keywords"
          content="@yield('keywords',setting('site_keywords',''))"> {!! Feed::link(route('rss'), 'atom', 'Новостная лента', App::getLocale()) !!}


    <meta name="auth" content="{{Auth::check()}}">
    <meta name="user_id" content="@if(Auth::check()){{ (int) (Auth::user()->id)}}@endif">

    <meta http-equiv="X-DNS-Prefetch-Control" content="on">
    <link rel="dns-prefetch" href="https://liptur.ru">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://maps.googleapis.com">


    <meta property="og:title" content="@yield('title',setting('site_title','')) - Липецкий туристский сервер">
    <meta property="og:description" content="@yield('description',setting('site_description',''))">
    <meta property="og:type" content="article">
    <meta property="og:image" content="@yield('image', config('app.url').'/img/tour/logo.png')">
    <meta property="og:url" content="{{url()->current()}}">

    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="{{ elixir("/dist/css/shop.css") }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="/img/logo.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f05050">
    <meta name="theme-color" content="#ffffff">
    @stack('stylesheet')
</head>


<body itemscope itemtype="http://schema.org/WebPage">

<header id="header" class="navbar bg-white-only">


    @widget('advertising','top')


    <div class="container padder-t rebrand">
        <div class="navbar-header text-center">
          <a href="/{{App::getLocale()}}" class="navbar-brand m-r-lg navbar-brand-left" title="На главную">
            <img src="/img/new-logo.png" alt="LipTur">
          </a>
        </div>
        <ul class="nav navbar-nav navbar-right hidden-xs">
            <li class="col-md-3">
                <div class="navbar-phone">
                    <i class="phone-icon"></i>
                    <span>8-800-200-81-20</span>
                </div>
            </li>
            <li class="col-md-5">
                <div class="input-group nav-search">
                    <input type="text" class="form-control form-control-grey" placeholder="Введите искомое"
                           maxlength="100">
                    <span class="input-group-btn">
              <button class="green-button raised" type="button">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </span>
                </div>
                <!-- <a href="#" rel="search" title="Поиск по веб-сайту" data-target="#modalSeachIn" data-toggle="modal">
                  <i class="icon-magnifier m-r-xs"></i>Поиск</a> -->
            </li>
            <li class="col-md-2">
                <div class="navbar-locale">
                    <a href="{{Localization::getLocalizedURL('ru') }}"
                       class="green-button {{App::getLocale()=='ru'? 'raised': ''}}" hreflang="ru"
                       title="Сменить язык">РФ</a>
                    <a href="{{Localization::getLocalizedURL('en') }}"
                       class="green-button {{App::getLocale()=='en'? 'raised': ''}}" hreflang="en"
                       title="Сменить язык">EN</a>
                </div>
            </li>


            <!-- Авторизация  -->
            @if (Auth::guest())
                <li class="col-md-2">
                    <div class="navbar-auth">
                        <i class="key-icon m-r-xs"></i>
                        <a href="{{ url('/login') }}">Вход</a>
                    </div>
                </li>
            @else

                <li>
                    <a href="{{ url('/profile') }}" title="Мой профиль">
            <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
              <img src="{{Auth::user()->getAvatar() }}" alt="{{Auth::user()->name}}">
              <i class="on md b-white bottom"></i>
            </span>
                        <span class="hidden-sm hidden-md">{{Auth::user()->name}}</span>
                    </a>
                </li>


            @endif


        </ul>
        <div class="clearfix"></div>
        <div class="collapse navbar-collapse m-t-md b-b no-padder">
            <ul class="nav navbar-nav">
                <li>
                    <button class="btn btn-link" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
                <li>
                    <a href="{{route('about')}}" rel="prefetch" title="Интересные факты">Об области</a>
                </li>
                <li>
                    <a href="{{route('news')}}" title="Новости Липецкой области">Новости</a>
                </li>
                <li>
                    <a href="{{route('investor')}}" title="Потенциал области">Инвесторам</a>
                </li>


                <li class="dropdown pos-stc">
                    <a href="#" data-toggle="dropdown" class=" dropdown-toggle" aria-expanded="true">
                        Категории
                    </a>
                    <div class="dropdown-menu wrapper w-full bg-white">
                        <div class="row">
                            <div class="col-sm-4 col-md-6">
                                @widget('menuCategory')
                            </div>
                            <div class="col-sm-4 col-md-6 b-l b-light">
                                @widget('menuTopMiddleColum')
                            </div>
                        </div>
                    </div>
                </li>


            </ul>
        </div>
        
        <div class="visible-xs padder-v-micro row"></div>
      
        <div class="row padder-l-xl no-p-xs">
            <div class="col-xs-9 hidden-xs">
                <ul class="nav navbar-nav nav-bar-sub font-bold text-u-c">
                    <li><a class="text-green" href="#">Каталог товаров</a></li>
                    <li><a class="text-green" href="#">Доставка и оплата</a></li>
                    <li><a class="text-green" href="#">Контакты</a></li>
                    <li><a class="text-green" href="#">Обратная связь</a></li>
                </ul>
            </div>
            <div class="col-xs-6 visible-xs">
               <button class="btn btn-link visible-xs m-r m-v" type="button" data-toggle="collapse"
                  data-target=".navbar-collapse">
                  <i class="fa fa-bars fa-lg"></i>
              </button>
            </div>
            <div class="col-xs-6 col-md-3">
              <ul class="nav nav-cart pull-right">
                <li>
                  <a>
                    <i class="cart-icon"></i> 0 товаров
                  </a>
                </li>
              </ul>
            </div>
        </div>
    </div>
</header>

<div id="content" class="">


    @yield('content')


</div>


<!-- footer -->

<footer id="footer" role="footer" class="bg-dark">


    <div class="padder-v">
        <div class="container no-padder">
            <div class="row padder-v">
                <div class="col-md-3 hidden-sm vi-col-4">
                    <a href="tel:+74742272360" class="wrapper-sm v-center" title="Телефон приёмного отделения">
                        <i class="icon-phone fa-2x m-r-sm"></i>
                        <div>
                            <p class="m-b-xs text-muted text-xs text-u-c">Центр кластерного развития туризма</p>
                            <p class="text-white text-md">Липецк, ул. Фрунзе, 10</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 vi-hide">
                    <a href="{{route('contacts')}}" class="wrapper-sm v-center" title="Териториальное расположение">
                        <i class="icon-phone fa-2x m-r-sm"></i>
                        <div>
                            <p class="m-b-xs text-muted text-xs text-u-c">Центр кластерного развития туризма</p>
                            <p class="text-white text-md">Липецк, ул. Фрунзе, 10</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 hidden-sm vi-col-4">
                    <a class="wrapper-sm click-visually v-center" data-toggle="visually-impaired" data-target="#html"
                       title="Сайт доступен для людей с ограниченными возможностями">
                        <i class="icon-phone fa-2x m-r-sm"></i>
                        <div>
                            <p class="m-b-xs text-muted text-xs text-u-c">Центр кластерного развития туризма</p>
                            <p class="text-white text-md">Липецк, ул. Фрунзе, 10</p>
                        </div>
                    </a>
                </div>


                <div class="col-md-3 col-sm-6 vi-hide">
                    <p>
                        <a href="https://vk.com/liptur48" target="_blank" class="btn btn-icon btn-rounded btn-grey">
                            <i class="fa fa-vk"></i>
                        </a>

                        <a href="https://ok.ru/lipsobtur" target="_blank" class="btn btn-icon btn-rounded btn-grey">
                            <i class="fa fa-odnoklassniki"></i>
                        </a>

                        <a href="https://www.facebook.com/%D0%A6%D0%B5%D0%BD%D1%82%D1%80-%D0%BA%D0%BB%D0%B0%D1%81%D1%82%D0%B5%D1%80%D0%BD%D0%BE%D0%B3%D0%BE-%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D1%8F-%D1%82%D1%83%D1%80%D0%B8%D0%B7%D0%BC%D0%B0-%D0%9B%D0%B8%D0%BF%D0%B5%D1%86%D0%BA%D0%BE%D0%B9-%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D0%B8-1784209968567425/"
                           target="_blank" class="btn btn-icon btn-rounded btn-grey">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="https://www.youtube.com/channel/UCI4HbPUrzve2L889GRE8D-g" target="_blank"
                           class="btn btn-icon btn-rounded btn-grey">
                            <i class="fa fa-youtube"></i>
                        </a>

                        <a href="https://twitter.com/lipsobtur" target="_blank"
                           class="btn btn-icon btn-rounded btn-grey">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="{{route('rss')}}" target="_blank" class="btn btn-icon btn-rounded btn-grey">
                            <i class="fa fa-rss" aria-hidden="true"></i>
                        </a>

                    </p>

                </div>

            </div>
        </div>
    </div>

    <hr>

    <div class="wrapper bg-gray hidden-xs vi-hide">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3">


                    <h4 class=" m-b text-white">О нас</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/about" rel="follow" class="qwert" title="Презентация области" target="_self">

                                Об области</a></li>

                        <li><a href="/investor" rel="follow" class="qwert" title="Предложения для инвесторов"
                               target="_self">

                                Инвесторам</a></li>

                        <li><a href="/docs" rel="follow" class="qwert" title="Нормативные документы" target="_self">

                                Документы</a></li>

                        <li><a href="/press" rel="follow" class="qwert" title="О нас говорят" target="_self">

                                Пресса о нас</a></li>

                        <li><a href="/contacts" rel="follow" class="qwert" title="Связаться с нами" target="_self">

                                Контакты</a></li>
                    </ul>

                    <h4 class=" m-b text-white">Что посмотреть</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/public/ru/catalog/exhibitions" rel="follow" class="" title="" target="_self">

                                Выставки</a></li>

                        <li><a href="/public/ru/catalog/reserves" rel="follow" class="" title="" target="_self">

                                Заповедные места</a></li>

                        <li><a href="/public/ru/catalog/сinema" rel="follow" class="" title="" target="_self">

                                Кинотеатры</a></li>

                        <li><a href="/public/ru/catalog/museums" rel="follow" class="" title="" target="_self">

                                Музеи</a></li>

                        <li><a href="https://liptur.ru/ru/catalog/monument" rel="follow" class="" title=""
                               target="_self">

                                Достопримечательности</a></li>

                        <li><a href="/public/ru/catalog/shrines" rel="follow" class="" title="" target="_self">

                                Православные святыни</a></li>

                        <li><a href="/public/ru/catalog/arts_and_recreation" rel="follow" class="" title=""
                               target="_self">

                                Театры и дома культуры</a></li>

                        <li><a href="/public/ru/catalog/granges" rel="follow" class="" title="" target="_self">

                                Усадьбы</a></li>
                    </ul>

                    <h4 class=" m-b text-white">Где отдыхать</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/public/ru/catalog/hostel" rel="" class="" title="" target="_self">

                                Гостиницы</a></li>

                        <li><a href="/public/ru/catalog/sanatorium" rel="" class="" title="" target="_self">

                                Санатории</a></li>

                        <li><a href="/public/ru/catalog/recration-center" rel="" class="" title="" target="_self">

                                Базы отдыха</a></li>

                        <li><a href="/public/ru/catalog/center" rel="" class="" title="" target="_self">

                                Торгово-развлекальные центры</a></li>

                        <li><a href="/public/ru/catalog/beach" rel="" class="" title="" target="_self">

                                Пляжи</a></li>

                        <li><a href="/public/ru/catalog/park" rel="" class="" title="" target="_self">

                                Парки</a></li>
                    </ul>


                </div>
                <div class="col-xs-12 col-sm-3">


                    <h4 class=" m-b text-white">Гастрономия</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/ru/catalog/gastronomy?category%5B%5D=restaurants&amp;distance=1" rel="" class=""
                               title="Рестораны Липецкой области" target="_self">

                                Рестораны</a></li>

                        <li><a href="https://liptur.ru/ru/catalog/gastronomy?category%5B%5D=cafe&amp;distance=1" rel=""
                               class="" title="" target="_self">

                                Кафе</a></li>

                        <li><a href="https://liptur.ru/ru/catalog/gastronomy?category%5B%5D=tastings&amp;distance=1"
                               rel="" class="" title="" target="_self">

                                Дегустации</a></li>

                        <li><a href="https://liptur.ru/ru/catalog/gastronomy?category%5B%5D=bars&amp;distance=1" rel=""
                               class="" title="" target="_self">

                                Бары</a></li>
                    </ul>

                    <h4 class=" m-b text-white">Готовые предложения</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li>
                            <a href="https://liptur.ru/ru/catalog/agencie?category%5B%5D=the-offer-of-tour-operators&amp;distance=1"
                               rel="" class="" title="" target="_self">

                                Туры</a></li>

                        <li><a href="/titz" rel="" class="" title="Туристско-Информационные центры" target="_self">

                                ТИЦ</a></li>

                        <li><a href="/public/ru/catalog/agencie" rel="" class="" title="" target="_self">

                                Предложения турагентств</a></li>
                    </ul>

                    <h4 class=" m-b text-white">Сделано в ЛО</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/public/ru/catalog/gift_crafts" rel="" class="" title="" target="_self">

                                Сувениры и ремесла</a></li>
                    </ul>


                </div>
                <div class="col-xs-12 col-sm-3">


                    <h4 class=" m-b text-white">Прочее</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/regions" rel="" class="" title="" target="_self">

                                Телефонный справочник</a></li>

                        <li><a href="/public/ru/catalog/guides" rel="" class="" title="" target="_self">

                                Информация для экскурсоводов</a></li>
                    </ul>

                    <h4 class=" m-b text-white">Информация для туристов</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="https://liptur.ru/ru/calendar-event" rel="follow" class=""
                               title="Календарь событий" target="_self">

                                Календарь событий</a></li>

                        <li><a href="/ru/catalog/info" rel="follow" class="" title="Пригодится" target="_self">

                                Полезная информация</a></li>
                    </ul>

                    <h4 class=" m-b text-white">Охота/Рыбалка</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/ru/catalog/hunting" rel="" class="" title="" target="_self">

                                Охота</a></li>

                        <li><a href="/public/ru/catalog/fishing" rel="" class="" title="" target="_self">

                                Рыбалка</a></li>
                    </ul>


                </div>
                <div class="col-xs-12 col-sm-3">


                    <h4 class=" m-b text-white">Транспорт</h4>

                    <ul class="list-unstyled m-b-md text-sm">

                        <li><a href="/public/ru/catalog/taxi" rel="" class="" title="Такси" target="_self">

                                Такси</a></li>

                        <li><a href="/public/ru/catalog/railway" rel="" class="" title="Вокзалы области" target="_self">

                                Ж/Д Вокзалы</a></li>

                        <li><a href="/public/ru/catalog/airport" rel="" class="" title="Аэропорт Липецка"
                               target="_self">

                                Аэропорт</a></li>
                    </ul>

                    <h4 class=" m-b text-white"></h4>

                    <ul class="list-unstyled m-b-md text-sm">
                    </ul>


                </div>
            </div>
        </div>
    </div>


    <div class="bg-black-opacity">
        <div class="container">
            <div class="row padder-v m-t-md m-b-md v-center">
                <div class="col-md-6">
                    <p class="text-copyright m-b-n">© 2016-2018 ОКУ «Центр кластерного развития туризма Липецкой области»</p>
                </div>
                <div class="col-md-3 col-md-offset-3 text-right">
                    <div>
                        <div class="v-center">
                            <img src="/img/artp.png" class="m-r-sm">
                            <p class="text-campaing m-n text-left">
                        <span>Разработка сайта – <br>
                            Артполитика
                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</footer>
<!-- / footer -->

<script type="text/javascript" src="{{ elixir('/dist/js/orchid.js') }}"></script>

</body>

</html>
