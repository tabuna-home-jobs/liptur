<div class="row wrapper-md">
    <div class="col-md-12">
        <div class="row">

            @foreach($types->chunk($chunk) as $type)
                <div class="col-md-4">
                    <div class="list-group list-group-lg m-b-none list-icon-service list-no-border">

                        @foreach($type as $item)

                            <a href="{{route('catalog',$item->slug)}}" class="list-group-item">
                                <span class="pull-right text-muted hidden-xs m-t-sm"> {{$item->count}}</span>
                                <span class="v-center"><i
                                            class="fa-2x {{$item->icon}} m-r-md"></i>{{$item->name}}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>