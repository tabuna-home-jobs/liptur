<div class="m-l-xs m-t-xs m-b-xs font-bold">Общая информация</div>

<div class="row">
    @foreach($menu->chunk($chunk) as $value)
        <div class="col-md-3 col-xs-6">
            <ul class="list-unstyled l-h-2x">

                @foreach($value as $item)

                    <li>
                        <a href="{{$item->slug}}"
                           title="{{$item->title}}"
                           target="{{$item->target}}"
                           rel="{{$item->robot}}"
                           class="{{$item->style}} text-ellipsis"

                        >
                            <i class="fa fa-angle-right text-muted m-r-sm"></i> {{$item->label}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>