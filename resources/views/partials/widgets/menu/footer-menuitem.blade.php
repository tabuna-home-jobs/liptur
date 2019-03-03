@foreach ($menu as $blockmenu)
	<div class="col-xs-12 col-sm-3">
		@foreach ($blockmenu->children as $item)
			@if($item->children->count() > 0)
				<h4 class=" m-b text-white">{{$item->label}}</h4>
				<ul class="list-unstyled m-b-md text-sm">
					@include('partials.widgets.menu.dropdown',[
                        'menu' => $item->children,
                        'class' => ''
                    ])
				</ul>
			@else
				<h4 class=" m-b text-white">
					<a class="{{$item->style}}"
					   href="{{$item->slug}}"
					   title="{{$item->title}}"
					   target="{{$item->target}}"
					   @if ($item->robot != 'follow')
					   rel="{{$item->robot}}"
							@endif
					>{{$item->label}}</a>
				</h4>
			@endif
		@endforeach
	</div>
@endforeach