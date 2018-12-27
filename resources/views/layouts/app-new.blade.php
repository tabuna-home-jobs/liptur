<!DOCTYPE html>
<html id="html" lang="{{App::getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta name="generator" content="WordPress">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',setting('site_title','')) - Липецкий туристский портал</title>
    <meta name="description" content="@yield('description',setting('site_description',''))">
    <meta name="auth" content="{{Auth::check()}}">
    <meta name="user_id" content="@if(Auth::check()){{ (int) (Auth::user()->id)}}@endif">

    <meta http-equiv="X-DNS-Prefetch-Control" content="on">
    <link rel="dns-prefetch" href="https://liptur.ru">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://maps.googleapis.com">


    <meta property="og:title" content="@yield('title',setting('site_title','')) - Липецкий туристский сервер">
    <meta property="og:description" content="@yield('description',setting('site_description',''))">
    <meta property="og:type" content="article">
    <meta property="og:image" content="@yield('image', config('app.url').'/img/new-logo.png')">
    <meta property="og:url" content="{{url()->current()}}">

    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="{{ elixir("/dist/css/shop.css") }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="/android-chrome-192x192.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f05050">
    <meta name="theme-color" content="#ffffff">
    @stack('stylesheet')


    <script type="text/javascript" src="{{ elixir('/dist/js/orchid.js') }}"></script>

</head>


<body itemscope itemtype="http://schema.org/WebPage">

<header id="header" class="navbar bg-white-only">

    @section('top-advertising')
        @widget('advertising','top')
    @stop
    @yield('top-advertising')
    <div class="container padder-t rebrand">
        <div class="navbar-row header-top">
            <div class="navbar-header text-center">
              <a href="/{{App::getLocale()}}" class="navbar-brand navbar-brand-left" title="На главную">
                <img src="/img/new-logo.png" alt="LipTur">
              </a>
            </div>
            <ul class="nav navbar-nav navbar-right hidden-xs row-flex v-center">
                <li class="no-padder">
                    <div class="navbar-phone">
                        <i class="phone-icon"></i>
                        <span>{{setting('shop_phone','8-800-200-81-20')}}</span>
                    </div>
                </li>
                <li class="col-sm-3 col-md-4 no-padder">
                    <div class="input-group nav-search">
                        <form action="{{Request::is('shop/*')?route('shop.newsproducts'):route('catalog.search')}}" class="form-inline">
                            <input type="text" class="form-control form-control-grey" name="search" placeholder="{{__('Enter the search')}}"
                                   maxlength="100" value="@if (isset($request['search'])){{$request['search']}} @endif">
                            <span class="input-group-btn">
                                <button class="green-button raised" type="submit" >
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </form>
                    </div>
                    <!-- <a href="#" rel="search" title="Поиск по веб-сайту" data-target="#modalSeachIn" data-toggle="modal">
                      <i class="icon-magnifier m-r-xs"></i>Поиск</a> -->
                </li>
                <li class="no-padder text-center">
                    <div class="navbar-locale">
                        <a href="{{Localization::getLocalizedURL('ru','/') }}"
                           class="green-button {{App::getLocale()=='ru'? 'raised': ''}}" hreflang="ru"
                           title="Сменить язык">РФ</a>
                        <a href="{{Localization::getLocalizedURL('en','/') }}"
                           class="green-button {{App::getLocale()=='en'? 'raised': ''}}" hreflang="en"
                           title="Сменить язык">EN</a>
                    </div>
                </li>

                <!-- Авторизация  -->
                @if (Auth::guest())
                    <li class="no-padder pull-right text-right">
                        <a href="{{ url('/login') }}" class="navbar-auth">
                            <div>
                                <i class="key-icon m-r-xs"></i>{{__('Login')}}
                            </div>
                        </a>
                    </li>
                @else
                    <li class=" no-padder pull-right">
                        <div class="navbar-profile">
                            <a href="{{ url('/profile') }}" title="Мой профиль">
                                <span class="thumb-sm avatar">
                                <img src="{{Auth::user()->getAvatar() }}" alt="{{Auth::user()->name}}">
                                <i class="on md b-white bottom"></i>
                                </span>
                            </a>
                            <a href="{{ url('/logout') }}" title="{{__('Logout')}}" class="navbar-auth">{{__('Logout')}}</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        
        <div class="clearfix"></div>

        @widget('menuWidget','shop-header')

        @section('submenu')
            <div class="submenu visible-xs">
                <div class="padder-v-micro row b-b"></div>
                <div class="row padder-l-xl no-p-xs">
                    <div class="col-xs-2">
                        <button class="btn btn-link visible-xs m-r m-v" type="button" data-toggle="collapse"
                                data-target=".menu-header-mobile">
                            <i class="fa fa-bars fa-lg"></i>
                        </button>
                    </div>
                    <div class="col-xs-10">
                        <div class="input-group nav-search m-t-md">
                            <form action="{{route('shop.newsproducts')}}" class="form-inline">
                                <input type="text" class="form-control form-control-grey" name="search" placeholder="{{__('Enter the search')}}"
                                       maxlength="100" value="@if (isset($request['search'])){{$request['search']}} @endif">
                                <span class="input-group-btn">
                                    <button class="green-button raised" type="submit" >
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @stop

        @yield('submenu')
        @php $menu=['shop-header','mobile'] @endphp
        @widget('menuWidget', $menu)

    </div>
</header>

<div id="content" class="">

    @yield('header')

    @yield('content')


    @section('ad-carousel')
        @include('partials.shop.index-ad-carousel')
    @stop
    @yield('ad-carousel')

    @include('partials.modals.support')
    @include('partials.modals.topmenu')

</div>

@section('footer')
<!-- footer -->

<footer id="footer" role="footer" class="bg-dark">

    <div class="contact-block">
        <div class="container">
            <div class="row contact-row">
                <div class="col-sm-6 col-md-3 hidden-xs vi-col-4">
                    <a  href="{{route('contacts')}}" class="wrapper-sm v-center imgs-hovers" title="Центр кластерного развития туризма">
                     <img class="img-responsive" data-src="/img/icons/map-1.png" data-hover-src="/img/icons/map-2.png" src="/img/icons/map-1.png" style="opacity: 1;">
                        <div>
                            <p class="m-b-xs text-muted text-xs text-u-c">{{__('Regional Center of Event Tourism')}}</p>
                            <p class="text-white text-md">{{__('398024 Lipetsk, Prospekt pobedi, 67a')}}{{-- setting('shop_adress','Липецк, ул. Фрунзе, 10') --}}</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 vi-hide phone">
                    <a href="tel:{{setting('shop_phone','8-800-200-81-20')}}" class="wrapper-sm v-center imgs-hovers" title="{{__('Phone number')}}">
                        <img class="img-responsive" data-src="/img/icons/phone-1.png" data-hover-src="/img/icons/phone-2.png" src="/img/icons/phone-1.png">
                        <div>
                            <p class="m-b-xs text-muted text-xs text-u-c">{{__('Phone number')}}</p>
                            <p class="text-white text-md">{{setting('shop_phone','8-800-200-81-20')}}</p>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3 hidden-xs vi-col-4">
                    <a class="wrapper-sm v-center imgs-hovers"  data-toggle="modal" data-target="#support"
                       title="{{__('Email')}}">
                        <img class="img-responsive" data-src="/img/icons/mail-1.png" data-hover-src="/img/icons/mail-2.png" src="/img/icons/mail-1.png" style="opacity: 1;">
                        <div>
                            <p class="m-b-xs text-muted text-xs text-u-c">{{__('Email')}}</p>
                            <p class="text-white text-md">{{setting('shop_email','info@liptur.ru')}}</p>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3 vi-hide hidden-xs socicons text-right">
                    <p>
                        <a href="{{setting('liptur_instagram','https://www.instagram.com/lipsobtur/')}}" target="_blank" class="btn btn-icon soc-vk">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="{{setting('liptur_vk','https://vk.com/liptur48')}}" target="_blank" class="btn btn-icon soc-vk">
                            <i class="fa fa-vk"></i>
                        </a>

                        <a href="{{setting('liptur_ok','https://ok.ru/lipsobtur')}}" target="_blank" class="btn btn-icon soc-od">
                            <i class="fa fa-odnoklassniki"></i>
                        </a>

                        <a href="{{setting('liptur_fb','https://www.facebook.com/%D0%A6%D0%B5%D0%BD%D1%82%D1%80-%D0%BA%D0%BB%D0%B0%D1%81%D1%82%D0%B5%D1%80%D0%BD%D0%BE%D0%B3%D0%BE-%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D1%8F-%D1%82%D1%83%D1%80%D0%B8%D0%B7%D0%BC%D0%B0-%D0%9B%D0%B8%D0%BF%D0%B5%D1%86%D0%BA%D0%BE%D0%B9-%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D0%B8-1784209968567425/')}}"
                           target="_blank" class="btn btn-icon soc-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="{{setting('liptur_youtube','https://www.youtube.com/channel/UCI4HbPUrzve2L889GRE8D-g')}}" target="_blank"
                           class="btn btn-icon soc-youtube">
                            <i class="fa fa-youtube"></i>
                        </a>

                        <a href="{{setting('liptur_twitter','https://twitter.com/lipsobtur')}}" target="_blank"
                           class="btn btn-icon soc-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="{{route('rss')}}" target="_blank" class="btn btn-icon soc-rss">
                            <i class="fa fa-rss" aria-hidden="true"></i>
                        </a>

                    </p>

                </div>

            </div>
        </div>
    </div>

    <hr>

    <div class="wrapper visible-lg vi-hide">
        <div class="container">
            <div class="row">
                @php 
                    $menus = ['shop-footer','footer-menu'];
                @endphp
                @widget('menuWidget',$menus)
            </div>
        </div>
    </div>


    <div class="bg-black-opacity">
        <div class="container">
            <div class="padder-v m-t-md m-b-md v-center">
                <div class="col-xs-12 col-md-6">
                    <p class="text-copyright m-b-n">© 2016-2018 {{__('Center of cluster development of tourism of the Lipetsk region')}}</p>
                </div>
                <div class="col-xs-12 col-md-3 col-md-offset-3 text-right no-padder">
                    <div class="pull-right">
                        <div class="v-center">
                            <a class="text-campaing m-n text-left imgs-hovers">
                                <img src="/img/icons/artp.png" data-src="/img/icons/artp.png" data-hover-src="/img/icons/artp-hover.png"  class="m-r-sm">
                                <span>{{__('Site development')}} – <br>
                                    {{__('Artpolytyka')}}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</footer>
<!-- / footer -->
@stop
@yield('footer')


<!-- Yandex.Metrika counter -->
<script type="text/javascript"> (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter41718074 = new Ya.Metrika({
                    id: 41718074,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
            }
        });
        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
            n.parentNode.insertBefore(s, n);
        };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks"); </script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/41718074" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript> <!-- /Yandex.Metrika counter -->


<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-99648434-1', 'auto');
    ga('send', 'pageview');

</script>

@stack('scripts')
</body>

</html>
