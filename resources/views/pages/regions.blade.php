@extends('layouts.about')


@section('listing')


    @foreach($contacts as $item)
        <div class="row">
            <article class="col-md-12">
                <div class="panel panel-default box-shadow-lg">

                    <div class="wrapper-md">

                        <div class="row v-h-center padder-v b-b">
                            <div class="col-md-2">
                                <img
                                        src="{{$item->hero('medium') ?? '/img/no-image.jpg' }}"
                                        class="img-full img-responsive" alt="" style="height: 100px">
                            </div>
                            <div class="col-md-10">
                                <p class="h4 font-thin"><span class="text-danger">{{$item->getContent('name')}}</span>
                                </p>
                                <address> {{$item->getContent('place')['name'] or ''}} </address>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="padder-v">
                                    {!!  $item->getContent('body') !!}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </article>

        </div>


    @endforeach


@endsection