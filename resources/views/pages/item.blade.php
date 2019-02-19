@extends('layouts.app-new')

@section('title',$item->getContent('title'))
@section('description',$item->getContent('description'))
@section('keywords',$item->getContent('keywords'))
@section('image',config('app.url').$item->hero('high'))


@section('header')

    <div id="post-header" class="catalog-item">
        <div style="background:url({{$item->hero('high')}}) center center; background-size:cover">
            <div class="bg-black-opacity bg-dark">
                <div class="container pos-rlt min-h-h">
                    <div class="pos-rlt top-desc-block ">
                        <div class="row">
                            @if($type->display()->get('time') === true)
                                <time class=" time text-center w-md ">@include('partials.date.'.str_date_top($item->getContent('open'),$item->getContent('close')),[
                                    'open' => date_parse($item->getContent('open')),
                                    'close' => date_parse($item->getContent('close')),
                                ])</time>
                            @endif
                        </div>
                    </div>

                    <div class="row m-t-xxl m-b-md padder-v">
                        <div class="pull-bottom text-white padder-v m-l-xl">
                            <h1 class="text-white brand-header" itemprop="headline">{{$item->getContent('name')}}</h1>
                            @if (!empty($item->getContent('place')['name']))
                                <p class="text-white text-sm"><i class="fa fa-map-marker"></i> {{$item->getContent('place')['name'] or ''}}</p>
                            @endif
                            <div class="lead hidden-xs v-center">
                               <span id="stars-existing" class="starrr text-warning-lt"
                                     data-rating='{{$rating->percent}}' data-post-id='{{$item->id}}'
                                     style="cursor: pointer;"></span>
                                <em class="m-l-sm text-sm"> {{__('Average rating')}} {{$rating->percent}} {{__('stars')}}</em>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="container-lg  hidden-xs">
            <div class="row">
                <nav>
                    <div class="container">
                        @include('partials.breadcrumb',[
                            'base' => [
                                'route' => route('catalog',$type->slug),
                                'name' => $type->name,
                            ],
                            'breadcrumb' => $type->name,
                            'current' => $item->getContent('name')
                        ])
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection


@section('content')


    <div itemscope itemtype="http://schema.org/Article">

        <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage"
              itemid="{{ url()->current() }}"/>


        <section id="post-{{$item->id}}">

            <div class="container">

                <div class="m-t-md m-b-md">

                    <div class="row">
                        <div class="col-md-8 no-padder box-shadow-lg">


                            @if(!empty($item->getContent('guide')))
                                <div class="panel v-center hidden-md hidden-lg"
                                     style="box-shadow: 0 1px 1px #dee5e7; background-color: #d4de75;">

                                    <a href="{{ $item->getContent('guide') }}" class="wrapper-md block w-full v-center">
                                        <img src="/img/icon-sound.png"
                                             style="width: 62px;height: 45px;margin-right: 10px">
                                        <span style="color: #411b20;
                                font-family: 'William Text Pro';
                              font-size: 20px;
                              font-weight: 700;">Послушать аудиогид</span>
                                    </a>
                                </div>
                            @endif



                            @if(!empty($item->getOption('option','')))
                                <div class="text-center l-h-1x icon-list-options b-b">
                                    @foreach($item->getOption('option',[]) as $key => $value)
                                        <span title="{{config('icon.attributes.'.$key)}}">
                                           <i class="{{$key}}"></i>
                                           <span class="text-ellipsis">{{ __(config('icon.attributes.'.$key)) }}</span>
                                       </span>
                                    @endforeach
                                </div>
                            @endif

                            @if(count($item->attachment) > 1)
                                <div class="owl-carousel owl-theme own-content m-b-md">
                                    @foreach($item->attachment as $image)

                                        @if($loop->iteration == 2)
                                            <figure class="item" itemprop="image" itemscope
                                                    itemtype="https://schema.org/ImageObject">
                                                <img class="img-responsive" itemprop="contentUrl"
                                                     src="{{$image->url('high')}}" alt="{{$image->alt}}"
                                                     style="width: auto;margin: 0 auto; max-height: 600px;">


                                                <img style="display: none" itemprop="url"
                                                     src="{{ $image->url('original') }}"
                                                     alt="{{ $item->getContent('title') }}"/>

                                            </figure>
                                        @elseif($loop->first)

                                        @else
                                            <figure class="item" itemprop="image" itemscope
                                                    itemtype="https://schema.org/ImageObject">
                                                <img class="img-responsive owl-lazy" itemprop="contentUrl"
                                                     data-src="{{$image->url('high')}}"
                                                     alt="{{$image->alt}}"
                                                     style="width: auto;margin: 0 auto; max-height: 600px;">

                                                <img style="display: none" itemprop="url"
                                                     src="{{ $image->url('original') }}"
                                                     alt="{{ $item->getContent('title') }}"/>
                                            </figure>
                                        @endif

                                    @endforeach
                                </div>

                            @endif


                            <div class="hbox text-center text-sm b-b m-b-md hidden-xs hidden">
                                <a type="button" data-toggle="modal" data-target="#support"
                                   class="col padder-v text-muted b-r b-light">
                                    <i class="icon-envelope block m-b-xs fa-2x"></i>
                                    <span>Связаться</span>
                                </a>

                                <a href="#map-event" class="col padder-v text-muted b-r b-light">
                                    <i class="icon-home block m-b-xs fa-2x"></i>
                                    <span>На карте</span>
                                </a>

                                @if(!empty($item->getContent('organizer')))
                                    <span title="Организатор: {{$item->getContent('organizer')}}"
                                          class="col padder-v text-muted b-r b-light">
                                               <i class="icon-organization block m-b-xs fa-2x"></i>
                                               <span class="text-ellipsis">{{$item->getContent('organizer')}}</span>
                                           </span>
                                @endif

                                @if(!empty($item->getContent('type-event')))
                                    <span title="Тип мероприятия: {{$item->getContent('type-event')}}"
                                          class="col padder-v text-muted b-r b-light">
                                               <i class="icon-badge block m-b-xs fa-2x"></i>
                                               <span class="text-ellipsis">{{$item->getContent('type-event')}}</span>
                                           </span>
                                @endif


                                @if(!empty($item->getContent('number-of-seats')))
                                    <span title="Количество мест: {{$item->getContent('number-of-seats')}}"
                                          class="col padder-v text-muted b-r b-light">
                                               <i class="icon-cup block m-b-xs fa-2x"></i>
                                               <span class="text-ellipsis">Мест: {{$item->getContent('number-of-seats')}}</span>
                                           </span>
                                @endif

                                @if(!empty($item->getContent('price')))
                                    <span title="Стоимость: {{$item->getContent('price')}}"
                                          class="col padder-v text-muted b-r b-light">
                                               <i class="icon-credit-card block m-b-xs fa-2x"></i>
                                               <span class="text-ellipsis">{{$item->getContent('price')}}</span>
                                           </span>
                                @endif


                                @if(!empty($item->getContent('site')))
                                    <a href="{{$item->getContent('site')}}" target="_blank"
                                       rel="nofollow noopener noreferrer"
                                       class="col padder-v text-muted b-r b-light">
                                        <i class="icon-link block m-b-xs fa-2x"></i>
                                        <span>Веб-сайт</span>
                                    </a>
                                @endif


                                <a href="" class="col padder-v text-muted b-light">
                                    <i class="icon-printer block m-b-xs fa-2x"></i>
                                    <span>На печать</span>
                                </a>

                            </div>


                            <div itemprop="articleBody">
                                <main class="wrapper-lg">
                                    {!! $item->getContent('body') !!}
                                </main>
                            </div>


                            <div class="hidden" itemprop="publisher" itemscope
                                 itemtype="http://schema.org/Organization">
                                <span itemprop="name">Липецкий туристический портал</span>
                                <figure itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                                    <img class="hidden" itemprop="contentUrl" src="/img/tour/logo.png"
                                         alt="Липецкий туристический портал"/>
                                    <img itemprop="url" src="/img/tour/logo.png" alt="Липецкий туристический портал"/>
                                    <meta itemprop="width" content="66"/>
                                    <meta itemprop="height" content="59"/>
                                </figure>
                            </div>


                            <div class="wrapper-md b-t">

                                <div class="row">


                                    <div class="col-md-6">

                                        <p class="font-thin  m-t-sm">
                                            <time datetime="{{ $item->created_at->toRfc3339String() }}">
                                                <i class="fa fa-clock-o text-muted"></i>

                                                <em>{{__('Posted by')}} {{$item->created_at->diffForHumans()}}</em>

                                                <meta itemprop="dateModified"
                                                      content="{{ $item->updated_at->toRfc3339String() }}"/>
                                                <meta itemprop="datePublished"
                                                      content="{{ $item->created_at->toRfc3339String() }}"/>
                                            </time>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-right" role="group"
                                         aria-label="Social Links">

                                        @include('partials.marketing.socialShare')

                                    </div>
                                </div>
                            </div>

                            @if(!empty($item->getContent('place')) && key_exists('name',$item->getContent('place')) && $item->status != 'cfo')
                                <div id="map-event" class="maps"
                                     data-lat="{{$item->getContent('place')['lat']}}"
                                     data-lng="{{$item->getContent('place')['lng']}}"
                                     data-name="{{$item->getContent('place')['name']}}"
                                     style="height: 300px"></div>
                            @endif

                            {{--
                            @if(isset($item->content['route']))
                                @include('partials.route.item')
                            @endif
                            --}}
                        </div>


                        <aside class="col-md-4 hidden-xs hidden-sm">


                            <div class="aside-affix">


                                {{--
                                <div class="row m-n panel b box-shadow-lg">
                                    @if(isset($displayRoute))
                                        @include('partials.route.path')
                                    @endif
                                </div>
                                --}}



                                @if(!empty($item->getContent('booking')))
                                    @include('partials.item.booking')
                                @endif

                                @if(!empty($item->getContent('phone')))
                                    @include('partials.item.phone',[
                                        'phone' => $item->getContent('phone'),
                                        'address' => $item->getContent('place')['name'],
                                    ])
                                @endif

                                @if($item->type == 'tour')
                                    @widget('reservation',['postid'=>$item->id] )
                                @endif
                                @if($item->attachment('docs')->count() > 0)
                                    @include('partials.item.attachment',[
                                        'attachments' => $item->attachment('docs')->get(),
                                    ])
                                @endif

                                @if(strlen(strip_tags($item->getContent('body'))) >= 1000)
                                    <div id="adb" class="panel b box-shadow-lg text-center"
                                         data-mh="main-info-block"
                                         style="width: 100%; display: flex; align-items: center; justify-content: center; max-height: 500px; background: rgb(198, 198, 198);">
                                        @widget('advertising','side')
                                    </div>
                                @endif


                                @if(!empty($item->getContent('guide')))
                                    <div class="panel v-center hidden-xs"
                                         style="box-shadow: 0 1px 1px #dee5e7; background-color: #d4de75;">

                                        <a href="{{ $item->getContent('guide') }}" class="wrapper-md block w-full v-center">
                                            <img src="/img/icon-sound.png"
                                                 style="width: 62px;height: 45px;margin-right: 10px">
                                            <span style="color: #411b20;
                                font-family: 'William Text Pro';
                              font-size: 20px;
                              font-weight: 700;">Послушать аудиогид</span>
                                        </a>
                                    </div>
                                @endif

                                @widget('EmailSecondary')


                            </div>
                        </aside>


                    </div>
                </div>

            </div>

        </section>


    </div>
@endsection


@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.maps.key')}}"
        type="text/javascript"></script>
@endpush
