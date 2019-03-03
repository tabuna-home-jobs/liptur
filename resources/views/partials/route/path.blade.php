<div class="col-md-12 wrapper b-b text-right">
    <div class="padder-md">
        <!-- streamline -->

        <div class="m-b text-md">
            <p class="h4 text-center font-thin">Маршрут</p>
        </div>
        <div class="streamline b-l m-b">
            @foreach($displayRoute as $point)
                <div class="sl-item">
                    <div class="m-l">
                        <div class="text-muted pull-left">{{$point['time']}}</div>
                        <p>
                            @if(isset($point['url']))
                                <a href="{{$point['url']}}">{{$point['name']}}</a>
                            @else
                                {{$point['name']}}
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>