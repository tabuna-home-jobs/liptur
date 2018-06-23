<div class="m-l-xs m-t-xs m-b-xs font-bold">Категории</div>

<div class="row">
    @foreach($types->chunk($chunk) as $type)
        <div class="col-md-3 col-xs-6">
            <ul class="list-unstyled l-h-2x">

                @foreach($type as $item)
                    <li>
                        <a href="{{route('catalog',$item->slug)}}" class="text-ellipsis" title="{{$item->name}}">
                            <i class="fa fa-angle-right text-muted m-r-sm"></i> {{$item->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>