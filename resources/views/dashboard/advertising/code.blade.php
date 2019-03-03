<div class="row-row">
    <div class="tab-content">

        @foreach($locales as $code => $lang)

            <div class="wrapper-md">


                    <div class="row">

                        <div class="form-group">
                            <div class="col-sm-10">
                                Статус - {{$lang['native']}}
                                <label class="i-switch bg-info m-t-xs m-r">
                                    <input type="checkbox" name="options[locale][{{$code}}]"
                                           {{$adv->checkLanguage($code)  ? 'checked' : ''}} value="true">
                                    <i></i>
                                </label>


                            </div>
                        </div>


                        <div class="col-md-12">
                            <textarea  class="form-control" id="hidden-code-{{$code}}" name="content[{{$code}}][code]" rows="10">
                                {{$adv->getContent('code',$code)}}
                            </textarea>
                        </div>
                    </div>


                </div>

        @endforeach


    </div>

</div>








