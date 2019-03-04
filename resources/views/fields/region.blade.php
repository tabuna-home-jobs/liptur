<div class="form-group">

    @if(isset($title))
        <label for="field-{{$name}}">{{$title}}</label>
    @endif


    <select class="form-control {{$class ?? ''}}"

            @if(isset($prefix))
            name="{{$prefix}}[{{$lang}}]{{$name}}"
            @else
            name="{{$lang}}{{$name}}"
            @endif

    >
        @foreach(collect(config('region')) as $key => $item)
            <option value="{{$key}}" @if(isset($value) && $key == $value) selected @endif>{{$item['name']}}</option>
        @endforeach
    </select>


    @if(isset($help))
        <p class="help-block">{{$help}}</p>
    @endif


</div>

<div class="line line-dashed b-b line-lg"></div>