@if (Auth::guest())
  <div class="row m-h-none">
    <div class="bg-yellow b-dashed b-1x wrapper-lg">
      <div class="font-bold text-center text-black text-lg">
        Если вы не авторизованы - <a href="{{url('/'.App::getLocale().'/login')}}" class="text-red">авторизуйтесь</a>
        или заполните поля ниже
      </div>
    </div>
  </div>
  <div class="clearfix m-b-md"></div>
@endif
<div class="row row-flex">

  <div class="col-md-4 flex-column">
    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.email }">
      <label class="text-sm text-left">Введите ваш Email (это будет логин) <span class="text-red">*</span>
        :</label>
      <input v-model="formData.email"
             data-value="{{Auth::check()?Auth::user()->email:null}}"
             type="email" name="email" autofocus
             ref="email"
             required class="form-control"/>
      <span class="help-block" v-if="errors.email">
                  <strong>@{{ errors.email[0]}}</strong>
              </span>
    </div>
    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.password }">
      <label class="text-sm text-left">Введите пароль @if (Auth::guest())<span class="text-red">*</span>@endif:</label>
      <input type="password" name="password" autofocus
             v-model="formData.password"
             @if (!Auth::guest()) disabled @endif
             required class="form-control"/>
      <span class="help-block" v-if="errors.password">
                  <strong>@{{ errors.password[0]}}</strong>
              </span>
    </div>
    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.password_confirmation }">
      <label class="text-sm text-left">Повторите пароль еще раз @if (Auth::guest())<span
                class="text-red">*</span>@endif :</label>
      <input type="password" name="password_confirmation" autofocus
             v-model="formData.password_confirmation"
             @if (!Auth::guest()) disabled @endif
             required class="form-control"/>
      <span class="help-block" v-if="errors.password_confirmation">
                  <strong>@{{ errors.password_confirmation[0]}}</strong>
              </span>
    </div>
  </div>
  <div class="col-md-4 flex-column">
    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.name }">
      <label class="text-sm text-left">Имя <span class="text-red">*</span> :</label>
      <input type="text" name="first_name" autofocus
             data-value="{{strtok(Auth::check()?Auth::user()->name:'', ' ')}}"
             v-model="formData.first_name"
             ref="first_name"
             required class="form-control"/>
      <span class="help-block" v-if="errors.name">
                  <strong>@{{ errors.name[0]}}</strong>
              </span>
    </div>
    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.name }">
      <label class="text-sm text-left">Фамилия:</label>
      <input type="text" name="last_name" autofocus class="form-control"
             v-model="formData.last_name"
             ref="last_name"
             data-value="{{strstr(Auth::check()?Auth::user()->name:'', ' ')}}"
      />
      <span class="help-block" v-if="errors.name">
                  <strong>@{{ errors.name[0]}}</strong>
              </span>
    </div>

    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.phone }">
      <label class="text-sm text-left">Телефон <span class="text-red">*</span> :</label>
      <em class="text-sm text-rigth pull-right">Пример: +7 123 456 7890</em>
      <input type="phone" data-value="{{Auth::check()?Auth::user()->phone:null}}" required name="phone" autofocus
             class="form-control" v-model="formData.phone" ref="phone"/>
      <span class="help-block" v-if="errors.phone">
                  <strong>@{{ errors.phone[0]}}</strong>
              </span>
    </div>

    <div class="form-group m-t-sm m-b-none flex-item-bootom">
      <div class="checkbox">
        <label class="i-checks">
          <input type="checkbox" v-model="aggree" name="checkme"><i></i> Я согласен на обработку <a href=""
                                                                                                    class="text-sm text-green"
                                                                                                    data-toggle="modal"
                                                                                                    data-target="#modalpage-personal-data">персональных
            данных</a> и ознакомился с <a href="" class="text-sm text-green" data-toggle="modal"
                                          data-target="#modalpage-terms-of-service">правилами сервиса</a>
        </label>
      </div>
    </div>
  </div>
  <div class="col-md-4 flex-column">
    <div class="form-group">
      <label class="control-label">Напишите комментарий к заказу:</label>
      <textarea class="form-control form-control-grey no-resize summernote" rows="16"
                name="message" v-model="formData.message"></textarea>
    </div>
    <div class="form-group flex-item-bootom">
      <button :disabled="!aggree" type="submit" class="btn btn-success text-u-c w-full">Далее
      </button>
    </div>
  </div>
</div>