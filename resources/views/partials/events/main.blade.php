<section class="main-events">
    <div class="container padder-v">
        <div class="row  m-b-md">
            <div class="block-header pt-3">
                {{__('Events Lipetsk region')}}

                <div class="input-group pull-right hidden-xs m-r-md" id="select-news">
                    <a href="{{route('catalog',['catalog' => 'festivals'])}}">
                        {{__('All events')}}
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
                                <img src="@if(!$loop->parent->first || !$loop->first) {{$event->hero('medium') ?? '/img/no-image.jpg'}} @else {{$event->hero('high') ?? '/img/no-image.jpg'}} @endif"
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
                {{__('All events')}}
            </a>
        </div>
    </div>
</section>
