<section class="main-events">
    <div class="container padder-v">
        <div class="row  m-b-md">
            <div class="block-header pt-3">
                Интересные события Липецкой области

                <div class="input-group pull-right hidden-xs m-r-md" id="select-news">
                    <a href="{{route('catalog',['catalog' => 'festivals'])}}">
                        Все актуальные события
                    </a>
                </div>
            </div>
        </div>

        @foreach($events->chunk(3) as $eventChunk)

            <div class="row">

                @foreach($eventChunk as $event)
                    <div @if($loop->parent->first && $loop->first) class="col-md-8 col-xs-12"
                         @else class="col-md-4 col-xs-12" @endif>

                        <div class="pos-rlt @if(!$loop->parent->first || !$loop->first) change-xs @endif">
                            <div class="news-date">
                                {{Date::parse($event->getContent('open'))->formatLocalized('%d %b')}}
                            </div>
                            <a href="{{route('item',[$event->type,$event->slug])}}"
                               title="{{$event->getContent('name')}}"
                               class="@if(!$loop->parent->first || !$loop->first) hidden-xs @endif">
                                <img src="{{$event->hero('medium') ?? '/img/no-image.jpg'}}"
                                     alt="{{$event->getContent('name')}}"
                                     class="img-responsive @if($loop->parent->first && $loop->first) first-image @endif">
                            </a>
                            <div class="header padder-v m-b-xs">

                                @if($loop->parent->first && $loop->first)
                                    <div class="page-header m-t-md">
                                        <a class="h3 font-thin" href="{{route('item',[$event->type,$event->slug])}}"
                                           title="{{$event->getContent('name')}}">
                                            {{$event->getContent('name')}}
                                        </a>
                                    </div>
                                @else
                                    <a class="h4 l-h-1x font-thin" href="{{route('item',[$event->type,$event->slug])}}"
                                       title="{{$event->getContent('name')}}">
                                        {{$event->getContent('name')}}
                                    </a>
                                @endif

                                @if($loop->parent->first && $loop->first)
                                    <p class="text-xs m-t-md">
                                        {!! str_strip_limit_words($event->getContent('body'),300) !!}
                                    </p>
                                @endif

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach
        <div class="input-group  visible-xs  text-center" id="select-news">
            <a class="h4" href="{{route('catalog',['catalog' => 'festivals'])}}">
                Все актуальные события
            </a>
        </div>
    </div>
</section>


{{--
<div class="container-fluid bg-white b-b box-shadow-lg padder-v">
    <div class="container">

        <div class="row wrapper">
            <div class="col-sm-6 col-xs-6 bottom-line bg-white">
                <h1 class="h3 font-thin">Интересные <span class="text-danger">События</span> Области</h1>
            </div>

            <div class="col-sm-6 col-xs-6 bottom-line bg-white">
                <p class="w-full m-n">
                    <a href="{{route('catalog',[
                        'catalog' => 'festivals'
                    ])}}" class="pull-right btn-more h5  font-thin"><span class="text-muted">Смотреть все</span>
                        <span class="btn btn-outline btn-danger btn-rounded btn-sm btn-icon btn-default m-l-sm">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                    </a>
                </p>
            </div>
        </div>


        @foreach($events->chunk(3) as $eventChunk)

            <div class="row wrapper">

                @foreach($eventChunk as $event)
                    <div @if($loop->parent->first && $loop->first) class="col-md-8 col-xs-12"
                         @else class="col-md-4 col-xs-12" @endif>

                        <div class="pos-rlt">
                            <a href="{{route('item',[$event->type,$event->slug])}}"
                               title="{{$event->getContent('name')}}">
                                <img src="{{$event->hero('medium') ?? '/img/no-image.jpg'}}"
                                     alt="{{$event->getContent('name')}}" class="img-responsive img-rounded"
                                     style="
                                     @if(!$loop->parent->first || !$loop->first) height: 200px; @else height: 350px; @endif
                                             -o-object-fit: cover;
                                             object-fit: cover;
                                             width: 100%;
                                             margin: 0 auto;">
                            </a>
                            <div class="header padder-v m-b-xs">

                                @if($loop->parent->first && $loop->first)
                                    <div class="page-header m-t-md">
                                        <a class="h3 font-thin" href="{{route('item',[$event->type,$event->slug])}}"
                                           title="{{$event->getContent('name')}}">
                                            {{$event->getContent('name')}}
                                        </a>
                                    </div>
                                @else
                                    <a class="h4 l-h-1x font-thin" href="{{route('item',[$event->type,$event->slug])}}"
                                       title="{{$event->getContent('name')}}">
                                        {{$event->getContent('name')}}
                                    </a>
                                @endif

                                @if($loop->parent->first && $loop->first)
                                    <p class="text-muted m-t-md">
                                        {{str_strip_limit_words($event->getContent('body'),300)}}
                                    </p>
                                @endif


                                <p class="top-left wrapper bg-danger">
                                    <time class="font-bold text-white">
                                        {{Date::parse($event->getContent('open'))->formatLocalized('%d %b')}}
                                    </time>
                                </p>

                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        @endforeach


    </div>
</div>
--}}