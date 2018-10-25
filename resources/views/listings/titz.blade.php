@extends('layouts.app-new')


@section('header')
    <div id="post-header" class="catalog-item">
        <div style="background:url(/img/tour/background/tits.png) center center; background-size:cover">
            <div class="bg-black-opacity bg-dark">
                <div class="container pos-rlt min-h-h">

                    <div class="row m-t-xxl m-b-md padder-v">
                        <div class="pull-bottom text-white padder-v m-l-xl">
                            <h1 class="text-white brand-header" itemprop="headline">ТИЦ</h1>
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
                            'current' => 'ТИЦы'
                        ])
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection



@section('content')


    <div class="bg-white">

        <section class="container">


            @foreach($users as $user)

                <div class="col-md-12">
                    <div class="panel panel-default  m-t-md m-b-md">
                        <div class="row v-center">

                            <div class="col-md-4">
                                <img src="{{$user->avatar or '/img/no_avatar.png' }}" alt="{{$user->name}}"
                                     class="img-responsive center">
                            </div>

                            <div class="col-md-6">

                                <div class="padder">

                                    <div class="page-header m-b-xs">
                                        <h3 class="h3 l-h-1x">
                                            {{$user->name}}
                                        </h3>
                                    </div>

                                    <p class="m-b-md text-justify hidden-xs">
                                        {!! nl2br( htmlspecialchars($user->about)) !!}
                                    </p>

                                </div>
                            </div>

                            <div class="col-md-2">

                                <div class="padder">
                                    <a href="{{route('titz.catalog',[$user->id,'festivals'])}}" class="btn btn-success">Подробнее</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach


        </section>
    </div>


    @include('partials.marketing.maps')



@endsection
