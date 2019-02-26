@extends('layouts.app-new')


@section('title',$type->display()->get('title',$name))
@section('description',$type->display()->get('description',$name))
@section('keywords',$type->display()->get('description',$name))


@section('header')
    @include('partials.header.headerList',[
                'image'  => $type->image,
                'title' => $type->display()->get('title',$name),
                'breadcrumb' =>[
                    'breadcrumb' => [],
                    'current' => $type->display()->get('title',$name)
                ]
            ])
@endsection


@section('content')


    <section class="bg-white b-t box-shadow-lg">
        <div class="container padder-v">

            <div class="col-md-12">


                @forelse($elements->chunk(3) as $elementChunk)

                    <div class="row padder-v">
                        @foreach($elementChunk as $element)
                            @if ($element!=null)
                            <article class="col-md-4">
                                <div class="panel panel-default box-shadow-lg pos-rlt" data-mh="main-news">
                                    <div data-mh="main-news-img">
                                        @if($type->display()->get('time') === true)
                                        <div class="news-date">
                                            {{Date::parse($element->getContent('open'))->formatLocalized("%d %b %Y")}}
                                        </div>
                                        @endif
                                        <a href="{{$element->route}}"><img
                                                    src="{{$element->hero('medium') ?? '/img/no-image.jpg'}}"
                                                    alt="{{$element->getContent('name')}}"
                                                    class="img-full img-post "></a>
                                    </div>
                                    <div class="wrapper-md">
                                        <div class="clear" data-mh="main-news-body">
                                            <a class="h4" href="{{$element->route}}">{{$element->getContent('name')}}</a>
                                            <p class="text-xs">
                                                {!! str_strip_limit_words($element->getContent('body')) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endif
                        @endforeach
                    </div>
                @empty
                    <div class="text-center bg-white  padder-v ">
                        <div class=" wrapper-xl">
                            {{__('List is empty')}}
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
