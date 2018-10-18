<div class="owl-carousel main-carousel owl-theme owl-with-dots hidden-xs">
    @foreach ($slides as $slide)
        <div class="item">
            <a href="{{$slide->getContent('link')}}">
            <img class="img-responsive" src="{{$slide->attachment->first()->url()}}"/>
            <div class="owl-shop-block container">
                <div class="row row-flex">
                    <div class="container no-padder">
                        <div class="row row-flex">
                            <div class="col-md-12 col-sm-12">
                                <div class="owl-shop-title text-left">
                                    {{$slide->getContent('name')}}
                                </div>
                            </div>
                        </div>
                        <div class="row row-flex">
                            <div class="col-md-8 col-sm-12 text-left">
                                    <div class="owl-shop-description">
                                        {!! $slide->getContent('body') !!}
                                    </div>
                            </div>
                            <div class="col-md-4 col-sm-12 owl-shop-price">
                                <div class="text-right">
                                    {!! $slide->getContent('price') !!}
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