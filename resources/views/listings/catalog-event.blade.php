@extends('layouts.app-new')


@section('title',$name)
@section('description','')
@section('keywords','')


@section('header')
    <div id="post-header" class="catalog-item">
        <div style="background:url({{$type->image}}) center center; background-size:cover">
            <div class="bg-black-opacity bg-dark">
                <div class="container pos-rlt min-h-h">

                    <div class="row m-t-xxl m-b-md padder-v">
                        <div class="pull-bottom text-white padder-v m-l-xl">
                            <h1 class="text-white brand-header" itemprop="headline">{{$name}}</h1>
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
                            'breadcrumb' => [],
                            'current' => $name
                        ])
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection



@section('content')


    <section class="bg-white b-t box-shadow-lg">
        <div class="container padder-v">
            <div class="col-md-12">


                @foreach($month as $key => $events)

                    <div class="row">

                        <div class="page-header padder">
                            <p class="h1 font-thin">{{$key}}</p>
                        </div>

                        @foreach($events as $event)
                            <article class="col-md-4 padder-v">
                                <div class="panel panel-default box-shadow-lg pos-rlt" data-mh="main-news">

                                    <div data-mh="main-news-img">
                                        <div class="news-date font-bold">
                                            {{$event->day}}
                                        </div>
                                        <a href="{{$event->route=route('item',[$event->type,$event->slug])}}"><img
                                                    src="{{$event->hero('medium') ?? '/img/no-image.jpg'}}"
                                                    class="img-full img-post"
                                                    alt="{{$event->content_name=$event->getContent('name')}}"
                                            ></a>
                                    </div>
                                    <div class="wrapper-md">
                                        <div class="clear" data-mh="main-news-body">
                                            <a class="h4" href="{{$event->route}}">{{$event->content_name}}</a>

                                            <p class="text-xs">
                                                {!! str_strip_limit_words($event->getContent('body')) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        @endforeach


                    </div>
                @endforeach


            </div>


        </div>


    </section>






@endsection