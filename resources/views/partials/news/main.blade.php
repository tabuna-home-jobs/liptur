<section class="container-fluid bg-white b-t box-shadow-lg">
    <div class="container padder-v">
        <div class="col-md-12">


            <div class="row padder-v v-center">
                <div class="col-md-6 col-xs-12">
                    <p class="h3 font-thin">Последние <span class="text-danger">Новости</span></p>
                </div>
                <div class="col-md-6 text-right hidden-xs">
                    <a href="{{route('news')}}" class="text-center h5  btn-more font-thin"><span class="text-muted">Смотреть все</span>
                        <span class="btn btn-outline btn-danger btn-rounded btn-sm btn-icon btn-default m-l-sm">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                    </a>
                </div>


            </div>


            <div class="row">


                @foreach($news as $new)


                    <article class="col-md-4 padder-v">
                        <div class="panel panel-default box-shadow-lg pos-rlt">

                            <div data-mh="main-news-img">
                                <a href="{{route('new',[$new->slug])}}"><img
                                            src="{{$new->hero('medium') ?? '/img/no-image.jpg'}}"
                                            class="img-full img-post "></a>
                            </div>
                            <div class="wrapper-md">
                                <div data-mh="main-news-body">
                                    <p class="h4 m-b-xs"><a
                                                href="{{route('new',[$new->slug])}}">{{$new->getContent('name')}}</a>
                                    </p>
                                    <p class="text-xs">
                                        {{str_strip_limit_words($new->getContent('body'))}}
                                    </p>
                                </div>

                                <p class="top-left wrapper bg-danger">
                                    <time class="font-bold text-white">
                                        {{$new->dataPublishLocalization('j bg')}}
                                    </time>
                                </p>

                            </div>
                        </div>
                    </article>
                @endforeach

            </div>


        </div>


    </div>

</section>
