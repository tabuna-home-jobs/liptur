<button class="btn btn-default dropdown-toggle" type="button" id="dropdown{{$id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    {{$categoriesMaster[$curentMasterCategory-1]->content}}
    <span class="caret"></span>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdown{{$id}}">
    @foreach ($categoriesMaster as $category)
        <li><a href="{{route('shop.masters',$category->id)}}" class="text-md font-bold @if(($category->id === $curentMasterCategory) && (!isset($newsAndSpec))) text-green @else  text-black @endif">
                {{$category->content}}
              </a></li>
    @endforeach
</ul>
@php $items->appends([$name => $default]) @endphp