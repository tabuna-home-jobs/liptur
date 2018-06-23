{{--Азазаз херня--}}
@if(empty($open['errors']))
    <span class="h2 text-white">{{$open['day']}} - {{$close['day']}}</span>
    <span class="h3 text-white">{{strftime('%b', strtotime(date('Y-m-d H:i:s', mktime($open['hour'], $open['minute'], $open['second'], $open['month'], $open['day'], $open['year']))))}}</span>
@endif
