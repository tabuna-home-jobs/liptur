@extends('layouts.app-new')

@section('header')
<div class="bg-white">
    <section class="container-lg">
        <div class="row">
            <div class="bg-bordo" style="background: url('/img/new/login.png')">
                <div class="container">
                    <h1 class="brand-header">Вход</h1>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="container-lg">
    <div class="row">
        <nav>
            <div class="container">
                @include('partials.breadcrumb',[ 'breadcrumb' => [], 'current' => 'Магазин' ])
            </div>
        </nav>
    </div>
</section>

@endsection

@section('content')


    <div class="container padder-v">

        <div class="row m-t-lg">
            <div class="col-md-4">

                <div class="panel wrapper-xl b box-shadow-lg  padder-lg">
                    <div class="row">
                        <div class="col-md-12">

                            <div data-mh="auth">

                                <p class="h4 font-thin padder-v text-center">Туристско-информационные
                                    центры Липецкой области</p>


                                <form role="form" method="POST" action="{{ url('/'.App::getLocale().'/login') }}">
                                    {{ csrf_field() }}
                                    <div class="m-t-md m-b-md">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  m-t-md">
                                            <label class="text-sm text-left">Введите ваш Email:</label>
                                            <input type="email" name="email" value="{{ old('email') }}" autofocus
                                                   required  class="form-control">

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            </span>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="m-t-md m-b-md">
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}  m-t-md">
                                            <label class="text-sm text-left">Введите ваш Email:</label>
                                            <input type="password" name="password"
                                                   required class="form-control">


                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            </span>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="btn-group btn-group-justified m-b-md m-t-md hidden">
                                        <a href="" class="btn btn-default"><i class="fa fa-vk"></i> Вконтакте</a>
                                        <a href="" class="btn btn-default"><i class="fa fa-facebook-official"></i>
                                            Facebook</a>
                                        <a href="" class="btn btn-default"><i class="fa fa-odnoklassniki"></i>
                                            Однокласники</a>
                                    </div>


                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label class="i-checks">
                                                <input type="checkbox" name="remember" checked=""><i></i> Запомнить
                                                меня
                                            </label>
                                        </div>
                                        <div>
                                            @include('auth.social')
                                        </div>
                                    </div>


                                    {!! csrf_field() !!}


                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <p class="m-t m-b">
                                                <a class="text-muted"
                                                   href="{{ url('/'.App::getLocale().'/password/reset') }}">Забыли
                                                    пароль?</a>
                                            </p>


                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-danger btn-rounded">
                                                Войти на
                                                сайт
                                            </button>
                                        </div>
                                    </div>


                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="padder-lg">
                    <div class="row">
                        <div class="col-md-12">

                            <p>
                                Мы очень рады видень вас на нашем портале - портале «Липецкая земля» - официальном источнике информации Липецкой облати о событиях, местах отдыха и достопримечательностях нашего региона.
                            </p>

                            <p>
                                Наша цель - сформировать ощирную базу о регионе, о местах отдыха, культуре, развлечениях в Липецкой области.
                            </p>

                            Подпишись и:

                            <ul>
                                <li>читай историю региона;</li>
                                <li>общайся с единомышленниками;</li>
                                <li>строй свои маршруты;</li>
                                <li>Пполучай новости и события обо всех мероприятиях в Липецкой области.</li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="padder-lg">
                    <div class="row">
                        <form class="form col-md-12" role="form" method="POST"
                              action="{{ url('/'.App::getLocale().'/register') }}">
                            {{ csrf_field() }}


                            <div data-mh="auth">


                                <div class="form-group  m-t-md {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="text-sm text-left">Введите ваш Email (это будет логин)     :</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required=""
                                          class="form-control">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group  m-t-md {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="text-sm text-left">Введите  пароль     :</label>
                                    <input type="password" name="password" value="" required=""
                                           class="form-control">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group  m-t-md">
                                    <label class="text-sm text-left">Повторите пароль еще раз     :</label>
                                    <input type="password" name="password_confirmation" value="" required=""
                                           class="form-control">
                                </div>

                                <div class="form-group  m-t-md {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="text-sm text-left">Ваше имя (никнейм):</label>
                                    <input type="text" maxlength="200" min="3" name="name" value="{{ old('name') }}"
                                           required="" class="form-control">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label class="i-checks">
                                            <input type="checkbox" name="remember" checked=""><i></i> Я принимаю правила
                                                                                                      сервиса
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-success btn-group-justified">
                                        Зарегистрироваться
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
