@extends('layouts.app-new')


@section('title','Новости Липецкой области')
@section('description','Новости Липецкой области')
@section('keywords','новости липецка, новости липецкой области')


@section('header')
    @include('partials.header.headerMin',[
                    'image'  => '/img/tour/background/news-bg.jpg',
                    'title' => 'Новости',
                    'breadcrumb' =>[
                        'breadcrumb' => [],
                        'current' => 'Новости'
                    ]
                ])
@endsection

@section('content')
    <section>
        <div class="container padder-v">
            <div class="row">
                <div class="block-header col-xs-12 pt-3">
                    @if ($hasdate)
                        Все новости за <span
                                class="text-danger">{{$date->formatLocalized("%d %b %Y")}} </span>
                    @else
                        Все новости
                    @endif

                    <div class="input-group  datepicker pull-right" id="select-news">
                        <input type='hidden' name="date" value="{{$date}}">
                        <span class="input-group-addon calendar-button">
                                    <span class="fa fa-calendar button" aria-hidden="true"></span>
                                <span class="text-brand-green m-l-sm">Архив по дням</span>
                            </span>
                    </div>
                </div>
            </div>

            <div class="row">


                @forelse($news as $key => $new)


                    @if($key == 2)
                        <article class="col-md-4 padder-v hidden-xs news-email">
                            <div class="panel panel-default box-shadow-lg wrapper-md" data-mh="main-news">
                                <p class="h3 font-thin m-b-lg">
                                    Подписаться на рассылку
                                </p>
                                Хотите быть в курсе всех основных событий культурной и событийной жизни Липецкой области - подпишитесь на рассылку.
                                <form role="form" data-mh="main-last-block">
                                    <div class="form-group m-t-md">
                                        <label class="text-sm text-left">Введите ваш Email:</label>
                                        <input type="email" placeholder="Введите Email" class="form-control">
                                    </div>
                                    <em class="m-t-md help-block m-b-none text-sm">Нажав на кнопку ниже, вы соглашаетесь на обработку ваших персональных данных.</em>
                                </form>

                                <p class="text-center m-t-md">
                                    <button type="submit" class="btn btn-success btn-group-justified text-u-c">
                                        Подписаться
                                    </button>
                                </p>

                            </div>
                        </article>
                    @endif


                    <article class="col-md-4 padder-v news">
                        <div class="panel panel-default box-shadow-lg" data-mh="main-news">
                            <div data-mh="main-news-img">
                                <div class="news-date">
                                    {{$new->publish_at->formatLocalized("%d %b")}}
                                </div>
                                <a href="{{route('new',[$new->slug])}}">
                                    <img
                                        src="{{$new->hero('medium') ?? '/img/no-image.jpg'}} "
                                        class="img-full img-post"
                                        alt="{{$new->getContent('name')}}"
                                    ></a>
                            </div>
                            <div class="wrapper-md">
                                <div class="clear" data-mh="main-news-body">
                                    <a class="h4" href="{{route('new',[$new->slug])}}">{!! $new->getContent('name') !!}</a>
                                    <p class="text-xs">
                                        {!! str_strip_limit_words($new->getContent('body')) !!}
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
            @include('partials.shop.paginate',['paginate' => $news,])
        </div>
    </section>

@endsection