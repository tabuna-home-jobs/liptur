@extends('layouts.app-new')



@section('content')


    <section class="container-fluid">
        <div class="row">

            <div style="background:url('https://static.pexels.com/photos/220990/pexels-photo-220990.jpeg') center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row m-t">

                        <div class="container m-t-md top-desc-block">
                            <div class="col-md-6 pull-bottom text-white">
                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">Ремесленники</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <nav class="bg-danger box-shadow-lg">
                <div class="container">
                    @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                        'current' => 'Ремесленники'
                    ])
                </div>
            </nav>


        </div>
    </section>


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
                                    <a href="{{route('craftsmen.catalog',[$user->id,'festivals'])}}" class="btn btn-danger btn-rounded">Подробнее</a>
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
