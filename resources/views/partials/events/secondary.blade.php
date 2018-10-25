<section class="bg-gray main-secondary-slider">
    <div class="container container-owl-carousel m-t-xxl m-b-xxl" >

        <div class="row equal" style="overflow: hidden">

            <div class="col-md-8 col-xs-12" style="overflow: hidden">

                    <div class="owl-carousel owl-theme secondary-carousel">
                        @foreach($carousel as $item)
                            <figure class="item">
                                <a href="{{$item->getContent('url')}}">
                                    <img class="owl-lazy img-responsive" data-src="{{ $item->hero('high') }}" alt=""
                                         width="800px"
                                         height="534px">
                                </a>
                            </figure>
                        @endforeach
                    </div>

            </div>


            <div class="col-md-4 col-xs-12">
                <div class="vbox">
                    <img src="/img/weather/{{$weather['weather'][0]['icon']}}.jpg" alt="" class="img-responsive weather-img">
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
</section>