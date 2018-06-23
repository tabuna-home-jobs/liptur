@extends('layouts.about')


@section('listing')
    <div class="panel  panel-default box-shadow-lg">
        <div class="wrapper-md">


            @foreach($docs as $doc)
                <div class="page-header">
                    <p class="h4 l-h-2x ">{{$doc->getContent('name')}}</p>
                </div>

                @foreach($doc->attachment->chunk(2) as $attachments)
                    <div class="row">
                        @foreach($attachments as $attachment)
                            <div class="col-md-6 col-xs-12">
                                <a href="{{$attachment->url()}}" class="block l-h-2x wrapper-md  btn-more font-thin">
                                <span class="btn btn-lg btn-danger btn-rounded btn-sm btn-icon btn-default m-r-sm">
                                <i class="icon-doc fa-2x" aria-hidden="true"></i>
                            </span>
                                    {{$attachment->original_name}}
                                </a>
                            </div>

                        @endforeach
                    </div>
                @endforeach
            @endforeach


        </div>
    </div>
@endsection