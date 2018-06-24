<div class="wrapper-md">
    @foreach($icons as $key => $name)
        <div class="form-group">
            <div class="col-sm-12">
                <div class="checkbox">
                    <label class="i-checks">
                        <input type="checkbox" name="options[option][{{$key}}]" value="1"
                               @if(key_exists($key,$options)) checked @endif>
                        <i></i>
                        {{$name}}
                    </label>
                </div>
            </div>
        </div>
    @endforeach
</div>