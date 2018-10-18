{{--Азазаз херня--}}
@if(empty($open['errors']))
    <span class="h1 text-darkred">{{$open['day']}}</span>
    <span class="h4 text-darkred">{{strftime('%b', strtotime(date('Y-m-d H:i:s', mktime($open['hour'], $open['minute'], $open['second'], $open['month'], $open['day'], $open['year']))))}}</span>
@endif
