@extends('layouts.app-new')



@section('header')
    <div class="hidden-xs">
        @include('partials.header.headerMin',[
            'image'  => url('/img/tour/background/investor.jpg'),
            'position' => '0px -220px',
            'title' => ($locale=="en")?'Invest in tourism, be successful!':'Инвестируй в туризм, будь успешным!',
            'breadcrumb' =>[
                'breadcrumb' => [],
                'current' => ($locale=="en")?'Investors':'Инвесторам',
            ]
        ])
    </div>
    <div class="visible-xs">
        <div id="post-header" class="catalog-item">
            <div style="background:url('/img/tour/background/investor.jpg') center center; background-size:cover">
                <div class="bg-black-opacity bg-dark">
                    <div class="container pos-rlt min-h-h">
                        <div class="row m-b-md padder-v">
                            <div class="pull-bottom text-white padder-v m-l-xl">
                                <h1 class="text-white brand-header" itemprop="headline">{{(($locale=="en")?'Invest in tourism, be successful!':'Инвестируй в туризм, будь успешным!')}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('content')

    <section>
        <div class="container padder-v">
            <div class="row">
                <div class="block-header col-xs-12 pt-3">
                    {{(($locale=="en")?'Investors':'Инвесторам')}}
                </div>
            </div>

            <div class="row hidden-xs">
                <div class="video_container hidden-xs hidden-sm" style="position: relative; overflow: hidden;">
                    <video autoplay loop poster="" id="videobackground" style="
        min-width: 100%;
        width: 100vw;
        min-height: 500px;
        max-height: 500px;
        height: 10vh;
        z-index: 0;
        object-fit: cover;">
                        <source src="/img/tour/background/investor.mp4" type="video/mp4">
                        Ваш браузер устарел, пожалуйста обновите его.
                    </video>

                    <div class="bg-black-opacity pull-up h-full w-full"></div>

                    <div class="pull-up w-full h-full v-h-center">
                        <div class="container">

                            <div class="text-white col-md-offset-2 col-md-4">

                            <div class="row">

                                <div class="col-xs-3">
                                    <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                        <i class="fa w-1x icon-pie-chart fa v-h-center text-white"></i>
                                    </p>
                                </div>

                                <div class="col-xs-9">
                                    <p>
                                        {{(($locale=="en")?'The Lipetsk region takes its place among the ten regions by the saturation of highways':'Липецкая область находится в 10-ке областей по насыщенности
                                        автомобильных дорог')}}

                                    </p>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-3">
                                    <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                        <i class="fa w-1x icon-graph fa v-h-center text-white"></i>
                                    </p>
                                </div>

                                <div class="col-xs-9">
                                    <p>
                                        {{(($locale=="en")?'16531 km of public roads':'16531 км автодорог общего пользования')}}


                                    </p>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-3">
                                    <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                        <i class="fa w-1x icon-directions v-h-center text-white"></i>
                                    </p>
                                </div>

                                <div class="col-xs-9">
                                    <p>
                                        {{(($locale=="en")?'The most important federal routes: M-4 Don, M6 -  Caspian, R-119 - Orel-Tambov':'Важнейшие федеральные трассы: М-4 Дон, М6 - Каспии, Р-119 - Орёл -Тамбов')}}
                                    </p>
                                </div>

                            </div>

                        </div>

                            <div class="text-white col-md-offset-1 col-md-4">

                            <div class="row">

                                <div class="col-xs-3">
                                    <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                        <i class="fa w-1x icon-energy v-h-center text-white"></i>
                                    </p>
                                </div>

                                <div class="col-xs-7">
                                    <p>

                                        {{(($locale=="en")?'3 railway lines':'3 железнодорожных магистрали')}}

                                    </p>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-3">
                                    <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                        <i class="fa w-1x icon-plane v-h-center text-white"></i>
                                    </p>
                                </div>

                                <div class="col-xs-7">
                                    <p>
                                        {{(($locale=="en")?'International airport':'Международный аэропорт')}}
                                    </p>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-3">
                                    <p class="h3 m-b-xl inline b b-white rounded wrapper-md">
                                        <i class="fa w-1x icon-location-pin v-h-center text-white"></i>
                                    </p>
                                </div>

                                <div class="col-xs-7">
                                    <p>
                                        {{(($locale=="en")?'3200 objects of cultural heritage':'3200 объектов культурного наследия')}}
                                    </p>
                                </div>

                            </div>

                        </div>


                        </div>
                    </div>

                </div>
            </div>

            <div class="row hidden-xs m-t-xl padder-b-v-md m-b-xl b-b">
                <div class="col-md-2 text-center">
                    <div class="text-2x counter">24047</div>
                    <span class="text-1x font-thin">{{(($locale=="en")?'Territory of the region':'Територия области')}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <div class="text-2x counter">314</div>
                    <span class="text-1x font-thin">{{(($locale=="en")?'Municipalities':'Муниципальных образований')}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <div class="text-2x counter">2</div>
                    <span class="text-1x font-thin">{{(($locale=="en")?'City district':'Городских округа')}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <div class="text-2x counter">18</div>
                    <span class="text-1x font-thin">{{(($locale=="en")?'Municipal districts':'Муниципальных районов')}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <div class="text-2x counter">288</div>
                    <span class="text-1x font-thin">{{(($locale=="en")?'Rural settlement':'Сельских поселений')}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <div class="text-2x counter">1156055</div>
                    <span class="text-1x font-thin">{{(($locale=="en")?'Population':'Население')}}</span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    @if ($locale=="en")
                        <p class="text-justify text-xs">The Lipetsk region is located in the center of the most developed European part of Russia,
                            at the intersection of traffic connecting the North-West and the center of the country with the Southern regions,
                            Western Siberia and Urals, at a distance of 450 km to the south of Moscow and borders on the Voronezh, Kursk,
                            Orel, Tula, Ryazan, Tambov regions.</p>

                        <p class="text-justify text-xs">Industrial complex of the region is multisectoral.
                            About 2000 enterprises do their production activity</p>

                        <p class="text-justify text-xs">Agro-industrial complex of the region has considerable potential.
                            240 agricultural organizations, 1.2 thousand peasant farms and sole traders,
                            and 203000 private subsidiary do operate in agriculture. </p>

                        <p class="text-justify text-xs"> Construction complex of the Lipetsk region is represented by 34 construction companies,
                            14 enterprises of building materials industry, 357 small enterprises engaged
                            in construction and production of building materials.</p>

                        <p class="text-justify text-xs">Minerals of the region are represented by 308 fields: limestones, dolomites, sand,
                            clays, cement raw materials. Lipetsk mineral springs and therapeutic mud, discovered in 1871,
                            are very famous in the country</p>
                        <a href="/other/invest-ploshchadki.pdf"  target="_blank" class="h4 d-block m-t-md"
                           title='Catalog of investment proposals of the Lipetsk region in the field of tourism'>
                            <i class="fa fa-download text-darkred"></i>
                            Catalog of investment proposals of the Lipetsk region in the field of tourism
                            <span class="text-xs text-grey">(.pdf 874Кб)</span>
                        </a>
                        <a href="/other/buclet.pdf"  target="_blank" class="h4 d-block m-t-md m-b-md"
                           title='Investment proposals of "Zadonshchina" and "Yelets"'>
                            <i class="fa fa-download text-darkred"></i>
                            Investment proposals of "Zadonshchina" and "Yelets"
                            <span class="text-xs text-grey">(.pdf 425Кб)</span>
                        </a>
                    @else
                        <p class="text-justify text-xs">Липецкая область расположена в центре наиболее освоенной европейской части
                            России, на пересечении транспортных потоков, соединяющих Северо-Запад и центр
                            страны с Южными регионами, Западной Сибирью и Уралом, на расстоянии 450 км к югу
                            Москвы и граничит с Воронежской, Курской, Орловской, Тульской, Рязанской, Тамбовской
                            областями.</p>

                        <p class="text-justify text-xs">Промышленный комплекс области носит многоотраслевой характер.
                            Производственную деятельность осуществляют около 2000 предприятий.</p>

                        <p class="text-justify text-xs">Значительный потенциал имеет агропромышленный комплекс области. В сельском
                            хозяйстве осуществляют деятельность 240 сельскохозяйственных организаций, 1,2 тысячи
                            крестьянских хозяйств и индивидуальных предпринимателей, 203 тысячи личных подсобных
                            хозяйств.</p>

                        <p class="text-justify text-xs"> Строительный комплекс Липецкой области представлен 34 строительными
                            компаниями,
                            14 предприятиями промышленности строительных материалов, 357 малыми
                            предприятиями, занятыми строительством и производством строительных материалов.</p>

                        <p class="text-justify text-xs">Полезные ископаемые области представлены 308 месторождениями: известняки,
                            доломиты, песок, глины, цементное сырье. Большой известностью в стране пользуются
                            Липецкие минеральные источники и лечебные грязи, обнаруженные в 1871 году.</p>
                        <a href="/other/invest-ploshchadki.pdf"  target="_blank" class="h4 d-block m-t-md"
                           title='Каталог инвестиционных предложений Липецкой области в сфере туризма'>
                            <i class="fa fa-download text-darkred"></i>
                            Каталог инвестиционных предложений Липецкой области в сфере туризма
                            <span class="text-xs text-grey">(.pdf 874Кб)</span>
                        </a>
                        <a href="/other/buclet.pdf"  target="_blank" class="h4 d-block m-t-md m-b-md"
                           title='Инвестиционные предложения АТК "Задонщина" и ТРК "Елец"'>
                            <i class="fa fa-download text-darkred"></i>
                            Инвестиционные предложения АТК "Задонщина" и ТРК "Елец"
                            <span class="text-xs text-grey">(.pdf 425Кб)</span>
                        </a>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="pos-rlt">
                            <div class="center text-center m-t-n w-full">
                                <a href="#" data-toggle="modal" data-target="#investorVideo">
                                    <i class="fa fa-play-circle-o fa-4x text-lighted"></i>
                                </a>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#investorVideo">
                                <img src="/img/tour/video.jpg" alt="" class="img-full">
                            </a>
                        </div>
                        <h3 class="font-thin h4 m-t-md text-brand-grey">{{(($locale=="en")?'Invest in tourism. Investment attractiveness of tourism in the Lipetsk region':'Инвестируй в туризм. Инвестиционная привлекательность туризма Липецкой
                            области')}}
                        </h3>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-gray investor-virtual">
        <div class="container m-t-xxl m-b-xxl">

            <div class="row equal">

                <div class="col-md-6">
                    <div class="panel b box-shadow-lg no-border panel-header" data-mh="main-info-block" style="
    overflow: hidden;
">

                        <div class="block-header text-lighted">
                            {{(($locale=="en")?'Tourism and recreation cluster «Yelets»':'ТРК «Елец»')}}
                        </div>
                        <img src="/img/investor/trk-elec.jpg" class="img-responsive">


                        <div class="wrapper-md">
                            <div class="m-b-md">
                                @if ($locale=="en")
                                    <p class="text-justify small text-xs">Yelets is one of the most beautiful cities in Russia and the oldest city in the Lipetsk region,
                                        which preserved the original architecture of the late 16th century.</p>
                                    <p class="text-justify small text-xs">The project of creating a tourist and recreational cluster "Yelets"
                                        provides for the building of complex objects of tourist infrastructure.</p>
                                @else
                                    <p class="text-justify small text-xs">Город Елец – один из красивейших городов России и самый
                                        древний город Липецкой области, сохранивший самобытную архитектуру конца XVI
                                        века.</p>
                                    <p class="text-justify small text-xs">Проект создания туристско-рекреационного кластера «Елец»
                                        предусматривает строительство комплексных объектов туристской
                                        инфраструктуры.</p>
                                @endif

                            </div>
                            <p class="text-center">&nbsp;</p>

                            <p class="text-center m-t-md text-uppercase">
                                <a href="/panoram/elets/index.html" target="_blank" class="btn btn-success">
                                    {{(($locale=="en")?' View virtual tour':'Посмотреть виртуальный тур')}}
                                </a>
                            </p>
                        </div>


                    </div>
                </div>


                <div class="col-md-6">
                    <div class="panel b box-shadow-lg  no-border panel-header" data-mh="main-info-block" style="
    overflow: hidden;
">
                        <div class="block-header text-lighted">
                            {{(($locale=="en")?'Auto-tourism cluster «Zadonshina»':'АТК «Задонщина»')}}

                        </div>
                        <img src="/img/investor/trk-zadon.jpg" class="img-responsive">


                        <div class="wrapper-md">
                            <div class="m-b-md">
                                @if ($locale=="en")
                                    <p class="text-justify small text-xs">A combination of the unique tourist resources of the area,
                                        deservedly called "Russian Switzerland", historical and cultural potential of the center of
                                        Russian Orthodoxy with convenient transport accessibility along the federal highway M-4 "Don"
                                        will provide high interest of autotourists and commercial success to the objects of the cluster.</p>
                                @else
                                    <p class="text-justify small text-xs">Сочетание уникальных туристских ресурсов местности,
                                        заслуженно получившей название «Русская Швейцария», историко-культурного потенциала
                                        центра русского православия с удобной транспортной доступностью по автодороге
                                        федерального значения М-4 «Дон» обеспечат высокий интерес автотуристов и
                                        коммерческий успех объектам кластера.</p>
                                @endif
                            </div>

                            <p class="m-t-md">
                                <a href="http://invest.liptur.ru/" target="_blank" class="text-link h4">
                                    <i class="fa fa-link"></i>
                                    {{(($locale=="en")?'More on ':'Узнать больше на ')}}
                                     invest.liptur.ru</a>
                            </p>

                            <p class="text-center m-t-md text-uppercase" style="margin-top:14px; display:block;">
                                <a href="https://liptur.ru/panoram/zadonshchina/index.html" target="_blank"
                                   class="btn btn-success">
                                    {{(($locale=="en")?' View virtual tour':'Посмотреть виртуальный тур')}}
                                </a>
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </section>


    <section>
        <div class="map-bg  b-b b-t box-shadow b-light vi-hide hidden-xs">
            <div class="row h-full text-white">
                <div class="container">

                    <div class="row  m-b-md">
                        <a href="/other/karta_investitsiy_lipetsk.pdf" target="_blank">
                            <div class="block-header col-xs-12 pt-3">
                                {{(($locale=="en")?'Map of investment attractiveness of the Lipetsk region in the field of tourism':'Карта инвестиционной привлекательности Липецкой области в сфере туризма')}}
                            </div>
                        </a>
                        <p class="text-xs m-l-xxl pl-1">
                            {{(($locale=="en")?'Invest in tourism, be successful!':'Инвестируй в туризм, будь успешным!')}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container padder-v m-t-xxxl">
                <div id="investor-content" class="m-b-md">
                    <ul class="nav nav-tabs top-tabs m-b-lg hidden-xs">
                        @foreach($offers as $offer)
                                <li class="col-md-2 no-padder text-center @if($loop->first )active @endif ">
                                    <a class="text-green"
                                       role="tab"
                                       data-toggle="tab"
                                       href="#{{str_slug($offer->slug)}}"
                                       aria-controls="{{str_slug($offer->slug)}}"
                                       id="{{str_slug($offer->slug)}}-tab"
                                    >{{$offer->term->getContent('name')}}</a>
                                </li>
                        @endforeach
                    </ul>
                    <div class="dropdown visible-xs col-xs-12 no-padder m-b-xs">
                        <p class="text-xs">{{(($locale=="en")?'Select a cluster:':'Выберите кластер:')}} </p>
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuInvestorTab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{str_limit($offers->first()->term->getContent('name'),35)}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuInvestorTab">
                            @foreach($offers as $offer)
                                <li class="no-padder @if($loop->first )active @endif ">
                                    <a class="dropdown-item text-green text-wrap"
                                       role="tab"
                                       data-toggle="tab"
                                       href="#{{str_slug($offer->slug)}}"
                                       aria-controls="{{str_slug($offer->slug)}}"
                                       id="{{str_slug($offer->slug)}}-tab"
                                    >{{$offer->term->getContent('name')}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <main class="tab-content">
                        @foreach($offers as $offer)
                            <div class="tab-pane fade @if ($loop->first)  active in @endif"
                                 role="tabpanel"
                                 id="{{str_slug($offer->slug)}}"
                                 aria-labelledby="{{str_slug($offer->slug)}}-tab">
                                 @include('partials.investor.tab', [
                                    'offer' => $offer,
                                    'count' => -30
                                ])
                             </div>
                        @endforeach
                    </main>
                </div>
            <script>
                $(function () {
                    $(".dropdown-menu li a.dropdown-item").click(function () {
                        $(this).parents(".dropdown-menu").find('li').removeClass('active');
                        $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
                        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
                    });
                });
            </script>
        </div>
    </section>



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


@section('ad-carousel')
    <section class="bg-white">
        <div class="container padder-v">
            <div class="row">
                <div class="block-header bg-white-only col-xs-12 pt-3">
                    {{(($locale=="en")?'Our investors':'Наши инвесторы')}}
                </div>
            </div>
        </div>
        @include('partials.investor.investor-carousel')
    </section>
@endsection
