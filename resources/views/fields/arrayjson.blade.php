@php
    unset ($attributes['value']);
@endphp
<div class="form-group{{ $errors->has($oldName) ? ' has-error' : '' }}">
    @if(isset($title))
        <label for="{{$id}}">{{$title}}</label>
    @endif
    <div id="ace-code-block-{{$id}}" style="width: 100%; min-height: 500px;"></div>
    <input value="{{json_encode($value)}}" @include('platform::partials.fields.attributes', ['attributes' => $attributes])>
    @if(isset($help))
        <p class="form-text text-muted">{{$help}}</p>
    @endif
</div>
@include('platform::partials.fields.hr', ['show' => $hr ?? true])
@push('scripts')
    <script>
    document.addEventListener('turbolinks:load', function() {
        var editor{{$lang}}{{$slug}} = ace.edit('ace-code-block-{{$id}}');
        editor{{$lang}}{{$slug}}.getSession().setMode('ace/mode/javascript');
        editor{{$lang}}{{$slug}}.setTheme('ace/theme/monokai');
        editor{{$lang}}{{$slug}}.getSession().setUseWorker(false);
        //editor{{$lang}}{{$slug}}.setValue(JSON.stringify(jsonDoc, null, '\t'));

        var input{{$lang}}{{$slug}} = $('#field-{{$lang}}-{{$slug}}');
        editor{{$lang}}{{$slug}}.getSession().setValue(JSON.stringify({!! json_encode($value) !!}, null, '\t'));
        //editor{{$lang}}{{$slug}}.getSession().setValue(input{{$lang}}{{$slug}}.val());
        editor{{$lang}}{{$slug}}.getSession().on('change', function () {
            input{{$lang}}{{$slug}}.val(editor{{$lang}}{{$slug}}.getSession().getValue());
        });
    });
</script>
@endpush
