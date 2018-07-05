@foreach($menu as $item)
    <li class="menu-item dropdown dropdown-submenu">
        <a class="{{$item->style}}" 
			href="{{$item->slug}}"                  
			title="{{$item->title}}"
			target="{{$item->target}}"
			@if ($item->robot != 'follow')
                rel="{{$item->robot}}"
            @endif
		  >{{$item->label}}</a>
    </li>
@endforeach
