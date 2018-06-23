<div class="container hidden-xs hidden-sm container-owl-carousel" style="height: 534px;">

    <div class="hbox hbox-auto-xs" style="height: 534px; overflow: hidden">

        <div class="col" style="width: 800px; overflow: hidden">

                <div class="owl-carousel owl-theme secondary-carousel">
                    @foreach($carousel as $item)
                        <figure class="item">
                            <a href="{{$item->getContent('url')}}">
                                <img class="owl-lazy img-responsive" data-src="{{ $item->hero('standart') }}" alt=""
                                     width="800px"
                                     height="534px">
                            </a>
                        </figure>
                    @endforeach
                </div>

        </div>


        <div class="col bg-white">
            <div class="vbox">
                <img src="/img/weather/{{$weather['weather'][0]['icon']}}.jpg" alt="" class="img-responsive">
                <div class="wrapper-sm">

                    {{--
                    <div class="m-t-xxl text-center">
                        <span class="h3 text-uppercase">{{$weather['weather'][0]['description']}}</span>
                    </div>
                    --}}

                    <div class="text-center v-h-center">
                        <div>
                            <p class="small text-muted m-b-n-xs">
                                <nobr>{{round($weather['wind']['speed'],0)}} м/с</nobr>
                            </p>
                            <p class="small text-muted  m-b-n-xs">
                                <nobr>{{round($weather['main']['pressure'],0)}} hPa</nobr>
                            </p>
                        </div>

                        <div class="m-l-md">
                            <span class="h1"> <nobr>{{round($weather['main']['temp'],0)}}&#176;</nobr> </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

</div>
