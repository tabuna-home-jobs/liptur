@if(!is_null($post))
    <section class="container m-b-md m-t-md vi-hide hidden-xs">
        <div class="row">


            <div class="col-md-8">


                <div class="panel b box-shadow-lg" data-mh="main-info-block" style="
        overflow: hidden;
    ">

                    <div class="col-md-12 no-padder">

                        <div class="item">
                            <div class="pos-rlt">

                                <a href="{{route('item',[$post->type,$post->slug])}}">
                                    <div class="center bg-black-opacity">

                                        <div class="bottom pull-left wrapper-lg">
                                            <div class="icon-image">
                                                <p class="h4 font-thin m-b-md">
                                                    {{$post->getContent('name')}}
                                                </p>

                                                <p class="text-warning-lt">

                                                    @for($i = 0; $i < 5; $i++)
                                                        @if($i >= $rating)
                                                            <i class="fa text-lg fa-star-o"></i>
                                                        @else
                                                            <i class="fa text-lg fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                                <a href="{{route('item',[$post->type,$post->slug])}}">
                                    <img src="{{$post->hero('medium')}}" class="img-full" height="250px"
                                         style="object-fit: cover">
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 no-padder  text-center">


                        <div class="wrapper-md">
                            <p class="text-justify">
                                {{str_strip_limit_words($post->getContent('body'),510)}}
                            </p>
                        </div>

                    </div>


                </div>

            </div>

            @widget('subscription','main')

        </div>
    </section>
@endif