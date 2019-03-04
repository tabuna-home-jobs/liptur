@extends('layouts.profile')

@section('title','Заявка на права')

@section('accounts')


    {{--dd($user->cfo)--}}

    <div class="wrapper-md">


        <form class="form-horizontal" action="{{route('cfo.update')}}" method="POST"
              enctype="multipart/form-data">


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Упс!</strong> Проверьте вводимые данные.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @include('platform::partials.alert')


            <h4>Общие данные</h4>
            <hr>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Изображение</label>
                <div class="col-sm-9">
                    <div class="fileinput fileinput-exists thumb-lg pull-left m-r-md" data-provides="fileinput">

                        <div class="btn-file">
                            <div class="fileinput-preview  pull-left m-r-md">
                                <img src="{{$user->cfo['avatar'] ?? '/img/no_avatar.png' }}"
                                     alt="Нажмите, что бы изменить изображение"
                                     class="img-circle">
                            </div>

                            <input type="file" name="avatar" size="2MB" accept="image/jpeg,image/png,image/gif">
                        </div>

                    </div>
                </div>
            </div>

            @foreach(config('press.locales') as $key => $value)
                <h4> Сведения для туриста
                    <small class="text-danger font-thin pull-right">"{{$value['name']}}"</small>
                </h4>
                <hr>
                <div class="form-group{{ $errors->has('contacts') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Контакты</label>
                    <div class="col-sm-9">
                        <textarea class="form-control form-control-grey no-resize summernote" rows="10"
                                  name="cfo[{{$key}}][contacts]" required>{{$user->cfo['cfo'][$key]['contacts']}}</textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('invest') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Инвестиционные предложения</label>
                    <div class="col-sm-9">
                        <textarea class="form-control form-control-grey no-resize summernote" rows="10"
                                  name="cfo[{{$key}}][invest]" required>{{$user->cfo['cfo'][$key]['invest']}}</textarea>
                    </div>
                </div>
            @endforeach

            {{method_field('PUT')}}
            {!! csrf_field() !!}
            <div class="form-group">

                <div class="col-sm-4 col-sm-offset-8 text-right">
                    <button type="submit" class="btn  btn-danger btn-rounded">Изменить</button>
                </div>
            </div>
        </form>
    </div>

@endsection
@push('scripts')
<script type="text/javascript">
  window.onload = function() {
    $('.summernote').summernote({minHeight: 300});
  };
</script>
@endpush
