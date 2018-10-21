@extends('layouts.app-new')



@section('content')




    <section class="container-lg no-padder">
        <div class="pos-abt bg-white left w-full h-sm"></div>
        @widget('mainCoursel')
    </section>



    @widget('mainEvents')


    @widget('secondarySlider')


    {{--
        @widget('mainPopular')
    --}}
    @widget('mainNews')


    {{-- @widget('mainCinema') --}}


    <section class="container main-advertising m-b-md vi-hide m-t-md">
        <div class="row equal">

            <div class="col-xs-3 text-center">
                <div class="panel b box-shadow-lg" data-mh="main-info-block" style="
width: 100%;
background: #fff;
display: flex;
align-items: center;
  justify-content: center;
">


                    @widget('advertising','main-left')


                </div>
            </div>

            <div class="col-xs-3 text-center">
                <div class="panel wrapper-xl b box-shadow-lg  padder-lg" data-mh="main-info-block">
                    <i class="icon-chart text-danger icon-title"></i>
                    <p class="h4 font-thin padder-v" data-mh="main-info-block-title">Инвесторам</p>
                    <p class="padder-v" data-mh="main-info-block-body">
                        Создадим комфортную среду для туристов вместе!
                    </p>
                    <a href="{{route('investor')}}" class="btn btn-danger btn-rounded">Подробнее</a>
                </div>
            </div>


            <div class="col-xs-3 text-center">
                <div class="panel b box-shadow-lg" data-mh="main-info-block" style="
width: 100%;
background: #fff;
display: flex;
align-items: center;
  justify-content: center;
">

                    @widget('advertising','main-right')

                </div>
            </div>

            <div class="col-xs-3 news-email">
                <div class="panel b box-shadow-lg wrapper-md text-center" data-mh="main-info-block">
                    <p class="h3 font-thin m-b-lg text-center">
                        Подписаться на рассылку
                    </p>
                    Хотите быть в курсе всех основных событий культурной и событийной жизни Липецкой области - подпишитесь на рассылку.
                    <form role="form" data-mh="main-last-block">
                        <div class="form-group m-t-md">
                            <label class="text-sm text-left">Введите ваш Email:</label>
                            <input type="email" placeholder="Введите Email" class="form-control">
                        </div>
                    </form>

                    <p class="text-center m-t-md">
                        <button type="submit" class="btn btn-success btn-group-justified text-u-c">
                            Подписаться
                        </button>
                    </p>

                </div>
            </div>

        </div>
    </section>


{{--
    <section class="container-fluid bg-white m-t-md b-t box-shadow-lg">
        <div class="container padder-v">

            <div class="row">

                <div class="row wrapper-md">
                    <div class="col-md-10">
                        <p class="h3 font-thin">Все <span class="text-danger">Категории</span></p>

                        <div class="col-md-6 pull-in m-t-md">
                            <small>
                                Вы сможете выбрать интересные для вас места
                            </small>
                        </div>
                    </div>
                </div>


                @widget('mainCategory')


            </div>

        </div>
    </section>
--}}




    @include('partials.marketing.maps')




    {{--
        @widget('mainRoute')
    --}}






    {{--
            <section class="container-fluid bg-white b-t box-shadow-lg vi-hide">
                <div class="container padder-v">
                    <div class="col-md-12">


                        <div class="row text-center">

                            <article class="col-md-4 wrapper-xl">
                                <p class="h3 font-thin  m-b-lg">Фото <span class="text-danger">Липецкой Области</span></p>
                                <div class="wrapper"  data-mh="main-last-block">
                                    <i class="icon-picture text-danger icon-title-small"></i>
                                    <!--<img src="/img/tour/konkurs.png" class="img-responsive">-->
                                    <p class="h4 font-thin padder-v">
                                        Все фотографии области в нашей галерее
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-outline btn-danger btn-rounded">Посмотреть</button>


                            </article>

                            <article class="col-md-4 wrapper-xl b-r b-l">
                                <p class="h3 font-thin  m-b-lg">Текущий <span class="text-danger">Конкурс</span></p>
                                <div class="wrapper"  data-mh="main-last-block">
                                    <i class="icon-badge text-danger icon-title-small"></i>
                                    <!--<img src="/img/tour/konkurs.png" class="img-responsive">-->

                                    <p class="h4 font-thin padder-v">
                                        «Девушки Липецка»
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-outline btn-danger btn-rounded">Подробнее</button>


                            </article>
                            <article class="col-md-4 wrapper-xl">
                                <p class="h3 font-thin  m-b-lg">Новостная <span class="text-danger">Рассылка</span></p>
                                <form role="form" data-mh="main-last-block">

                                    <div class="form-group form-group-default m-t-md">
                                        <label class="text-sm text-left">Адрес электронной почты</label>
                                        <input type="email" placeholder="Введите Email" class="form-control">
                                    </div>

                                    <span class="m-t-md help-block m-b-none text-xs"> *Ваши личные данные не попадут в руки третьих лиц.</span>

                                </form>

                                <button type="submit" class="btn btn-outline btn-danger btn-rounded">Подписаться</button>

                            </article>
                        </div>



                    </div>


                </div>

            </section>
    --}}



    {{--
        <section class="container-fluid bg-white b-t box-shadow-lg vi-hide">
            <div class="container padder-v">
                <div class="col-md-12">


                    <div class="row text-center">
                        <article class="col-md-4 wrapper-xl">
                            <p class="h3 font-thin m-b-lg">Фото <span class="text-danger">Липецкой Области</span></p>
                            <a class=""  data-mh="main-last-block">
                                <img src="/img/tour/photo.png" class="img-full" height="350px">
                            </a>


                        </article>
                        <article class="col-md-4 wrapper-xl" >
                            <p class="h3 font-thin  m-b-lg">Текущий <span class="text-danger">Конкурс</span></p>
                            <div class=""  data-mh="main-last-block">
                                <img src="/img/tour/konkurs.png" class="img-responsive">
                                <p class="h4 m-t-md m-b-md">Фотоконкурс<br>
                                    «Девушки Липецка»</p>
                                <p class="small padder-v">
                                    Таким образом сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании новых предложений.
                                </p>
                            </div>
                            <button type="submit" class="btn btn-outline btn-danger btn-rounded">Подписаться</button>


                        </article>



                        <div class="col-md-4 text-center">
                            <div class="panel wrapper-xl b box-shadow-lg  padder-lg" data-mh="main-info-block">
                                <div>
                                    <i class="icon-bubbles text-danger icon-title"></i>
                                    <p class="h4 font-thin padder-v" >Поучавствуйте в опросе:
                                    </p>
                                    <p class="padder-v">
                                        Какое пиво, производимое в Липецкой области, вы считаете самым
                                        наилучшим?
                                    </p>
                                </div>

                                <a class="btn btn-outline btn-danger btn-rounded">Подробнее</a>
                            </div>
                        </div>


                    </div>



                </div>


            </div>

        </section>
    --}}




@endsection




