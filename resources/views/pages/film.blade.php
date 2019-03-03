@extends('layouts.app-new')

@section('title',$item->getContent('title'))
@section('description',$item->getContent('description'))
@section('keywords',$item->getContent('keywords'))
@section('image',config('app.url').$item->hero('high'))


@section('content')


    <div itemscope itemtype="http://schema.org/Article">
        <input id="buy-widget-key" type="hidden" value="{{env('RAMBLER_BUY_WIDGET_KEY', '')}}">

        <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage"
              itemid="{{ url()->current() }}"/>


        <section class="container-fluid" id="post-header">


            <div class="row">

                <div style="background:url({{$item->hero('high')}}) center center; background-size:cover">
                    <div class="bg-black-opacity bg-dark">


                        <div class="container pos-rlt min-h-h">
                            <div class="pos-rlt top-desc-block ">
                                <div class="row">

                                    @foreach($addition['schedule'] as $timestamp => $block)
                                        <time class=" time text-center w-md wrapper-lg bg-danger">
                                            <span class="h1 text-white">{{\Carbon\Carbon::createFromTimestampUTC($timestamp)->formatLocalized('%d')}}</span>
                                            <span class="h4 text-white">{{\Carbon\Carbon::createFromTimestampUTC($timestamp)->formatLocalized('%B')}}</span>
                                        </time>

                                        @break(true)
                                    @endforeach

                                </div>

                            </div>


                            <div class="row m-t-xxl m-b-md padder-v">

                                <div class="pull-bottom text-white padder-v">
                                    <h1 class="text-white" itemprop="headline">{{$item->getContent('Name')}}</h1>

                                    <small>Для зрителей старше {{$item->getContent('AgeRestriction')}} лет</small>


                                    <div class="lead hidden-xs v-center">
                                        <span class="text-warning-lt">

                                            @for($i = 0; $i < 5; $i++)
                                                @if($i >= $item->getContent('Rating',0))
                                                    <i class="fa text-lg fa-star-o"></i>
                                                @else
                                                    <i class="fa text-lg fa-star"></i>
                                                @endif
                                            @endfor
                                        </span>
                                        <small class="m-l-sm"> Средний рейтинг {{$item->getContent('Rating')}}
                                            звезд(ы)
                                        </small>
                                    </div>


                                </div>

                            </div>
                        </div>


                    </div>
                </div>


                <nav class="bg-danger box-shadow-lg">
                    <div class="container">
                        @include('partials.breadcrumb',[
                            'base' => [
                                'route' => route('catalog',$type->slug),
                                'name' => $type->name,
                            ],
                            'breadcrumb' => $item->breadcrumb(),
                            'current' => $item->getContent('Name')
                        ])
                    </div>
                </nav>


            </div>
        </section>


        <section id="post-{{$item->id}}">

            <div class="container">

                <div class="m-t-md m-b-md">

                    <div class="row">
                        <div class="col-md-8 bg-white no-padder box-shadow-lg">
                            <div class="wrapper-lg">
                                <div class="col-lg-3 wrapper">
                                    <img class="w-full" itemprop="contentUrl"
                                         src="{{$item->attachment('image')->get()[1]->url('standart')}}"
                                         alt="{{$item->getContent('Name')}}" style="max-height: 600px;">
                                </div>
                                <div class="col-lg-9">
                                    <div class="page-header">
                                        <h2>{{ $item->getContent('Name') }}
                                            <br>
                                            <small>{{$item->getContent('OriginalName')}}
                                                - {{$item->getContent('Year')}}</small>
                                        </h2>
                                    </div>

                                    <ul class="list-group list-no-border">
                                        @if($item->getContent('Duration'))
                                            <li class="list-group-item">
                                                <strong>Длительность: </strong>
                                                <span class="pull-right">
                {{$item->getContent('Duration')}}
            </span>
                                            </li>
                                        @endif
                                        <li class="list-group-item">
                                            <strong>Режиссер: </strong>
                                            <span class="pull-right">
                {{$item->getContent('Director')}}
            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Производство: </strong>
                                            <span class="pull-right">
                {{$item->getContent('Country')}}
            </span>
                                        </li>
                                        @if($item->getContent('Cast'))
                                            <li class="list-group-item">
                                                <strong>Актеры: </strong>
                                                <div>
                                                    {{$item->getContent('Cast')}}
                                                </div>
                                            </li>
                                        @endif
                                    </ul>

                                </div>
                            </div>


                            <div class="wrapper-lg">
                                <main>
                                    <p class="text-justify">{!! $item->getContent('Description') !!}</p>
                                </main>


                                @if(!empty($addition['schedule']))
                                    <p class="h4 font-thin padder-v">
                                        Расписание сеансов и покупка билетов
                                    </p>


                                    <ul class="nav nav-tabs nav-justified nav-tabs-justified" role="tablist">

                                        @foreach($addition['schedule'] as $timestamp => $block)
                                            @if($loop->iteration < 6)
                                                <li role="presentation" @if($loop->first) class="active" @endif>
                                                    <a href="#date-{{$timestamp}}" aria-controls="home" role="tab"
                                                       data-toggle="tab">
                                                        <div class="font-bold">
                                                            {{ date_block($timestamp)['day'] }}
                                                        </div>
                                                        <small class="text-muted">
                                                            {{ date_block($timestamp)['weekDay'] }}
                                                        </small>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>



                                    <div class="tab-content">
                                        @foreach($addition['schedule'] as $timestamp => $block)


                                            <div role="tabpanel" class="tab-pane  @if($loop->first) active @endif"
                                                 id="date-{{$timestamp}}">
                                                @foreach($block['block'] as $objectId => $schedule)
                                                    <div class="row wrapper v-center @if(!$loop->last) b-b @endif">
                                                        <div class="col-lg-5 padder-v">
                                                            <div class="font-bold">
                                                                {{$addition['theaters'][$objectId]->Name}}
                                                            </div>
                                                            <div class="text-sm text-muted">
                                                                {{$addition['theaters'][$objectId]->Address}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 padder-v">
                                                            @foreach($schedule as $sheduleItem)
                                                                <button type="button"
                                                                        class="btn btn-sm btn-danger btn-rounded m-l-sm m-b-sm time-block"
                                                                        data-container="body" data-toggle="popover"
                                                                        data-placement="top"
                                                                        data-content="<p class='text-center'>
                                                            {{$sheduleItem->HallName}} / {{ empty($sheduleItem->Format) ? '2D' :$sheduleItem->Format}}</p>"
                                                                        data-session-id="{{$sheduleItem->SessionID}}"
                                                                >
                                                                    {{ date_time_block($sheduleItem->DateTime) }}
                                                                </button>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>


                            <div class="wrapper-md b-t">

                                <div class="row">


                                    <div class="col-md-6">

                                        <p class="font-thin  m-t-sm">
                                            <time datetime="{{ $item->created_at->toRfc3339String() }}">
                                                <i class="fa fa-clock-o text-muted"></i>
                                                Опубликовано {{$item->created_at->diffForHumans()}}

                                                <meta itemprop="dateModified"
                                                      content="{{ $item->updated_at->toRfc3339String() }}"/>
                                                <meta itemprop="datePublished"
                                                      content="{{ $item->created_at->toRfc3339String() }}"/>
                                            </time>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-right" role="group"
                                         aria-label="Social Links">

                                        @include('partials.marketing.socialShare')

                                    </div>
                                </div>
                            </div>
                        </div>


                        <aside class="col-md-4 hidden-xs hidden-sm">


                            <div class="aside-affix">
                                <div class="panel b box-shadow-lg" data-mh="main-info-block"
                                     style="width: 100%; display: flex; align-items: center; justify-content: center; max-height: 500px; background: rgb(198, 198, 198);">

                                    @widget('advertising','side')

                                </div>

                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
<script type="text/javascript" src="https://kassa.rambler.ru/s/widget/js/TicketManager.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        $('.time-block[data-session-id]').click(function () {

            var sessionId = $(this).data('session-id');

            if (ticketManager) {
                var widgetKey = $('#buy-widget-key').val();

                if (widgetKey != '') {
                    ticketManager.session(widgetKey, sessionId);
                }
            }
        });
    });
</script>

@endpush