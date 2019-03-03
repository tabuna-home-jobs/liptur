@extends('layouts.profile')

@section('title','Сменить пароль')


@section('accounts')

    <div class="wrapper-md">


        <form class="form-horizontal" action="{{route('profile.password.update')}}" method="POST">


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Упс!</strong> Похоже некоторые проблемы с вашими данными.
                    <ul class="wrapper-lg">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            <div class="page-header">
                <h4>Пароль можно изменить в целях безопасности или сбросить, если вы его забыли. </h4>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Новый пароль</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control form-control-grey" placeholder="******">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Повторите пароль</label>
                <div class="col-sm-9">
                    <input type="password" name="password_confirmation" class="form-control  form-control-grey"
                           placeholder="******">
                </div>
            </div>


            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 text-right">
                    <button type="submit" class="btn  btn-danger btn-rounded">Изменить пароль</button>
                </div>
            </div>

        </form>


    </div>

@endsection
