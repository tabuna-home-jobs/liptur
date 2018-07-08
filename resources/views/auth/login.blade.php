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


    <div class="container padder-v auth">

        <div class="row m-t-lg">
            <div class="col-md-4 login">

                <div class="panel wrapper b box-shadow-lg  padder-lg" data-mh="auth">
                    <div class="row">
                        <div class="col-md-12">

                            <div>

                                <div class="v-center">
                                    <img src="/img/other/2.png" class="img-responsive pull-left m-r-sm">
                                    <h2 class="m-t-n m-b-n">
                                        Авторизоваться
                                    </h2>
                                </div>


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


                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label class="i-checks">
                                                <input type="checkbox" name="remember" checked=""><i></i> Запомнить
                                                меня
                                            </label>
                                        </div>
                                    </div>


                                    {!! csrf_field() !!}

                                    <p class="m-t m-b text-center">
                                        <a class="text-center"
                                           href="{{ url('/'.App::getLocale().'/password/reset') }}">Забыли
                                                                                                    пароль?</a>
                                    </p>

                                    <button type="submit" class="btn btn-lg btn-success btn-group-justified">
                                        Войти на сайт
                                    </button>

                                    <h2>
                                        Войти при помощи соц.сетей
                                    </h2>

                                    <div class="m-t-md">
                                        @include('auth.social')
                                    </div>


                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 registation no-padder b-b">

                <div class="padder-lg" data-mh="auth">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="v-center">
                                <img src="/img/other/1.png" class="img-responsive pull-left m-r-sm">
                                <h1 class="m-t-n m-b-n">Зарегистрироваться</h1>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="m-l-xxl m-t-md">
                                <p>
                                    Мы очень рады видеть вас на нашем портале - портале «Липецкая земля» - официальном источнике информации Липецкой области о событиях, местах отдыха и достопримечательностях нашего региона.
                                </p>

                                <p>
                                    Наша цель - сформировать обширную базу о регионе, о местах отдыха, культуре, развлечениях в Липецкой области.
                                </p>

                                <strong>Подпишись и:</strong>

                                <ul>
                                    <li class="v-center m-t m-b-sm"><img src="/img/other/list-1.png" class="img-responsive m-r">читай историю региона;</li>
                                    <li class="v-center m-t m-b-sm"><img src="/img/other/list-2.png" class="img-responsive m-r">общайся с единомышленниками;</li>
                                    <li class="v-center m-t m-b-sm"><img src="/img/other/list-3.png" class="img-responsive m-r">строй свои маршруты;</li>
                                    <li class="v-center m-t m-b-sm"><img src="/img/other/list-4.png" class="img-responsive m-r">получай новости и события обо всех мероприятиях в Липецкой области.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 no-padder b-b">
                <div class="padder-lg" data-mh="auth">
                    <div class="row">
                        <form class="form col-md-12" role="form" method="POST"
                              action="{{ url('/'.App::getLocale().'/register') }}">
                            {{ csrf_field() }}


                            <div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="text-sm text-left">Введите ваш Email (это будет логин)     :</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required=""
                                          class="form-control">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="text-sm text-left">Введите  пароль     :</label>
                                    <input type="password" name="password" value="" required=""
                                           class="form-control">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label class="text-sm text-left">Повторите пароль еще раз     :</label>
                                    <input type="password" name="password_confirmation" value="" required=""
                                           class="form-control">
                                </div>

                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
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
                                            <input type="checkbox" value="1" onclick="document.getElementById('register').disabled=!document.getElementById('register').disabled;" name="remember" required> <i></i>
                                            Я принимаю правила сервиса
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" id="register" disabled class="btn btn-lg btn-success btn-group-justified">
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
