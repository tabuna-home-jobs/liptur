@extends('layouts.app-new')

@section('title',$new->getContent('title'))
@section('description',$new->getContent('description'))
@section('keywords',$new->getContent('keywords'))
@section('image',config('app.url').$new->hero('high'))

@section('header')
    <div id="post-header">
        <div class="bg-white">
            <section class="container-lg">
                <div class="row">
                    <div class="bg-bordo" style="background-image: url('/img/tour/background/news-bg.jpg')">
                        <div class="container">
                            <h1 class="brand-header">Новости</h1>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="container-lg">
            <div class="row">
                <nav>
                    <div class="container">
                        @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                         'base' => [
                                'route' => route('news'),
                                'name' => 'Новости',
                        ],
                        'current' => $new->getContent('name')])
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection

@section('content')
    <section id="post-{{$new->id}}">
        <div class="container padder-v">
            <div class="row padder-v" id="post-title">
                <div class="col-md-12">
                    <div class="block-header">
                            {{$new->getContent('name')}}
                    </div>
                </div>
            </div>
            <div class="row m-t-md m-b-md">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div>
                        <div class="panel-default">
                            <div class="row">
                                <div class="padder-md col-md-12">
                                    <div class="small text-muted m-t-md">
                                        {{$new->publish_at->formatLocalized('%d %b %Y')}}
                                        <div class="pull-right">
                                            @include('partials.marketing.like',[
                                                'post' => $new
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($new->attachment) > 0)
                                <div class="owl-carousel owl-theme own-content">
                                    @foreach($new->attachment as $image)

                                         @if($loop->first)
                                            <figure class="item">
                                                <img class="img-responsive" src="/image/high{{$image->url('high')}}"
                                                     alt="{{$image->alt}}"
                                                     style="width: auto;margin: 0 auto; max-height: 600px;">
                                            </figure>
                                        @else
                                            <figure class="item">
                                                <img class="img-responsive owl-lazy"
                                                     data-src="/image/high{{$image->url()}}" alt="{{$image->alt}}"
                                                     style="width: auto;margin: 0 auto; max-height: 600px;">
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
                                            <a title="Перейти на источник записи"
                                               href="{{$new->getContent('source')}}"
                                               target="_blank"
                                               rel="nofollow"
                                               class="text-muted m-r-md">
                                                <i class="icon-briefcase"></i> Источник
                                            </a>
                                        </div>

                                        <div class="col-sm-6 text-right hidden-xs " role="group"
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
                      'comments' =>$new->comments,
                      'post' => $new
                     ] )
                </div>

                <aside class="col-md-4 hidden-xs hidden-sm">

                    <div class="aside-affix">
                        {{--
                        @if($new->attachment('docs')->count() > 0)
                            @include('partials.item.attachment',[
                                'title' => 'Файлы к новости',
                                'attachments' => $new->attachment('docs')->orderBy('sort','desc')->get(),
                            ])
                        @endif
                        --}}

                        <div class="panel b box-shadow-lg" data-mh="main-info-block"
                             style="width: 100%; display: flex; align-items: center; justify-content: center; max-height: 500px; background: rgb(198, 198, 198);">

                            @widget('advertising','side')

                        </div>

                        @widget('EmailSecondary')

                    </div>

                </aside>
            </div>
        </div>
    </section>

@endsection
