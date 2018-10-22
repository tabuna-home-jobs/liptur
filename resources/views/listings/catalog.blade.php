@extends('layouts.app-new')


@section('title',$type->display()->get('title',$name))
@section('description',$type->display()->get('description',$name))
@section('keywords',$type->display()->get('description',$name))


@section('header')
    <div id="post-header" class="catalog-item">
        <div style="background:url({{$type->image}}) center center; background-size:cover">
            <div class="bg-black-opacity bg-dark">
                <div class="container pos-rlt min-h-h">

                    <div class="row m-t-xxl m-b-md padder-v">
                        <div class="pull-bottom text-white padder-v m-l-xl">
                            <h1 class="text-white brand-header" itemprop="headline">{{$name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="container-lg">
            <div class="row">
                <nav>
                    <div class="container">
                        @include('partials.breadcrumb',[
                            'breadcrumb' => [],
                            'current' => $name
                        ])
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection


@section('content')


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
                                        @if($type->display()->get('time') === true)
                                        <div class="news-date">
                                            {{Date::parse($element->getContent('open'))->formatLocalized("%d %b %Y")}}
                                        </div>
                                        @endif
                                        <a href="{{route($type->route(),[$element->type,$element->slug])}}"><img
                                                    src="{{$element->hero('medium') ?? '/img/no-image.jpg'}}"
                                                    alt="{{$element->getContent('name')}}"
                                                    class="img-full img-post "></a>
                                    </div>
                                    <div class="wrapper-md">
                                        <div class="clear" data-mh="main-news-body">
                                            <a class="h4" href="{{route($type->route(),[$element->type,$element->slug])}}">{{$element->getContent('name')}}</a>
                                            <p class="text-xs">
                                                {!! str_strip_limit_words($element->getContent('body')) !!}
                                            </p>
                                        </div>
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
