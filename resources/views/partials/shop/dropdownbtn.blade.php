<button class="btn btn-default dropdown-toggle" type="button" id="dropdown{{$id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    {{$select[$default]}}
    <span class="caret"></span>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdown{{$id}}">
    @foreach ($select as $key=>$sort)
        <li><a href="{{$items->appends([$name => $key])->url(1)}}">{{$sort}}</a></li>
    @endforeach
</ul>
@php $items->appends([$name => $default]) @endphp