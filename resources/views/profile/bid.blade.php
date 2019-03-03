@extends('layouts.profile')

@section('title','Заявка на права')

@section('accounts')


    <div class="wrapper-md">


        <form class="form-horizontal" action="{{route('profile.bid.store')}}" method="POST"
              enctype="multipart/form-data">


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



            @include('platform::partials.alert')


            <h4>Личные данные</h4>
            <hr>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Полное имя</label>
                <div class="col-sm-9">
                    <input type="text" name="name" required class="form-control form-control-grey"
                           value="{{$user->name}}"
                           placeholder="Ваше полное имя" maxlength="120">
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Электронная почта</label>
                <div class="col-sm-9">
                    <input type="email" name="email" required class="form-control form-control-grey"
                           value="{{$user->email}}"
                           placeholder="Электронная почта" maxlength="120">
                </div>
            </div>


            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Веб-сайт</label>
                <div class="col-sm-9">
                    <input type="url" name="website" class="form-control form-control-grey" value="{{$user->website}}"
                           placeholder="Веб-сайт организации" maxlength="255">
                </div>
            </div>


            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Телефон</label>
                <div class="col-sm-9">
                    <input type="tel" name="phone" class="form-control form-control-grey" required
                           data-mask="+ 9-999-999-99-99"
                           value="{{$user->phone}}"
                           placeholder="Номер телефона">
                    <p class="help-block">На указанные контакты будут поступать уведомления и производиться общение с
                        тех. поддержкой</p>
                </div>
            </div>

            <h4> Данные компании</h4>
            <hr>

            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Название компании</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" maxlength="100" type="text" required
                           name="company_name" value="{{old('company_name')}}"
                           placeholder="Рога и копыта">
                    <p class="help-block">Используйте официальное название</p>
                </div>
            </div>

            <div class="form-group{{ $errors->has('legal_address') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Юридический адрес</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" maxlength="255" type="text" required
                           name="legal_address" value="{{old('legal_address')}}"
                           placeholder="Индекс, Страна, Область, Населенный пункт, улица, дом, корпус, офис">
                </div>
            </div>

            <div class="form-group{{ $errors->has('physical_address') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Физический адрес</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" maxlength="255" type="text" required
                           name="physical_address"
                           value="{{old('physical_address')}}"
                           placeholder="Индекс, Страна, Область, Населенный пункт, улица, дом, корпус, офис">
                </div>
            </div>

            <div class="form-group{{ $errors->has('head') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Руководитель</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" maxlength="150" type="text" required name="head"

                           value="{{old('head')}}"
                           placeholder="Иванов Иван Иванович">
                </div>
            </div>


            <div class="form-group{{ $errors->has('activity') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Вид деятельности</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" maxlength="150" type="text" required
                           name="activity"

                           value="{{old('activity')}}"
                           placeholder="Торговля, развлечение">
                </div>
            </div>

            <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Описание компании</label>
                <div class="col-sm-9">
                <textarea class="form-control form-control-grey no-resize" required rows="6" name="about"
                          placeholder="Чем занимается компания?">{{old('about')}}</textarea>
                </div>
            </div>

            <h4>Счета</h4>
            <hr>


            <div class="form-group{{ $errors->has('accountant') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Бухгалтер</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" maxlength="150" type="text" required name="accountant"
                           placeholder="Иванов Иван Иванович"
                           value="{{old('accountant')}}">
                    <p class="help-block">Требуется для оформления покупок</p>
                </div>
            </div>

            <div class="form-group{{ $errors->has('tin') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">ИНН</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" type="text" required name="tin"
                           placeholder="4848484848"
                           data-mask="9999999999"
                           value="{{old('tin')}}"
                           max="9999999999" minlength="10">
                </div>
            </div>

            <div class="form-group{{ $errors->has('kipp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">КПП</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" type="text" required name="kipp"
                           data-mask="999999999"

                           value="{{old('kipp')}}"
                           placeholder="484848001" max="999999999" minlength="9">
                </div>
            </div>

            <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Наименование банка</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" maxlength="255" type="text" required

                           value="{{old('bank_name')}}"
                           name="bank_name"
                           placeholder="Сбербанк отделение № 12345678">
                </div>
            </div>

            <div class="form-group{{ $errors->has('ogrn') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">ОГРН</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" type="text" required name="ogrn"
                           data-mask="9999999999999"

                           value="{{old('ogrn')}}"
                           placeholder="1111111111154" max="9999999999999" minlength="13">
                </div>
            </div>

            <div class="form-group{{ $errors->has('checking_account') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Расчетный счет</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" type="text" required
                           name="checking_account"
                           data-mask="99999999999999999999"

                           value="{{old('checking_account')}}"
                           placeholder="40740740740740740713" max="99999999999999999999" minlength="20">
                </div>
            </div>

            <div class="form-group{{ $errors->has('corporate_account') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Корпоративный счет</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" type="text" required
                           name="corporate_account"

                           value="{{old('corporate_account')}}"

                           data-mask="99999999999999999999"
                           placeholder="30130130100000000301" max="99999999999999999999" minlength="20">
                </div>
            </div>


            <div class="form-group{{ $errors->has('bic') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">БИК</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" type="text" required
                           name="bic"

                           value="{{old('bic')}}"
                           data-mask="999999999"
                           placeholder="044044444" max="999999999" minlength="9">
                </div>
            </div>

            <div class="form-group{{ $errors->has('okpo') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">ОКПО</label>
                <div class="col-sm-9">
                    <input class="form-control form-control-grey" type="text" required maxlength="10"

                           value="{{old('okpo')}}"
                           name="okpo">
                </div>
            </div>

            <hr>


            {!! csrf_field() !!}
            <div class="form-group">

                <div class="col-sm-8">
                    <p class="small text-muted"> Заявку может оформить только юридическое лицо, которому принадлежит
                        какой либо объект в нашем
                        каталоге (Например: ресторан или гостиница)</p>
                </div>

                <div class="col-sm-4 text-right">
                    <button type="submit" class="btn  btn-danger btn-rounded">Подать заявку</button>
                </div>
            </div>
        </form>


    </div>

@endsection
