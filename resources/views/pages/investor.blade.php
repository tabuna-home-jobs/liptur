@extends('layouts.app-new')



@section('header')
    <section class="container-fluid ">
        <div class="row">


            <div class="pos-rlt hidden-xs" style="background: url(/img/tour/background/investor.jpg);
                background-position: center center;
    background-size: cover;
    height: 450px;">
                <div class="bg-black-opacity pos-abt h-full w-full"></div>

                <div class="container pos-rlt h-full v-h-center">

                    <p class="text-3x text-uppercase text-white text-center">Инвестируй в туризм, будь успешным!</p>


                    <div class="pull-bottom w-full">

                        <div class="col-md-2 padder-v text-center">
                            <div class="item text-white">
                                <div class="text-3x counter">24047</div>
                                <span class="text-1x font-thin">Територия области</span>
                            </div>
                        </div>

                        <div class="col-md-2 padder-v text-center">
                            <div class="item text-white">
                                <div class="text-3x counter">314</div>
                                <span class="text-1x font-thin">Муниципальных образований</span>
                            </div>
                        </div>

                        <div class="col-md-2 padder-v text-center">
                            <div class="item text-white">
                                <div class="text-3x counter">2</div>
                                <span class="text-1x font-thin">Городских округа</span>
                            </div>
                        </div>

                        <div class="col-md-2 padder-v text-center">
                            <div class="item text-white">
                                <div class="text-3x counter">18</div>
                                <span class="text-1x font-thin">Муниципальных районов</span>
                            </div>
                        </div>

                        <div class="col-md-2 padder-v text-center">
                            <div class="item text-white">
                                <div class="text-3x counter">288</div>
                                <span class="text-1x font-thin">Сельских поселений</span>
                            </div>
                        </div>

                        <div class="col-md-2 padder-v text-center">
                            <div class="item text-white">
                                <div class="text-3x counter">1156055</div>
                                <span class="text-1x font-thin">Население</span>
                            </div>
                        </div>

                    </div>

                </div>


            </div>


            <nav>
                <div class="container">
                    @include('partials.breadcrumb',[
                        'current' => 'Инвестору'
                    ])
                </div>
            </nav>


        </div>
    </section>


@endsection


@section('content')

    <div class="video_container hidden-xs hidden-sm" style="
        position: relative;
        overflow: hidden;">


        <video autoplay loop poster=""
               id="videobackground" style="
        min-width: 100%;
        width: 100vw;
        min-height: 500px;
        max-height: 500px;
        height: 10vh;
        z-index: 0;
        object-fit: cover;">
            <source src="/img/tour/background/investor.mp4"
                    type="video/mp4">

            Ваш браузер устарел, пожалуйста обновите его.
        </video>


        <div class="bg-black-opacity pull-up h-full w-full"></div>


        <div class="pull-up w-full h-full v-h-center">
            <div class="container ">
                <div class="text-white col-md-6">

                    <div class="row">

                        <div class="col-xs-3">
                            <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                <i class="fa w-1x icon-pie-chart fa v-h-center"></i>
                            </p>
                        </div>

                        <div class="col-xs-5">
                            <p>
                                Липецкая область находится в 10-ке областей по насыщенности
                                автомобильных дорог
                            </p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-3">
                            <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                <i class="fa w-1x icon-graph fa v-h-center"></i>
                            </p>
                        </div>

                        <div class="col-xs-5">
                            <p>
                                16531 км автодорог общего пользования

                            </p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-3">
                            <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                <i class="fa w-1x icon-directions v-h-center"></i>
                            </p>
                        </div>

                        <div class="col-xs-5">
                            <p>
                                Важнейшие федеральные трассы:

                                М-4 Дон, М6 - Каспии,
                                Р-119 - Орёл -Тамбов
                            </p>
                        </div>

                    </div>

                </div>

                <div class="text-white col-md-6">

                    <div class="row">

                        <div class="col-xs-3">
                            <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                <i class="fa w-1x icon-energy v-h-center"></i>
                            </p>
                        </div>

                        <div class="col-xs-5">
                            <p>
                                3 железнодорожных магистрали
                            </p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-3">
                            <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                <i class="fa w-1x icon-plane v-h-center"></i>
                            </p>
                        </div>

                        <div class="col-xs-5">
                            <p>
                                Международный аэропорт
                            </p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-3">
                            <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                <i class="fa w-1x icon-location-pin v-h-center"></i>
                            </p>
                        </div>

                        <div class="col-xs-5">
                            <p>
                                3200 объектов культурного наследия
                            </p>
                        </div>

                    </div>

                </div>


            </div>
        </div>


    </div>













    <div class="container">


        <div class="col-xs-12 m-t-md  m-b-md bg-white b box-shadow">

            <div class="col-md-6 center">

                <main class="wrapper-lg">
                    <p class="h1 font-thin m-b-md text-green">Краткая Информация</p>

                    <p class="text-justify">Липецкая область расположена в центре наиболее освоенной европейской части
                        России, на пересечении транспортных потоков, соединяющих Северо-Запад и центр
                        страны с Южными регионами, Западной Сибирью и Уралом, на расстоянии 450 км к югу
                        Москвы и граничит с Воронежской, Курской, Орловской, Тульской, Рязанской, Тамбовской
                        областями.</p>


                    <p class="text-justify">Промышленный комплекс области носит многоотраслевой характер.
                        Производственную деятельность осуществляют около 2000 предприятий.</p>

                    <p class="text-justify">Значительный потенциал имеет агропромышленный комплекс области. В сельском

                        хозяйстве осуществляют деятельность 240 сельскохозяйственных организаций, 1,2 тысячи

                        крестьянских хозяйств и индивидуальных предпринимателей, 203 тысячи личных подсобных
                        хозяйств.</p>

                    <p class="text-justify"> Строительный комплекс Липецкой области представлен 34 строительными
                        компаниями,
                        14 предприятиями промышленности строительных материалов, 357 малыми
                        предприятиями, занятыми строительством и производством строительных материалов.</p>


                    <p class="text-justify">Полезные ископаемые области представлены 308 месторождениями: известняки,

                        доломиты, песок, глины, цементное сырье. Большой известностью в стране пользуются

                        Липецкие минеральные источники и лечебные грязи, обнаруженные в 1871 году.</p>


                </main>


            </div>

            <div class="col-md-6 center">
                <div class=" wrapper-lg">
                    <div class="">
                        <small class="text-green">О регионах Липецкой области</small>
                        <h3 class="font-thin">Инвестируй в туризм. Инвестиционная привлекательность туризма Липецкой
                            области</h3>
                    </div>

                    <div class="center">

                        <div class="item">
                            <div class="pos-rlt b-a bg-white wrapper-xs">

                                <div class="center text-center m-t-n w-full">
                                    <a href="#" data-toggle="modal" data-target="#investorVideo"><i
                                                class="fa fa-play-circle fa-2x text-white"></i></a>
                                </div>
                                <div class="top">
                                    <span class="font-thin badge bg-primary m-l-sm m-t-sm">22:09</span>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#investorVideo"><img
                                            src="/img/tour/video.jpg" alt="" class="img-full"></a>
                            </div>
                        </div>

                    </div>
                    <p class="lead m-t-lg">Липецк - административный, промышленный, культурный и курортный центр
                        области. </p>

                    <div class="text-sm">
                        <p class="text-justify">Климат умеренно - континентальный с умеренно холодной зимой и теплым
                            летом.</p>

                        <p class="text-justify">
                            По автомобильным дорогам из любой точки Липецкой области до Москвы можно

                            добраться за 5 часов, что является одним из несомненных преимуществ региона.


                        </p>
                        <p>
                            <a href="/other/buclet.pdf" target="_blank"><img src="/img/banner/lipetz-1.gif"></a>
                        </p>
                    </div>
                </div>
            </div>

        </div>


        <section class="m-b-md m-t-md vi-hide hidden-xs">
            <div class="row">


                <div class="col-md-6">
                    <div class="panel b box-shadow-lg" data-mh="main-info-block" style="
    overflow: hidden;
">


                        <img src="/img/investor/elets.jpg" class="img-responsive">


                        <div class="wrapper-xl">
                            <p class="h4 font-thin  m-b-md text-green">ТРК «Елец»</p>
                            <div class="m-b-md">
                                <p class="text-justify small">Город Елец – один из красивейших городов России и самый
                                    древний город Липецкой области, сохранивший самобытную архитектуру конца XVI
                                    века.</p>
                                <p class="text-justify small">Проект создания туристско-рекреационного кластера «Елец»
                                    предусматривает строительство комплексных объектов туристской
                                    инфраструктуры.</p>
                            </div>

                            <p class="text-center m-t-md">
                                <a href="/panoram/elets/index.html" target="_blank" class="btn btn-success">
                                    Посмотреть виртуальный тур ТРК «Елец»
                                </a>
                            </p>
                        </div>


                    </div>
                </div>


                <div class="col-md-6">
                    <div class="panel b box-shadow-lg" data-mh="main-info-block" style="
    overflow: hidden;
">


                        <img src="/img/investor/zadonsk.jpg" class="img-responsive">


                        <div class="wrapper-xl">
                            <p class="h4 font-thin m-b-md text-green">АТК «Задонщина»
                            </p>
                            <div class="m-b-md">
                                <p class="text-justify small">Сочетание уникальных туристских ресурсов местности,
                                    заслуженно получившей название «Русская Швейцария», историко-культурного потенциала
                                    центра русского православия с удобной транспортной доступностью по автодороге
                                    федерального значения М-4 «Дон» обеспечат высокий интерес автотуристов и
                                    коммерческий успех объектам кластера.</p>
                            </div>

                            <p class="text-center m-t-md" style="margin-top:14px; display:block;">
                                <a href="https://liptur.ru/panoram/zadonshchina/index.html" target="_blank"
                                   class="btn btn-success">
                                    Посмотреть виртуальный тур АТК «Задонщина»
                                </a>

                            <p class="text-center m-t-md">
                                <a href="http://invest.liptur.ru/" target="_blank" style="color:#1b77c1;">
                                <strong>Узнать больше на invest.liptur.ru</strong> </a>
                            </p>
                        </div>


                    </div>
                </div>


            </div>
        </section>


        <div class="hidden-xs">


            <a href="/other/karta_investitsiy_lipetsk.pdf" target="_blank"><img src="/img/tour/investor/map.jpg" class="img-responsive"></a>


            <div id="investor-content" class="m-b-md">

                <div class="col-xs-12 m-t-md  m-b-md bg-white b box-shadow wrapper-lg">

                    <div class="col-md-4 no-padder">


                        <div class="list-group list-group-root list-no-border">
                            @foreach($offers as $offer)

                                <a class="list-group-item"
                                   href="#{{str_slug($offer->slug)}}"
                                   role="tab"
                                   data-toggle="tab"
                                   aria-controls="{{str_slug($offer->slug)}}"
                                   id="{{str_slug($offer->slug)}}-tab"

                                   @if($loop->first)
                                   aria-expanded="true"
                                   @else
                                   aria-expanded="false"
                                        @endif
                                ><p class="h5">{{$offer->term->getContent('name')}}</p></a>


                                @include('partials.investor.list', [
                                    'offer' => $offer,
                                    'count' => -30
                                ])


                            @endforeach
                        </div>

                    </div>

                    <div class="col-md-8 b-l b-light">


                        <div class="wrapper">


                            <main class="tab-content" id="OffersContent">


                                @foreach($offers as $offer)



                                    <div class="tab-pane fade @if ($loop->first)  active in @endif"
                                         role="tabpanel"
                                         id="{{str_slug($offer->slug)}}"
                                         aria-labelledby="{{str_slug($offer->slug)}}-tab">

                                        <div class="page-header m-t-xs">
                                            <p class="h3 text-green">{{$offer->term->getContent('name')}}</p>
                                        </div>
                                        <div>
                                            {!! $offer->term->getContent('body')!!}
                                        </div>
                                    </div>


                                    @include('partials.investor.post', [
                                        'offer' => $offer,
                                    ])



                                @endforeach


                            </main>


                        </div>

                    </div>


                </div>
            </div>


        </div>


        <div class="col-xs-12 m-t-md hidden-xs">

            <div class="row">

                <div class="container">


                    <div class="row wrapper-lg">
                        <div class="col-md-12">
                            <p class="h1 font-thin">Наши <span class="text-danger">Инвесторы</span></p>

                            <div class="col-md-8 pull-in m-t-md">
                                <small>
                                    Организации разделяющие наши общие цели
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="row wrapper-lg">
                        <div class="col-md-10 col-md-offset-1">


                            @widget('advertising','investor')


                        </div>


                    </div>


                </div>


            </div>

        </div>


    </div>





    <div class="modal fade fill-in " id="investorVideo" tabindex="-1" role="dialog" aria-hidden="false">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="fa fa-times"></i>
        </button>
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/wL2KC1JV5qI" frameborder="0"
                            allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>

    </div>

@endsection