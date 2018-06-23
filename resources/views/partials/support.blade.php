<!-- Modal Support-->
<div class="modal fade slide-up disable-scroll" id="support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left m-b-md">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="fa fa-times"></i>
                    </button>
                    <h5>{{-- trans('support.Customer support') --}} Связаться с представителем</h5>

                    <p class="w-xxl center">{{--trans('support.Description')--}}Задавайте любые интерисующие вас вопросы
                        области</p>
                </div>
                <div class="modal-body">


                    <form action="{{route('contacts.submit')}}" v-on:submit.prevent="send" method="post"
                          enctype="multipart/form-data">

                        {!! csrf_field() !!}

                        <div class="form-group has-feedback">
                            <label for="username" class="control-label">{{trans('support.Name')}}</label>
                            <input type="text" class="form-control" name="name" v-model="name" required maxlength="60"
                                   placeholder="{{trans('support.Name Description')}}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="username" class="control-label">{{trans('support.Email')}}</label>
                            <input type="email" class="form-control" name="email" v-model="email" maxlength="60"
                                   required
                                   placeholder="{{trans('support.Email')}}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="username" class="control-label">{{trans('support.Phone number')}}</label>
                            <input type="text" class="form-control" name="phone" required=""
                                   placeholder="{{trans('support.Phone Description')}}" data-mask="+ 9-999-999-99-99">
                            <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                        </div>


                        <div class="form-group  has-feedback">
                            <label for="upload" class="control-label">{{trans('support.Submit file')}}</label>

                            <div class="">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"><i
                                                class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                class="fileinput-filename text-muted">{{trans('support.File Description')}}</span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file"><span
                                                class="fileinput-new"><i class="fa fa-upload"
                                                                         aria-hidden="true"></i></span><span
                                                class="fileinput-exists"><i class="fa fa-folder-open-o"
                                                                            aria-hidden="true"></i></span><input
                                                type="file" name="upload" v-on:change="onFileChange"></span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="message" class="control-label">{{trans('support.Message')}}</label>
                            <textarea class="form-control no-resize" name="message" v-model="message" maxlength="500"
                                      required
                                      rows="5"></textarea>
                        </div>


                        <div class="row">
                            <div class="col-sm-offset-8 col-sm-4 m-t-xs">
                                <button
                                        data-loading-text="Отправка <i class='fa fa-spinner fa-spin '></i>"
                                        type="submit"
                                        class="btn btn-danger btn-rounded btn-block m-t-5 btn-submit">{{trans('support.Send')}}
                                    <i class="m-l-sm fa fa-paper-plane-o"></i></button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- Modal Support-->