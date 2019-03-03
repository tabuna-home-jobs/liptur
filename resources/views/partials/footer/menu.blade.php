<div class="wrapper b-t bg-gray hidden-xs vi-hide">
    <div class="container">
        <div class="row">
            @foreach($menu->chunk($chunk) as $value)
                <div class="col-xs-12 col-sm-3">


                    @foreach($value as $item)
                        <h4 class="text-u-c m-b font-thin text-uppercase">{{$item->label}}</h4>

                        <ul class="list-unstyled m-b-md text-sm">
                            @foreach($item->children as $child)

                                <li><a href="{{$child->slug}}"
                                       rel="{{$item->robot}}"
                                       class="{{$item->style}}"
                                       title="{{$child->title}}"
                                       target="{{$child->target}}">
                                        <i class="fa fa-angle-right text-muted m-r-sm"></i>
                                        {{$child->label}}</a></li>
                            @endforeach
                        </ul>

                    @endforeach

                </div>
            @endforeach
        </div>
    </div>
</div>