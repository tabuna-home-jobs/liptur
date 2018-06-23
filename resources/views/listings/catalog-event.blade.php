@extends('layouts.app')


@section('title',$name)
@section('description','')
@section('keywords','')



@section('content')




    <section class="container-fluid">
        <div class="row">


            <div style="background:url({{$type->image}}) center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row m-t">


                        <div class="container m-t-md top-desc-block">


                            <div class="col-md-6  pull-bottom text-white">


                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">{{$name}}</h1>


                            </div>


                        </div>


                    </div>
                </div>
            </div>


            <nav class="bg-danger box-shadow-lg">
                <div class="container">

                    @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                        'current' => $name
                    ])

                </div>
            </nav>


        </div>
    </section>





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
                                        <a href="{{route('item',[$event->type,$event->slug])}}"><img
                                                    src="{{$event->hero('medium')}}"
                                                    class="img-full img-post"
                                                    alt="{{$event->getContent('name')}}"
                                            ></a>
                                    </div>
                                    <div class="wrapper-md">
                                        <div class="clear" data-mh="main-news-body">
                                            <p class="h4 m-b-xs"><a
                                                        href="{{route('item',[$event->type,$event->slug])}}">{{$event->getContent('name')}}</a>
                                            </p>
                                            <p class="text-xs">
                                                {{str_strip_limit_words($event->getContent('body'))}}
                                            </p>
                                        </div>
                                        <p class="top-left wrapper bg-danger square-md">
                                            <time class="font-bold text-white">{{$event->day}}</time>
                                        </p>
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