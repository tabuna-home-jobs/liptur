@extends('layouts.profile')

@section('title','Мой профиль')

@section('accounts')


    <div class="wrapper-md">


        @include('platform::partials.alert')

        <form class="form-horizontal" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">


            <div class="row">
                <div class="col-sm-9">
                    <div class="fileinput fileinput-exists thumb-lg pull-left m-r-md" data-provides="fileinput">

                        <div class="btn-file">
                            <div class="user-avatar fileinput-preview  thumb-lg pull-left m-r-md">
                                <img src="{{$user->avatar ?? '/img/no_avatar.png' }}"
                                     alt="Нажмите, что бы изменить изображение"
                                     class="img-circle">
                            </div>

                            <input type="file" name="avatar" size="2MB" accept="image/jpeg,image/png,image/gif">
                        </div>

                    </div>


                    <div class="clear m-b">
                        <div class="m-b m-t-xxl">
                            <span class="h3 text-black">{{$user->name}}</span>
                        </div>
                    </div>
                </div>
            </div>


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
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


            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Полное имя</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control form-control-grey" value="{{$user->name}}"
                           placeholder="Ваше полное имя" maxlength="120">
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Электронная почта</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control form-control-grey" value="{{$user->email}}"
                           placeholder="Электронная почта" maxlength="120">
                </div>
            </div>


            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Веб-сайт</label>
                <div class="col-sm-9">
                    <input type="url" name="website" class="form-control form-control-grey" value="{{$user->website}}"
                           placeholder="Личный веб-сайт" maxlength="255">
                </div>
            </div>


            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Телефон</label>
                <div class="col-sm-9">
                    <input type="tel" name="phone" class="form-control form-control-grey" data-mask="+ 9-999-999-99-99"
                           value="{{$user->phone}}"
                           placeholder="Номер телефона">
                </div>
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Адрес</label>
                <div class="col-sm-9">
                    <input type="text" name="address" class="form-control form-control-grey"
                           value="{{$user->address}}"
                           placeholder="Где вы находитесь">
                </div>
            </div>


            <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">О себе</label>
                <div class="col-sm-9">
                    <textarea class="form-control form-control-grey no-resize" rows="6" name="about"
                              placeholder="Небольшой рассказ о себе">{{$user->about}}</textarea>
                </div>
            </div>


            <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                <div class="col-sm-offset-3 col-sm-9">
                    <label class="i-checks i-checks-sm">
                        <input type="radio" name="sex" value="1" @if($user->sex) checked @endif>
                        <i></i>
                        Мужчина
                    </label>

                    <label class="i-checks i-checks-sm">
                        <input type="radio" name="sex" value="0" @if(!$user->sex) checked @endif>
                        <i></i>
                        Женщина
                    </label>

                </div>
            </div>


            <div class="form-group{{ $errors->has('notification') ? ' has-error' : '' }}">
                <div class="col-sm-offset-3 col-sm-9">
                    <label class="i-checks i-checks-sm">
                        <input type="radio" name="notification" value="1" @if($user->notification) checked @endif>
                        <i></i>
                        Подписаться на уведомления
                    </label>

                    <label class="i-checks i-checks-sm">
                        <input type="radio" name="notification" value="0" @if(!$user->notification) checked @endif>
                        <i></i>
                        Не присылать уведомления
                    </label>

                </div>
            </div>


            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 text-right">
                    <button type="submit" class="btn  btn-success btn-rounded">Сохранить</button>
                </div>
            </div>
        </form>


    </div>

@endsection
