        <div class="col-xs-12 col-sm-3">
@foreach ($menu as $item)
    @if (in_array($loop->iteration,[4,5,9])) 
        </div>
        <div class="col-xs-12 col-sm-3">
    @endif
    
    
    @if($item->children->count() > 0)
        <h4 class=" m-b text-white">{{$item->label}}</h4>

        <ul class="list-unstyled m-b-md text-sm">    
            @include('partials.widgets.menu.dropdown',[
                'menu' => $item->children,
                'class' => ''
            ])
        </ul>
    @else
        
    @endif
@endforeach
        </div>
