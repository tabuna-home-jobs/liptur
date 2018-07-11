<!-- Modal Support-->
<div class="modal fade slide-up disable-scroll" id="support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="block-header clearfix text-left">
                    Обратная связь
                </div>
                <div class="modal-body">
                    <div class="text-left">
                        <p>
                            Если у вас есть какие-либо вопросы - заполните эту форму, чтобы связаться с нами.<br>
                            Мы оперативно вам ответим.
                        </p>
                    </div>

                    <form action="{{route('contacts.submit')}}" class="m-t" v-on:submit.prevent="send" method="post"
                          enctype="multipart/form-data">

                        {!! csrf_field() !!}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label for="username" class="control-label">{{trans('support.Name')}}</label>
                                    <input type="text" class="form-control" name="name" v-model="name" required maxlength="60">
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="username" class="control-label">{{trans('support.Email')}}</label>
                                    <input type="email" class="form-control" name="email" v-model="email" maxlength="60"
                                           required>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="username" class="control-label">{{trans('support.Phone number')}}</label>
                                    <input type="text" class="form-control" name="phone" required=""
                                           placeholder="{{trans('support.Phone Description')}}" data-mask="+ 9-999-999-99-99">
                                </div>
                                {{--
                                <div class="form-group m-t-xxl m-b-none">
                                  <div class="checkbox">
                                      <label class="i-checks">
                                          <input type="checkbox"  v-model="aggree" name="checkme"><i></i>   Я согласен на обработку <a href="" class="text-sm text-green" data-toggle="modal" data-target="#modalpage-personal-data">персональных данных</a> и ознакомился с <a href="" class="text-sm text-green" data-toggle="modal" data-target="#modalpage-terms-of-service">правилами сервиса</a>
                                      </label>
                                  </div>
                                </div>
                                --}}
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message" class="control-label">{{trans('support.Message')}}</label>
                                    <textarea class="form-control no-resize" name="message" v-model="message" maxlength="500"
                                              required
                                              rows="5"></textarea>
                                </div>
                                <button :disabled="!aggree"
                                        data-loading-text="Отправка <i class='fa fa-spinner fa-spin '></i>"
                                        type="submit"
                                        class="btn btn-success btn-lg btn-block m-t-5 btn-submit">
                                    Отправить сообщение
                                </button>
                            </div>

                        </div>


                    </form>

                </div>
                <a class="top-right wrapper-md" data-dismiss="modal" aria-hidden="true"><i class="close-modal"></i></a>
            </div>
        </div>

    </div>
</div>
<!-- Modal Support-->