@foreach ($menu as $item)
	<div class="flex-menu-item">
		@if($item->children->count() > 0)
			<li>{{$item->label}}</li>
			<ul class="list-unstyled m-b-md text-sm">
				@include('partials.widgets.menu.dropdown',[
                    'menu' => $item->children,
                    'class' => 'activ'
                ])
			</ul>
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
	</div>
@endforeach