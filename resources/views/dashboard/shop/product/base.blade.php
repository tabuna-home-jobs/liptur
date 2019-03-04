<div class="wrapper-md">

    @if(!is_null($post))
    <div class="form-group">
        <label>Артикуль товара</label>
        <p class="m-l-sm">{{$post->getOption('ski')}}</p>
        <input type="hidden" name="options[ski]" value="{{$post->getOption('ski')}}">
    </div>
    <div class="line line-dashed b-b line-lg"></div>
    @endif


    <div class="form-group">
        <label>{{trans('dashboard::post/base.semantic_url')}}</label>
        <input type='text' class="form-control"
               value="{{$post->slug ?? ''}}"
               placeholder="{{trans('dashboard::post/base.semantic_url_unique_name')}}" name="slug">
    </div>
    <div class="line line-dashed b-b line-lg"></div>
    <div class="form-group">
        <label>{{trans('dashboard::post/base.time_of_publication')}}</label>
        <div class='input-group date datetimepicker'>
            <input type='text' class="form-control"
                   value="{{$post->publish_at ?? ''}}"
                   name="publish"
                   data-date-format="YYYY-MM-DD HH:mm:ss"
            >
            <span class="input-group-addon input-group-btn">
                <span class="btn btn-default"><i class="icon-calendar" aria-hidden="true"></i></span>
            </span>
        </div>
    </div>
    <div class="form-group">
        <label>{{trans('dashboard::post/base.status')}}</label>
        <select name="status" class="form-control">
            @foreach($type->status() as $key => $value)
                <option value="{{$key}}"
                        @if(!is_null($post) && $post->status == $key) selected @endif >
                    {{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="line line-dashed b-b line-lg"></div>

    @if(!empty($type->views))
        <div class="form-group">
            <label>{{trans('dashboard::post/base.view')}}</label>
            <select name="options[view]" class="form-control">
                @foreach($type->views as $key => $value)
                    <option value="{{$key}}"
                            @if(!is_null($post) && $post->getOption('view') == $key) selected @endif >
                        {{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="line line-dashed b-b line-lg"></div>
    @endif

    <div class="form-group">
        <label>{{trans('dashboard::post/base.tags')}}</label>
        <select class="form-control select2-tags"
                name="tags[]"
                multiple="multiple"
                placeholder="{{trans('dashboard::post/base.generic_tags')}}">
            @if(!is_null($post))
                @foreach($post->tags as $tag)
                    <option value="{{$tag->name}}" selected="selected">{{$tag->name}}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="line line-dashed b-b line-lg"></div>
    <div class="form-group">
        <label class="control-label">{{trans('dashboard::post/base.show_in_categories')}}</label>
        <select name="category[]" multiple data-placeholder="{{trans('dashboard::post/base.select_category')}}"
                class="select2 form-control">
            @foreach($category as  $value)
                <option value="{{$value->id}}"
                        @if($value->active) selected @endif >
                    {{$value->term->getContent('name')}}</option>
            @endforeach
        </select>
    </div>
    <div class="line line-dashed b-b line-lg"></div>

    {!! generate_form($type->options(), is_null($post) ? [] : $post->toArray()) !!}


    <input type="hidden" name="options[locale][ru]"
           value="true">
</div>


<script>
document.addEventListener('turbolinks:load', function() {
    $('.select2-tags').select2({
        templateResult: function formatState(state) {
            if (!state.id || !state.count) {
                return state.text;
            }

            var str = '<span>' + state.text + '</span>' + ' <span class="pull-right badge bg-info">' + state.count + '</span>';

            return $(str);
        },
        createTag: function (tag) {
            return {
                id: tag.term,
                text: tag.term,
            };
        },
        escapeMarkup: function (m) {
            return m;
        },
        width: '100%',
        tags: true,
        cache: true,
        ajax: {
            url: function (params) {
                return dashboard.prefix('/systems/tags/' + params.term);
            },
            delay: 250,
            processResults: function (data, page) {
                return {
                    results: data
                };
            }
        }
    });
});
</script>
