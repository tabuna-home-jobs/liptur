<ol class="breadcrumb b-b" itemscope itemtype="http://schema.org/BreadcrumbList">

    <li itemprop="itemListElement" itemscope
        itemtype="http://schema.org/ListItem">
        <a href="/" itemprop="item">
            <i class="fa fa-home"></i>
            <span property="name"> Главная</span>
        </a>
        <meta property="position" content="1">
    </li>

    @if(isset($base))
        <li itemprop="itemListElement" itemscope
            itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="{{$base['route']}}">
                <span property="name"> {{$base['name']}}</span>
            </a>
            <meta property="position" content="2">
        </li>
    @endif

    @foreach($breadcrumb as $route => $name)
        <li itemprop="itemListElement" itemscope
            itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="{{route('catalog',$route)}}">
                <span property="name"> {{$name}}</span>
            </a>
            <meta property="position" content="{{ array_search($route,array_keys($breadcrumb))}}">
        </li>
    @endforeach
    <li class="active">{{$current}}</li>

</ol>
