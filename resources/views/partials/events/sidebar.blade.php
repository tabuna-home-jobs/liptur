<div class="panel wrapper-xl b box-shadow-lg padder-lg text-center news-email">

    <p class="h3 font-thin  m-b-lg">
        Ближайшие События
    </p>

    <div class="text-left">
        @foreach($events as $event)
            @php
                $event->route=route('item',[$event->type,$event->slug]);
                $event->content_name=$event->getContent('name');
            @endphp
        <div>
            <a href="{{$event->route}}" class="pull-left thumb thumb-wrapper m-r">
                <img src="{{$event->hero('low') ?? '/img/no-image.jpg'}}"  alt="{{$event->content_name}}">
            </a>

            <div class="clear">
                <a href="{{$event->route}}" class="font-semibold text-ellipsis">{{$event->content_name}}</a>
                <div class="text-xs block m-t-xs">{{Date::parse($event->getContent('open'))->formatLocalized('%d %b')}}</div>
            </div>
        </div>
        <div class="line"></div>
        @endforeach
    </div>

</div>
