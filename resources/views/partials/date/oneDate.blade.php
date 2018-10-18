{{--Азазаз херня--}}
@if(empty($open['errors']))
    <span class="h4 text-darkred">{{$open['hour']}}
        :@if($open['minute'] > 9){{$open['minute']}}@else{{$open['minute'].'0'}}@endif-{{$close['hour']}}
        :@if($open['minute'] > 9){{$close['minute']}}@else{{$close['minute'].'0'}}@endif
    </span>
    <span class="h3 text-darkred">{{$open['day']}} {{strftime('%b', strtotime(date('Y-m-d H:i:s', mktime($open['hour'], $open['minute'], $open['second'], $open['month'], $open['day'], $open['year']))))}}</span>
@endif

