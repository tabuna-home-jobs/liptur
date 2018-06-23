<section class="container-fluid bg-white b-t b-b box-shadow vi-hide hidden-xs container-owl-carousel">

    <div class="row  v-center m-t-md m-b-xs">
        <!--<div class="container">
            <p class="h3 font-thin">Афиша</p>
        </div>-->
    </div>

    <div class="row wrapper m-b-md">
        <div class="container">
            <div class="owl-carousel owl-theme poster poster-carousel">
                @foreach($cinema as $item)
                    <!--<figure class="item">
                        <a href="{{route('item',['film',$item->slug])}}" title="{{$item->getContent('Name')}}">
                            <img class="owl-lazy img-responsive"
                                 data-src="{{isset($item->attachment('image')->get()[1]) ? $item->attachment('image')->get()[1]->url('standart') : $item->hero() }}"
                                 alt="{{$item->getContent('Name')}}">
                            <figcaption>
                                <div class="caption m-t-xs">
                                    <small class="text-ellipsis">{{$item->getContent('Name')}}</small>
                                    <time class="small text-muted font-thin"></time>
                                </div>
                            </figcaption>
                        </a>
                    </figure>-->
                @endforeach

            </div>
        </div>
    </div>
</section>


