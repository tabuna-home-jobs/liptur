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


            <div class="col-md-4 col-xs-12 padder-sm">
                <div class="vbox row">
                  @foreach($tours as $index => $item)
                    @if ($index == 0)
                      <div class="col-xs-12 m-b-md">
                        <a href="{{route('item', ['tour', $item->slug])}}">
                          <img class="img-responsive" src="{{$item->attachment->where('group', 'main')->first()->url()}}" alt="">
                        </a>
                      </div>
                    @elseif ($index == 1)
                      <div class="col-xs-6 padder-r-10">
                        <a href="{{route('item', ['tour', $item->slug])}}">
                          <img class="img-responsive" src="{{$item->attachment->where('group', 'sub')->first()->url()}}" alt="">
                        </a>
                      </div>
                    @else
                      <div class="col-xs-6 padder-l-10">
                        <a href="{{route('item', ['tour', $item->slug])}}">
                          <img class="img-responsive" src="{{$item->attachment->where('group', 'sub')->first()->url()}}" alt="">
                        </a>
                      </div>
                    @endif

                  @endforeach
                </div>
            </div>

        </div>

    </div>
</section>