@extends('layouts.app')


@section('title',$type->display()->get('title',$name))
@section('description',$type->display()->get('description',$name))
@section('keywords',$type->display()->get('description',$name))



@section('content')

    <section class="container-fluid">
        <div class="row">

            <div style="background:url({{$type->image}}) center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row m-t">


                        <div class="container m-t-md top-desc-block">


                            <div class="col-md-6  pull-bottom text-white">


                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">{{$name}}</h1>


                            </div>


                        </div>


                    </div>
                </div>
            </div>

            <nav class="bg-danger box-shadow-lg">
                <div class="container">

                    @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                        'current' => $name
                    ])

                </div>
            </nav>


        </div>
    </section>





    <section class="bg-white b-t box-shadow-lg">
        <div class="container padder-v">


            <aside class="col-md-4 hidden-xs">


                <div class="padder-v">

                    @php
                        $filters =$type->getFilters();
                    @endphp

                    @if($filters->count() > 0 )
                        <div id="filters" class="panel b box-shadow-lg wrapper-md">
                            <form>
                                @foreach($filters as $filter)
                                    @if($filter->display)
                                        {!! $filter->display() !!}
                                        <div class="line line-dashed b-b line-lg"></div>
                                    @endif
                                @endforeach

                                <p class="text-center m-t-sm">
                                    <a href="{{route(Request::route()->getName(),$type->slug)}}" class="btn btn-link text-xs m-r-sm reset-form">Сбросить
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-rounded">Подобрать</button>
                                </p>
                            </form>
                        </div>
                    @endif

                    @if($type->slug === 'festivals')
                    <div class="panel b box-shadow-lg" data-mh="main-info-block"
                        style="width: 100%; display: flex; align-items: center; justify-content: center; max-height: 500px; background: rgb(198, 198, 198);">

                        @widget('advertising','side')

                    </div>
                    @endif

                    <div class="panel b box-shadow-lg  text-center">
                        @widget('advertising','social')
                    </div>


                    @widget('EmailSecondary')


                </div>

            </aside>

            <div class="col-md-8">


                @forelse($elements->chunk(2) as $elementChunk)

                    <div class="row padder-v">
                        @foreach($elementChunk as $element)
                            <article class="col-md-6">
                                <div class="panel panel-default box-shadow-lg pos-rlt" data-mh="main-news">
                                    <div data-mh="main-news-img">
                                        <a href="{{route($type->route(),[$element->type,$element->slug])}}"><img
                                                    src="{{$element->hero('medium') ?? '/img/no-image.jpg'}}"
                                                    alt="{{$element->getContent('name')}}"
                                                    class="img-full img-post "></a>
                                    </div>
                                    <div class="wrapper-md">
                                        <div class="clear" data-mh="main-news-body">
                                            <p class="h4 m-b-xs"><a
                                                        href="{{route($type->route(),[$element->type,$element->slug])}}">{{$element->getContent('name')}}</a>
                                            </p>
                                            <p class="text-xs">
                                                {!! str_strip_limit_words($element->getContent('body')) !!}
                                            </p>
                                        </div>

                                        @if($type->display()->get('time') === true)
                                            <p class="top-left wrapper bg-danger">
                                                <time class="font-bold text-white">
                                                    {{Date::parse($element->getContent('open'))->formatLocalized("%d %b %Y")}}
                                                </time>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @empty
                    <div class="text-center bg-white  padder-v ">
                        <div class=" wrapper-xl">
                            Список пуст
                        </div>
                    </div>
                @endforelse

                {{--
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="?archive"><small ><i class="icon-hourglass m-r-xs"></i>Архив записей</small></a>
                                    </div>
                                </div>
                --}}
                <div class="row padder-v text-center">
                    <div class="col-xs-12">
                        {!! $elements->appends(Request::except('page'))->links() !!}
                    </div>
                </div>


            </div>

        </div>


    </section>




@endsection
