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

    @foreach($base['breadcrumbs'] ?? [] as $key => $breadcrumb)
        @if(!empty($breadcrumb['name']))
            <li itemprop="itemListElement" itemscope
                itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{$breadcrumb['route']}}">
                    <span property="name"> {{$breadcrumb['name']}}</span>
                </a>
                <meta property="position" content="{{$key + 4}}">
            </li>
        @endif
    @endforeach


    <li class="active">{{$current}}</li>

</ol>
