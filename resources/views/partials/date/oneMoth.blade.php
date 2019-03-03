{{--Азазаз херня--}}
@if(empty($open['errors']))
    <span class="h2 text-darkred">{{$open['day']}} - {{$close['day']}}</span>
    <span class="h3 text-darkred">{{strftime('%b', strtotime(date('Y-m-d H:i:s', mktime($open['hour'], $open['minute'], $open['second'], $open['month'], $open['day'], $open['year']))))}}</span>
@endif
