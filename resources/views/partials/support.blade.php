<!-- Modal Support-->
<div class="modal fade slide-up disable-scroll" id="support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="fa fa-times"></i>
                    </button>

                    <div class="text-left">
                    <h5>Обратная связь</h5>

                    <p class="w-xxl">Если у вас есть какие-либо вопросы - заполните эту форму, чтобы связаться с нами.
                                            Мы оперативно вам ответим.</p>
                    </div>

                </div>
                <div class="modal-body">


                    <form action="{{route('contacts.submit')}}" v-on:submit.prevent="send" method="post"
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

                                <button
                                        data-loading-text="Отправка <i class='fa fa-spinner fa-spin '></i>"
                                        type="submit"
                                        class="btn btn-success btn-lg btn-block m-t-5 btn-submit">
                                    Отправить сообщение
                                </button>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message" class="control-label">{{trans('support.Message')}}</label>
                                    <textarea class="form-control no-resize" name="message" v-model="message" maxlength="500"
                                              required
                                              rows="5"></textarea>
                                </div>
                            </div>

                        </div>


                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- Modal Support-->