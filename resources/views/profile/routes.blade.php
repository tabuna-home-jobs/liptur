@extends('layouts.profile')
@section('title','Список ваших маршрутов')
@section('accounts')

<div class="wrapper-md maps-style">
    <h2>Список ваших маршрутов</h2>
    <div class="list-group">
        @foreach ($results as $item)
            <a href="{!! route('profile.route', $item) !!}" class="list-group-item"> Маршрут {{$loop->iteration}}</a>
        @endforeach
    </div>
</div>

@endsection
