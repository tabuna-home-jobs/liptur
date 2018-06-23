@extends('layouts.app')



@section('content')


    <section class="container-fluid">
        <div class="row">

            <div style="background:url(/storage/2018/04/10/79838560cb17445ee0d2b1029b4fcb9dc7893956_high.jpg) center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt  text-ellipsis">
                    <div class="row m-t">

                        <div class="container m-t-md top-desc-block">
                            <div class="col-md-12 pull-bottom text-white">
                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">Туризм в регионах Центрального Федерального Округа </h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <nav class="bg-danger box-shadow-lg">
                <div class="container">
                    @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                        'current' => 'ЦФО'
                    ])
                </div>
            </nav>


        </div>
    </section>


    <div class="bg-white">

        <section class="container">


            @foreach($users as $user)

                <div class="col-md-4">
                    <div class="panel panel-default  m-t-md m-b-md">
                    <a href="{{route('cfo.catalog',[$user->id,'festivals'])}}">
                        <div class="row v-center">

                            <div class="col-md-12 text-center">
                                <img width="200px" src="{{$user->avatar or '/img/no_avatar.png' }}" alt="{{$user->name}}"
                                     class="m-t-md m-b-lg">
                              <div>
                              </div>
                            </div>

                        </div>
                        <div class="row">
                          <div class="col-md-12">

                                <div class="text-center m-b-sm bg-white" style="font-size: 17px">
                                            {{$user->name}}
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            @endforeach


        </section>
    </div>


    @include('partials.marketing.maps')



@endsection
