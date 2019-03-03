@extends('dashboard::layouts.dashboard')

@section('title', $name)
@section('description',$description)



@section('navbar')
    <div class="col-sm-6 col-xs-12 text-right">
        <div class="btn-group" role="group">
            <a href="{{ route('dashboard.marketing.advertising.create')}}" class="btn btn-link">
                <i class="icon-plus fa fa-2x"></i> Добавить
            </a>
        </div>
    </div>
@stop

@section('content')
    <section class="wrapper">
        <div class="bg-white-only bg-auto no-border-xs">

            @if($ads->count() > 0)
                <div class="panel">

                    <div class="panel-body row">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="w-xs">Управление</th>
                                    <th>Имя</th>
                                    <th>Последнее редактирование</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($ads as $item)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard.marketing.advertising.edit', $item->id) }}">
                                                <i class="icon-menu"></i>
                                            </a>
                                        </td>
                                        <td>{{ $item->slug }}</td>

                                        <td>{{ $item->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            @else

                <div class="jumbotron text-center bg-white not-found">
                    <div>
                        <h3 class="font-thin">
                            Вы ещё не создали ни одного рекламного блока</h3>

                        <a href="{{ route('dashboard.marketing.advertising.create')}}" class="btn btn-link">
                           Создать</a>
                    </div>
                </div>

            @endif

        </div>
    </section>
@stop
