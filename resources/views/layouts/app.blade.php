<!DOCTYPE html>
<html id="html" lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="generator" content="WordPress">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',setting('site_title','')) - Липецкий туристский портал</title>
    <meta name="description" content="@yield('description',setting('site_description',''))">
    <meta name="keywords" content="@yield('keywords',setting('site_keywords',''))">
    {!! Feed::link(route('rss'), 'atom', 'Новостная лента', App::getLocale()) !!}


    <meta name="auth" content="{{Auth::check()}}">
    <meta name="user_id" content="@if(Auth::check()){{ (int) (Auth::user()->id)}}@endif">

    <meta http-equiv="X-DNS-Prefetch-Control" content="on">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ elixir("/dist/css/orchid.css") }}" rel="stylesheet" type="text/css">
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


{{--
<a type="button" data-toggle="modal" data-target="#support">
    <img src="/img/banner.jpg" class="img-full b-b adb vi-hide hidden-xs" alt="adb">
</a>
--}}


<header id="header" class="navbar bg-white-only b-b box-shadow-lg">


    @widget('advertising','top')


    <div class="container padder-v navbar-center-brand">
        <div class="navbar-header">
            <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a href="/{{App::getLocale()}}" class="navbar-brand m-r-lg navbar-brand-centered" title="На главную">
                <img src="/img/tour/logo.png" alt="LipTur">
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('about')}}" rel="prefetch" title="Интересные факты">Об области</a></li>
                <li><a href="{{route('news')}}" title="Новости Липецкой области">Новости</a></li>
                <li><a href="{{route('investor')}}" title="Потенциал области">Инвесторам</a></li>


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


            <ul class="nav navbar-nav navbar-right">


                <li><a href="{{url('/shop')}}"><i class="icon-handbag m-r-xs"></i>Интернет-магазин</a></li>
                
                <li>
                    <a href="#" rel="search" title="Поиск по веб-сайту" data-target="#modalSeachIn" data-toggle="modal"><i
                                class="icon-magnifier m-r-xs"></i>Поиск</a>
                </li>


                {{--
                <li><a href="{{route('investor')}}" rel="prefetch" title="Хорошие предложения">Инвесторам</a></li>
                <li><a href="{{route('contacts')}}" rel="contact" title="Связаться с нами">Контакты</a></li>
                --}}


                <li>
                    @if(App::getLocale() == 'en')
                        <a href="{{Localization::getLocalizedURL('ru') }}" hreflang="ru" title="Сменить язык"><i
                                    class="icon-globe m-r-xs"></i> Ru/En</a>
                    @else
                        <a href="{{Localization::getLocalizedURL('en') }}" hreflang="en" title="Сменить язык"><i
                                    class="icon-globe m-r-xs"></i> En/Ru</a>
                    @endif
                </li>


                <!-- Авторизация  -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}"><i class="icon-login m-r-xs"></i> Вход</a>
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
        </div>
    </div>
</header>

<div id="content" class="">


    @yield('content')


</div>


<!-- footer -->

<footer id="footer" role="footer">


    <div class="bg-white-only box-shadow-lg b-t  padder-v">
        <div class="container">
            <div class="container-fluid">
                <div class="row padder-v">
                    <div class="col-md-3 hidden-sm vi-col-4">
                        <a href="tel:+74742272360" class="wrapper-sm v-center" title="Телефон приёмного отделения">
                            <i class="icon-phone fa-2x m-r-sm"></i>
                            Телефон: (+7-4742) 22-03-60
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 vi-hide">
                        <a href="{{route('contacts')}}" class="wrapper-sm v-center" title="Териториальное расположение">
                            <i class="icon-home fa-2x m-r-sm"></i>
                            Контакты для связи
                        </a>
                    </div>

                    <div class="col-md-3 hidden-sm vi-col-4">
                        <a class="wrapper-sm click-visually v-center" data-toggle="visually-impaired"
                           data-target="#html" title="Сайт доступен для людей с ограниченными возможностями">
                            <i class="icon-eye fa-2x m-r-sm"></i>
                            Версия для слабовидящих
                        </a>
                    </div>


                    <div class="col-md-3 col-sm-6 vi-hide">
                        <p>
                            <a href="https://vk.com/liptur48" target="_blank"
                               class="btn btn-icon btn-rounded btn-grey"><i class="fa fa-vk"></i></a>

                            <a href="https://ok.ru/lipsobtur" target="_blank"
                               class="btn btn-icon btn-rounded btn-grey"><i class="fa fa-odnoklassniki"></i></a>

                            <a href="https://www.facebook.com/%D0%A6%D0%B5%D0%BD%D1%82%D1%80-%D0%BA%D0%BB%D0%B0%D1%81%D1%82%D0%B5%D1%80%D0%BD%D0%BE%D0%B3%D0%BE-%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D1%8F-%D1%82%D1%83%D1%80%D0%B8%D0%B7%D0%BC%D0%B0-%D0%9B%D0%B8%D0%BF%D0%B5%D1%86%D0%BA%D0%BE%D0%B9-%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D0%B8-1784209968567425/" target="_blank" class="btn btn-icon btn-rounded btn-grey"><i
                                        class="fa fa-facebook"></i></a>

                            <a href="https://www.youtube.com/channel/UCI4HbPUrzve2L889GRE8D-g" target="_blank" class="btn btn-icon btn-rounded btn-grey"><i
                                        class="fa fa-youtube"></i></a>

                            <a href="https://twitter.com/lipsobtur" target="_blank"
                               class="btn btn-icon btn-rounded btn-grey"><i class="fa fa-twitter"></i></a>

                            <a href="{{route('rss')}}" target="_blank" class="btn btn-icon btn-rounded btn-grey">
                                <i class="fa fa-rss" aria-hidden="true"></i>
                            </a>

                        </p>

                    </div>

                </div>


            </div>


            <div class="row m-n b-t padder-v hidden-xs hidden-sm">


                <div class="col-md-12">


                    @widget('advertising','footer')


                </div>
            </div>


        </div>
    </div>


    @widget('menuFooter')
</footer>
<!-- / footer -->


<div class="modal fade fill-in" id="modalSeachIn" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-times"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <p class="h5 text-center m-b-xs font-thin m-b"><img src="/img/tour/logo.png"></p>
            </div>
            <div class="modal-body">
                <div class="b box-shadow-lg wrapper-md bg-white">
                    <div class="row">
                        <div class="col-md-12">


                            <form v-on:submit.prevent="search()">
                                <div class="form-group form-group-default">
                                    <label class="label-lg">Введите запрос</label>
                                    <input type="text"
                                           autofocus
                                           required
                                           minlength="1"
                                           placeholder="Например Задонщина"
                                           class="form-control input-lg"
                                           v-model="query"
                                    >
                                </div>

                                <div class="col-md-3 col-md-offset-9 text-center">
                                    <button class="btn btn-danger btn-rounded" type="button" v-on:click="search()"
                                            v-if="!loading"><i class="fa fa-search"></i> Найти
                                    </button>
                                    <button class="btn btn-danger btn-rounded" type="button" disabled="disabled"
                                            v-if="loading">Поиск... <i class='fa fa-spinner fa-spin'></i></button>
                                </div>

                                <transition name="fade">
                                    <div class="padder-v" v-if="posts.length > 0">
                                        <p class="small">Результаты :</p>
                                        <p class="b-b" v-for="post in posts">
                                            <a v-bind:href="post.url" class="list-group-item" target="_blank">
                                                <span class="block m-b-xs">@{{post.name}}</span>
                                                <small class="block text-muted">
                                                    @{{post.description}}
                                                </small>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="padder-v" v-if="noresutl == 1">
                                        <p class="small">По вашему запросу ничего не найдено ;(</p>
                                    </div>

                                </transition>



                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>

</div>


@include('partials.modals.support')



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

<script type="text/javascript" src="{{ elixir('/dist/js/orchid.js') }}"></script>

<!-- TODO: УДАЛИТЬ ЭТО  -->
<script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/jquery.ui.touch-punch/0.2.3/jquery.ui.touch-punch.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>



@stack('scripts')

</body>
</html>
