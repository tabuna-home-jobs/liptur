@extends('dashboard::layouts.dashboard')


@section('title','Заявки')
@section('description','Юридические лица желающие сотрудничать')

@section('content')


    <section class="wrapper">
        <div class="bg-white-only  bg-auto no-border-xs">

            <div class="wrapper">

                @if(count($bids) > 0)
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($bids as $bird)
                            <div class="panel">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#{{$bird->slug}}" aria-expanded="true" aria-controls="{{$bird->slug}}">
                                            {{$bird->content['company_name']}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$bird->slug}}" class="panel-collapse collapse @if($loop->first) in @endif"
                                     role="tabpanel">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>
                                                    <small>Имя Руководителя:</small>
                                                    <b>{{$bird->content['head']}}</b></p>
                                                <p>
                                                    <small>Имя Заявителя:</small>
                                                    <b>{{$bird->content['name']}}</b></p>
                                                <p>
                                                    <small>Вид деятельности:</small>
                                                    <b>{{$bird->content['activity'] ?? ''}}</b></p>

                                                <small>Электронная почта:</small>
                                                <b>{{$bird->content['email']}}</b></p>
                                                <p>
                                                    <small>Номер телефона:</small>
                                                    <b>{{$bird->content['phone']}}</b></p>
                                                <p>
                                                    <small>Веб-сайт:</small>
                                                    <b>{{$bird->content['website'] ?? '-'}}</b></p>
                                                <p>
                                                    <small>Название компании:</small>
                                                    <b>{{$bird->content['company_name']}}</b></p>
                                                <p>
                                                    <small>Юридический адрес:</small>
                                                    <b>{{$bird->content['legal_address']}}</b></p>
                                                <p>
                                                    <small>Физический адрес:</small>
                                                    <b>{{$bird->content['physical_address']}}</b></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>
                                                    <small>Бухгалтер:</small>
                                                    <b>{{$bird->content['accountant']}}</b></p>
                                                <p>
                                                    <small>ИНН:</small>
                                                    <b>{{$bird->content['tin']}}</b></p>
                                                <p>
                                                    <small>КПП:</small>
                                                    <b>{{$bird->content['kipp']}}</b></p>
                                                <p>
                                                    <small>Наименование банка:</small>
                                                    <b>{{$bird->content['phone']}}</b></p>
                                                <p>
                                                    <small>ОГРН:</small>
                                                    <b>{{$bird->content['ogrn']}}</b></p>
                                                <p>
                                                    <small>Расчетный счет:</small>
                                                    <b>{{$bird->content['checking_account']}}</b></p>
                                                <p>
                                                    <small>Корпоративный счет:</small>
                                                    <b>{{$bird->content['corporate_account']}}</b></p>
                                                <p>
                                                    <small>БИК:</small>
                                                    <b>{{$bird->content['bic']  ?? '-' }}</b></p>
                                                <p>
                                                    <small>ОКПО:</small>
                                                    <b>{{$bird->content['okpo']  ?? '-' }}</b></p>
                                            </div>
                                        </div>

                                        <hr>

                                        <p>
                                            <small>О компании:</small>
                                            <br>
                                            {{$bird->content['about']}}</p>
                                        <p>

                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-6 text-right">
                                                <form action="{{route('dashboard.liptur.bids.success',$bird->slug)}}"
                                                      class="inline" method="post">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-default">Одобрить</button>
                                                </form>
                                                <form action="{{route('dashboard.liptur.bids.deny',$bird->slug)}}"
                                                      class="inline" method="post">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-danger">Отклонить</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
            @else
                <div class="jumbotron text-center bg-white not-found">
                    <div>
                        <h3 class="font-thin">Заявок нет</h3>
                    </div>
                </div>
            @endif


        </div>


        <div class="row padder-v text-center">
            {{ $bids->links() }}
        </div>

    </section>


@stop



