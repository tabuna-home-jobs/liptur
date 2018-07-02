@extends('layouts.app')

@section('title',$new->getContent('title'))
@section('description',$new->getContent('description'))
@section('keywords',$new->getContent('keywords'))
@section('image',config('app.url').$new->hero('high'))

@section('content')


    <section id="post-{{$new->id}}">
        <div class="container">

            <div class="row m-t-md m-b-md">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="blog-post">
                        <div class="panel panel-default">


                            <div class="padder-md">
                                <div class="page-header m-b-xs">

                                    <h1 class="h3 l-h-1x">
                                        {{$new->getContent('name')}}
                                    </h1>

                                </div>

                                <p class="small text-muted m-t-md">{{$new->publish_at->formatLocalized('%d %b %Y')}}


                                    <a title="Перейти на источник записи"
                                       href="{{$new->getContent('source')}}"
                                       target="_blank"
                                       rel="nofollow"
                                       class="text-muted m-r-md pull-right"
                                    >
                                        <i class="icon-briefcase"></i> Источник
                                    </a>


                                </p>

                            </div>

                            @if(count($new->attachment) > 0)

                                <div class="owl-carousel owl-theme own-content">
                                    @foreach($new->attachment as $image)

                                        @if($loop->first)
                                            <figure class="item">
                                                <img class="img-responsive" src="{{$image->url('standart')}}"
                                                     alt="{{$image->alt}}"
                                                     style="width: auto;margin: 0 auto;     max-height: 600px;">
                                            </figure>
                                        @else
                                            <figure class="item">
                                                <img class="img-responsive owl-lazy"
                                                     data-src="{{$image->url('standart')}}" alt="{{$image->alt}}"
                                                     style="width: auto;margin: 0 auto;    max-height: 600px;">
                                            </figure>
                                        @endif

                                    @endforeach
                                </div>

                            @endif


                            <div class="wrapper-lg">
                                <main>
                                    {!! $new->getContent('body') !!}
                                </main>


                                <div class="wrapper-md b-t">

                                    <div class="row v-center">


                                        <div class="col-sm-6 col-xs-12">

                                            @include('partials.marketing.like',[
                                                'post' => $new
                                            ])


                                        </div>

                                        <div class="col-sm-6 text-right hidden-xs" role="group"
                                             aria-label="Social Links">

                                            @include('partials.marketing.socialShare')

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="row hidden-xs hidden-sm">
                        @foreach($similars as $similar)


                            <article class="col-md-6 padder-v">
                                <div class="panel panel-default box-shadow-lg pos-rlt">

                                    <div data-mh="main-news-img">
                                        <a href="{{route('new',[$similar->slug])}}"><img
                                                    src="{{$similar->hero('medium')}}"
                                                    class="img-full img-post "></a>
                                    </div>
                                    <div class="wrapper-md">
                                        <div data-mh="main-news-body">
                                            <p class="h4 m-b-xs"><a
                                                        href="{{route('new',[$similar->slug])}}">{{$similar->getContent('name')}}</a>
                                            </p>
                                            <p class="text-xs">
                                                {{str_strip_limit_words($similar->getContent('body'))}}
                                            </p>
                                        </div>

                                        <p class="top-left wrapper bg-danger">
                                            <time class="font-bold text-white" datetime="{{$similar->publish_at}}">
                                                {{$similar->publish_at->formatLocalized('%d %B')}}
                                            </time>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>


                    @include('partials.comments.comments',[
                        'id' => $new->id,
                        'comments' => $new->comments,
                        'post' => $new
                    ])


                </div>
                <aside class="col-md-4 hidden-xs hidden-sm">


                    <div class="aside-affix">
                        <div class="panel b box-shadow-lg" data-mh="main-info-block"
                             style="width: 100%; display: flex; align-items: center; justify-content: center; max-height: 500px; background: rgb(198, 198, 198);">

                            @widget('advertising','side')

                        </div>


                        @if($new->attachment('docs')->count() > 0)
                            <div class="panel b box-shadow-lg wrapper-lg">

                                <p class="h3 font-thin  m-b-lg">Докуметы для <span class="text-danger">Загрузки</span>
                                </p>

                                <div class="list-group list-group-lg list-group-sp list-no-border b-t">
                                    @foreach($new->attachment('docs')->orderBy('sort','desc')->get() as $attachment)
                                        <a href="{{$attachment->url()}}"
                                           class="list-group-item"
                                           title="{{$attachment->alt}}">
                                            <span class="text-ellipsis">{{$attachment->original_name}}</span>
                                        </a>
                                    @endforeach

                                </div>

                            </div>
                        @endif


                        @widget('EmailSecondary')

                    </div>

                </aside>
            </div>
        </div>
    </section>

@endsection
