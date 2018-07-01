<ul class="nav navbar-nav nav-bar-sub font-bold text-u-c">
    @foreach($menu as $item)
        <li>
            <a href="{{$item->slug}}"
               title="{{$item->title}}"
               target="{{$item->target}}"
               rel="{{$item->robot}}"
               class="{{$item->style}} text-green"
            >{{$item->label}}
            </a>
        </li>
    @endforeach
</ul>