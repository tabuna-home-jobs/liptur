{!! $filters ?? '' !!}

<table class="table">
    <thead>
    <tr>
        @foreach($fields as $th)
            <th width="{{$th->width}}" class="text-{{$th->align}}">
                <div>
                    @if($th->sort)
                        <a href="?sort={{revert_sort($th->column)}}"
                           class="@if(!is_sort($th->column)) text-muted @endif">
                            {{$th->title}}

                            @if(is_sort($th->column))
                                @if(get_sort($th->column) == 'asc')
                                    <i class="icon-sort-amount-asc"></i>
                                @else
                                    <i class="icon-sort-amount-desc"></i>
                                @endif
                            @endif
                        </a>
                    @else
                        {{$th->title}}
                    @endif

                    @isset($th->filter)
                        @includeIf("platform::partials.filters.{$th->filter}",[
                            'th' => $th
                        ])
                    @endisset
                </div>

                @if($filter = get_filter_string($th->column))
                    <div data-controller="screen--filter">
                        <a href="#"
                           data-action="screen--filter#clearFilter"
                           data-filter="{{$th->column}}"
                           class="badge badge-pill badge-light">
                            {{ $filter }}
                        </a>
                    </div>
                @endif
            </th>
        @endforeach
    </tr>
    </thead>
    <tbody>

    @foreach($data as $key => $datum)
        <tr>
            @foreach($fields as $td)
                <td class="text-{{$td->align}}">

                    @isset($td->render)
                        {!! $td->handler($datum) !!}
                    @else
                        {{ $datum->getContent($td->name) }}
                    @endisset
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>

@if(
(method_exists($data,'total') && optional($data)->total() === 0) ||
(method_exists($data,'count') && optional($data)->count() === 0) ||
(is_array($data) && count($data) === 0)
)

    <div class="text-center bg-white pt-5 pb-5">
        <h3 class="font-thin">
            <i class="icon-table block m-b"></i>
            {{__('Records not found')}}
        </h3>
    </div>

@endif

@if(is_object($data) && ($data instanceof \Illuminate\Contracts\Pagination\Paginator))
    <footer class="wrapper">
        <div class="row">
            <div class="col-sm-5">
                <small class="text-muted inline m-t-sm m-b-sm">
                    {{ __("Displayed records: :from-:to of :total",[
                        'from' => ($data->currentPage()-1)*$data->perPage()+1,
                        'to' => ($data->currentPage()-1)*$data->perPage()+count($data->items()),
                        'total' => $data->total(),
                    ]) }}
                </small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                {!! $data->appends(request()->except(['page','_token']))->links('platform::partials.pagination') !!}
            </div>
        </div>
    </footer>
@endif



