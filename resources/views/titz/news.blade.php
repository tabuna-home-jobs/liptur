@extends('layouts.titz')



@section('titz_main')


    @forelse($elements as $element)
        <article class="row m-b-md">
            <div class="panel panel-default box-shadow-lg pos-rlt" data-mh="main-news">

                <div data-mh="main-news-img">
                    <a href="{{route('new',[$element->slug])}}"><img
                                src="{{$element->hero('medium') ?? '/img/no-image.jpg'}}"
                                alt="{{$element->getContent('name')}}"
                                class="img-full img-post "></a>
                </div>
                <div class="wrapper-md">
                    <div class="clear" data-mh="main-news-body">
                        <a class="h4" href="{{route('new',[$element->slug])}}">{{$element->getContent('name')}}</a>

                        <p class="text-xs">
                            {!! str_strip_limit_words($element->getContent('body'),400) !!}
                        </p>
                    </div>
                </div>
            </div>
        </article>

    @empty

        <div class="text-center  padder-v ">
            <div class=" wrapper-xl">
                Список пуст
            </div>
        </div>
    @endforelse


    <div class="row padder-v text-center">
        <div class="col-xs-12">
            {{ $elements->appends(request()->except('page'))->links() }}
        </div>
    </div>

@endsection
