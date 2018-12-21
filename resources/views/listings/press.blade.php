@extends('layouts.about')


@section('listing')

    @foreach($press->chunk(2) as $pres)
        <div class="row">
            @foreach($pres as $item)
                <article class="col-md-6 padder-v">
                    <div class="panel panel-default box-shadow-lg" data-mh="main-news">

                        <div data-mh="main-news-img">
                            <a href="{{route('item',[
                                        'type' => 'press',
                                        'slug' => $item->slug
                                        ])}}"><img src="{{$item->hero('medium') ?? '/img/no-image.jpg' }}"
                                                   class="img-full img-post" alt="{{$item->getContent('name')}}"></a>
                        </div>
                        <div class="wrapper-md">
                            <div class="clear" data-mh="main-news-body">
                                <p class="h4 m-b-xs"><a
                                            href="{{route('item',[
                                        'type' => 'press',
                                        'slug' => $item->slug
                                        ])}}">{!! $item->getContent('name') !!}</a>
                                </p>
                                <p class="text-xs">
                                    {!! str_strip_limit_words($item->getContent('body')) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

            @endforeach
        </div>
    @endforeach


    <div class="row padder-v text-center">
        {{$press->links()}}
    </div>


@endsection