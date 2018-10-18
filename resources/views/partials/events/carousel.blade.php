{{--
<div class="hidden-xs col-xs-12 col-sm-12 col-md-12 text-white container-owl-carousel">
    <div class="owl-carousel owl-theme main-carousel">
        @foreach($carousel as $item)
            <figure class="item">
                <a href="{{$item->getContent('url')}}">
                    <img class="owl-lazy img-responsive" data-src="{{ $item->hero() }}"
                         alt="{{$item->getContent('name')}}">
                    <figcaption>
                        <div class="caption m-t-xs m-l-xxl m-b-xxl text-while">
                            <time class="h3 font-thin text-white b-b">
                                {{$item->dataPublishLocalization()}}
                            </time>
                            <p class="h1 m-t-md">{{$item->getContent('name')}}</p>
                        </div>
                    </figcaption>
                </a>
            </figure>
        @endforeach
    </div>
</div>
--}}

<div class="owl-carousel main-carousel owl-theme owl-with-dots hidden-xs">
    @foreach ($carousel as $item)
        <div class="item">
            <a href="{{$item->getContent('url')}}">
                <img class="img-responsive" src="{{$item->hero()}}"/>
                <div class="owl-shop-block container">
                    <div class="row row-flex">
                        <div class="container no-padder">
                            <div class="row row-flex">
                                <div class="col-md-12 col-sm-12">
                                    <div class="owl-shop-title text-left">
                                        {{$item->getContent('name')}}
                                    </div>
                                </div>
                            </div>
                            <div class="row row-flex">
                                <div class="col-md-8 col-sm-12 text-left">
                                    <div class="owl-shop-description">
                                        {!! $item->getContent('description') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
