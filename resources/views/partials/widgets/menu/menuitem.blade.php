@foreach($menu as $item)
	@if($item->children->count() > 0)
	  <li class="menu-item dropdown @if($item->children->count() > 3)with-wz @endif">
		<a  class="dropdown-toggle" data-toggle="dropdown"
            href="{{$item->slug}}" 
			title="{{$item->title}}"
			target="{{$item->target}}"
			@if ($item->robot != 'follow')
                rel="{{$item->robot}}"
            @endif
		role="button" aria-haspopup="true" aria-expanded="false">{{$item->label}}</a>
            <ul class="dropdown-menu">
                @include('partials.widgets.menu.dropdown',[
                        'menu' => $item->children,
                        'class' => 'menu-item dropdown dropdown-submenu'
                        ])
            </ul>
	  </li>
	@else
		<li>
		  <a class="{{$item->style}}" 
			href="{{$item->slug}}"
			title="{{$item->title}}"
			target="{{$item->target}}"
			@if ($item->robot != 'follow')
                rel="{{$item->robot}}"
            @endif
		  >{{$item->label}}</a>
		</li>
	@endif
@endforeach
