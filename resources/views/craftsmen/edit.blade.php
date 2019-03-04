@extends('layouts.profile')

@section('title','Заявка на права')

@section('accounts')


    {{--dd($user->titz)--}}

    <div class="wrapper-md">


        <form class="form-horizontal" action="{{route('craftsmen.update')}}" method="POST"
              enctype="multipart/form-data">


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Упс!</strong> Проверьте вводимые данные.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @include('platform::partials.alert')


            <h4>Общие данные</h4>
            <hr>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Изображение</label>
                <div class="col-sm-9">
                    <div class="fileinput fileinput-exists thumb-lg pull-left m-r-md" data-provides="fileinput">

                        <div class="btn-file">
                            <div class="fileinput-preview  pull-left m-r-md">
                                <img src="{{$user->avatar ?? '/img/no_avatar.png' }}"
                                     alt="Нажмите, что бы изменить изображение"
                                     class="img-circle">
                            </div>

                            <input type="file" name="avatar" size="2MB" accept="image/jpeg,image/png,image/gif">
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Электронная почта</label>
                <div class="col-sm-9">
                    <input type="email" name="email" required class="form-control form-control-grey"
                           value="{{$user->titz['email']}}"
                           placeholder="Электронная почта" maxlength="120">
                </div>
            </div>
            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Веб-сайт</label>
                <div class="col-sm-9">
                    <input type="url" name="website" class="form-control form-control-grey" value="{{$user->titz['website']}}"
                           placeholder="Веб-сайт организации" maxlength="255">
                </div>
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Телефон</label>
                <div class="col-sm-9">
                    <input type="tel" name="phone" class="form-control form-control-grey" required
                           data-mask="+ 9-999-999-99-99"
                           value="{{$user->titz['phone']}}"
                           placeholder="Номер телефона">
                    <p class="help-block">На указанные контакты будут поступать уведомления и производиться общение с
                        тех. поддержкой</p>
                </div>
            </div>


            @foreach(config('press.locales') as $key => $value)
                <h4> Сведения для туриста
                    <small class="text-danger font-thin pull-right">"{{$value['name']}}"</small>
                </h4>
                <hr>
                <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Название</label>
                    <div class="col-sm-9">
                        <input class="form-control form-control-grey" maxlength="100" type="text" required
                               name="titz[{{$key}}][name]" value="{{$user->titz['titz'][$key]['name']}}"
                               placeholder="">
                        <p class="help-block">Используйте официальное название</p>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('physical_address') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Адрес</label>
                    <div class="col-sm-9">
                        <input class="form-control form-control-grey" maxlength="255" type="text" required
                               name="titz[{{$key}}][address]"
                               value="{{$user->titz['titz'][$key]['address']}}">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('head') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Руководитель</label>
                    <div class="col-sm-9">
                        <input class="form-control form-control-grey" maxlength="150" type="text" required
                               name="titz[{{$key}}][head]"
                               value="{{$user->titz['titz'][$key]['head']}}">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('legal_address') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Описание</label>
                    <div class="col-sm-9">
                        <textarea class="form-control form-control-grey no-resize" rows="8"
                                  name="titz[{{$key}}][description]" required>{{$user->titz['titz'][$key]['description']}}</textarea>
                        <p class="help-block">Чем ваш ТИЦ может заинтересовать гостей</p>
                    </div>
                </div>
            @endforeach

            {{method_field('PUT')}}
            {!! csrf_field() !!}
            <div class="form-group">

                <div class="col-sm-4 col-sm-offset-8 text-right">
                    <button type="submit" class="btn  btn-danger btn-rounded">Изменить</button>
                </div>
            </div>
        </form>


    </div>

@endsection
