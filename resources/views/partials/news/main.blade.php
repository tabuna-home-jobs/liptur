<section class="container-fluid bg-white b-t box-shadow-lg main-news">
    <div class="container padder-v">
        <div class="row  m-b-md">
            <div class="block-header pt-3">
                Новости

                <div class="pull-right hidden-xs text-right">
                    <a href="{{route('news')}}">
                        Все новости
                    </a>
                </div>
            </div>
        </div>


        <div class="row">


            @foreach($news as $new)


                <article class="col-md-4 padder-v">
                    <div class="panel panel-default box-shadow-lg pos-rlt">

                        <div data-mh="main-news-img">
                            <div class="news-date">
                                {{$new->dataPublishLocalization('j bg')}}
                            </div>
                            <a href="{{route('new',[$new->slug])}}" class="hidden-xs">
                                <img src="{{$new->hero('medium') ?? '/img/no-image.jpg'}}"
                                        class="img-full img-post "></a>
                        </div>
                        <div class="wrapper-md">
                            <div data-mh="main-news-body">
                                <a class="h4" href="{{route('new',[$new->slug])}}">{{$new->getContent('name')}}</a>

                                <p class="text-xs">
                                    {!! str_strip_limit_words($new->getContent('body')) !!}
                                </p>
                            </div>

                        </div>
                    </div>
                </article>
            @endforeach
                <div class="visible-xs text-center">
                    <a class="h4" href="{{route('news')}}">
                        Все новости
                    </a>
                </div>
        </div>

    </div>

</section>
