@extends('layouts.app-new')

@section('header')
    @include('partials.header.headerList',[
            'image'  => '/img/tour/background/contact.jpg',
            'title' => __('Contacts'),
            'breadcrumb' =>[
                'breadcrumb' => [],
                'current' => __('Contacts')
            ]
        ])
@endsection


@section('content')

    <div class="box-shadow-lg">
        <section class="container">
            <div class="row wrapper-md  m-t-md m-b-xs">
                <div id="helpletter" class="col-md-6 hidden-xs hidden-sm">
                    <p class="h3 font-thin m-b-md">{{__('Do you need a help?')}}</p>


                    <p class="semi-bold no-margin">{{__('Fill this blank to contact us, if you have some questions.')}}</p>

                    <form role="form" id="helpletter-form" class="m-t-md" v-on:submit.prevent="send">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label class="small">{{__('Your name')}}</label>
                                    <input type="text" required class="form-control" placeholder="Иван"
                                           v-model="formData.firstName">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group  form-group-default">
                                    <label class="small">{{__('Your family name')}}</label>
                                    <input type="text" required class="form-control" placeholder="Иванов"
                                           v-model="formData.lastName">
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-xs">
                            <div class="col-sm-6">
                                <div class="form-group  form-group-default">
                                    <label for="email" class="small">{{__('Your email')}}</label>
                                    <input type="email" class="form-control" name="email" required
                                           placeholder="ivanov@ivan.com" v-model="formData.email">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label for="phone" class="small">{{__('Phone number')}}</label>
                                    <input type="text" data-maSsk="+ 9-999-999-99-99" class="form-control" name="phone"
                                           required placeholder="+79455545454" v-model="formData.phone">
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-group-default  m-t-xs">
                            <label class="small">{{__('Your message')}}</label>
                            <textarea placeholder="Введите сообщение, которое вы хотите отправить" required rows="5"
                                      class="form-control  no-resize" v-model="formData.message"></textarea>
                        </div>

                        {{--
                        <div class="m-t-md clearfix">
                            <vue-recaptcha ref="recaptcha"
                            @verify="onVerify"
                            @expired="onExpired"
                            data-sitekey="{{config('services.google.recaptcha.sitekey')}}">
                            </vue-recaptcha>
                        </div>
                        <div v-if="errors['g-recaptcha-response']" class="alert alert-warning">
                            <strong>Докажите, что вы не робот.</strong>
                        </div>
                        --}}
                        <div class="m-t-md clearfix">
                            <p class="pull-left small m-t-xs">{{__('I`ll agree to processing of personal data')}}</p>
                            <button form="helpletter-form" type="submit" class="btn btn-success btn-rounded pull-right">
                                {{__('Send')}}
                            </button>
                        </div>


                        <div class="clearfix"></div>
                    </form>

                </div>
                <div class="col-md-6 col-xs-12 col-sm-12">

                    <p class="h3 font-thin m-b-md">{{__('Contacts for communication')}}</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="block-title font-bold hint-text m-b-0">{!! __('Regional state institution &quot;Center for cluster development of tourism in the Lipetsk region&quot;.')!!} </h5>
                            <address class="m-t-10">
                                {{__('398059 Lipetsk, Frunze street,10')}}

                            </address>


                            <p class=""><span class="font-bold">{{__('Phone number')}}:</span>
                                <span class="font-thin"><a href="tel:+74742220360">+7(4742) 22-03-60</a></span>
                                <span class="font-thin block text"><a href="tel:88001003048">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8-800-100-30-48</a></span>
                            </p>
                            <p class=""><span class="font-bold">{{__('Fax')}}:</span>
                                <span class="font-thin"><a href="tel:+74742220358">+7(4742) 22-03-58</a></span></p>
                            <p class=""><span class="font-bold">{{__('Email')}}</span>
                                <span class="font-thin"><a href="mailto:{{setting('contact_email')}}">{{setting('contact_email')}}</a></span>
                            </p>

                        </div>
                        <div class="col-sm-6">
                            <h5 class="block-title font-bold hint-text m-b-0">{!! __('Regional autonomous institution &quot;Regional Center of Event Tourism&quot;.')!!}</h5>
                            <br>
                            <address class="m-t-10">
                                {{__('398024 Lipetsk, Prospekt pobedi, 67a')}}
                            </address>
                            <br>


                            <p class=""><span class="font-bold">{{__('Phone number')}}:</span>
                                <span class="font-thin"><a href="tel:+74742478292">+7(4742) 47-82-92</a></span>
                                <span class="font-thin block text"><a href="tel:88001003048">8-800-200-81-20</a></span>
                            </p>

                        </div>
                    </div>


                    <div class="row">
                        <hr>
                        <div class="col-sm-6">
                            <h5 class="block-title font-bold hint-text m-b-0">{{__('Head of the Department of Culture and Tourism of the Lipetsk Region')}}</h5>

                            <p{{__('Volkov Vadim Gennadievich')}}></p>

                            <p class=""><span class="font-bold">{{__('Phone number')}}:</span>
                                <span class="font-thin"><a href="tel:+74742724618">+7(4742) 72-46-18</a></span></p>
                        </div>


                        <div class="col-sm-6">
                            <h5 class="block-title font-bold hint-text m-b-0">{{__('Deputy chief - Head of the Department for Tourism Development')}}</h5>

                            <p>{{__('Timokhin Andrey Nikolaevich')}}</p>

                            <p class=""><span class="font-bold">{{__('Phone number')}}:</span>
                                <span class="font-thin"><a href="tel:+74742724618">+7(4742) 27-24-57</a></span></p>
                        </div>

                        @if (App::isLocale('ru'))
                        <div class="col-sm-6">
                            <h5 class="block-title font-bold hint-text m-b-0">Начальник отдела по развитию туризма</h5>

                            <p>Стрельникова Светлана Валерьевна</p>


                            <p class=""><span class="font-bold">{{__('Phone number')}}:</span>
                                <span class="font-thin"><a href="tel:+74742272360">+7(4742) 27-23-60</a></span></p>
                        </div>
                        @endif


                    </div>

                </div>
            </div>
        </section>
    </div>

    <div id="map-contact" class="maps">
    </div>

@endsection



{{--
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_9M5O7t88YovZa2mePQ9VX4f79c86cqg"
type="text/javascript"></script>
@endpush
--}}