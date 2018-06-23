@extends('layouts.app')


@section('title','Новости Липецкой области')
@section('description','Новости Липецкой области')
@section('keywords','новости липецка, новости липецкой области')



@section('content')




    <section class="container-fluid">
        <div class="row">


            <div style="background:url(/img/tour/background/news.png) center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row m-t">


                        <div class="container m-t-md top-desc-block">


                            <div class="col-md-6  pull-bottom text-white">


                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">Новости</h1>


                            </div>


                        </div>


                    </div>
                </div>
            </div>


            <nav class="bg-danger box-shadow-lg">
                <div class="container">

                    @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                        'current' => 'Новости'
                    ])

                </div>
            </nav>


        </div>
    </section>




    <section class="bg-white b-t box-shadow-lg">
        <div class="container padder-v">
            <div class="col-md-12">


                <div class="row padder-v">
                    <div class="col-md-4">
                        <p class="h3 font-thin">Актуальное за <span
                                    class="text-danger">{{$date->formatLocalized("%d %b %Y")}} </span></p>
                    </div>
                    <div class="col-md-4">


                        <div class='input-group  datepicker' id="select-news">
                            <input type='hidden' name="date" value="{{$date}}">
                            <span class="input-group-addon calendar-button">
                                    <span class="fa fa-calendar button" aria-hidden="true"></span>
                                <span class="text-muted m-l-sm">Изменить дату</span>
                            </span>
                        </div>


                    </div>

                </div>


                <div class="row">


                    @forelse($news as $key => $new)


                        @if($key == 2)
                            <article class="col-md-4 padder-v hidden-xs">
                                <div class="panel panel-default box-shadow-lg wrapper-xl" data-mh="main-news">
                                    <p class="h3 font-thin  m-b-lg">Новостная <span class="text-danger">Рассылка</span>
                                    </p>
                                    <form role="form" data-mh="main-last-block">

                                        <div class="form-group form-group-default m-t-md">
                                            <label class="text-sm text-left">Адрес электронной почты</label>
                                            <input type="email" placeholder="Введите Email" class="form-control">
                                        </div>

                                        <span class="m-t-md help-block m-b-none text-xs"> *Ваши личные данные не попадут в руки третьих лиц.</span>

                                    </form>

                                    <p class="text-center m-t-md">
                                        <button type="submit" class="btn btn-danger btn-rounded">
                                            Подписаться
                                        </button>
                                    </p>

                                </div>
                            </article>
                        @endif




                        <article class="col-md-4 padder-v">
                            <div class="panel panel-default box-shadow-lg" data-mh="main-news">

                                <div data-mh="main-news-img">
                                    <a href="{{route('new',[$new->slug])}}"><img
                                                src="{{$new->hero('medium') ?? '/img/no-image.jpg'}} "
                                                class="img-full img-post"
                                                alt="{{$new->getContent('name')}}"
                                        ></a>
                                </div>
                                <div class="wrapper-md">
                                    <div class="clear" data-mh="main-news-body">
                                        <p class="h4 m-b-xs"><a
                                                    href="{{route('new',[$new->slug])}}">{{$new->getContent('name')}}</a>
                                        </p>
                                        <p class="text-xs">
                                            {{str_strip_limit_words($new->getContent('body'))}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center bg-white  padder-v ">
                            <div class="wrapper-xl">
                                Список пуст
                            </div>
                        </div>
                    @endforelse

                </div>


                @if(property_exists($news,'hasMore'))
                    <div class="row padder-v text-center">
                        {{ $news->links() }}
                    </div>
                @endif
            </div>

        </div>


    </section>








@endsection