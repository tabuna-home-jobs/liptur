<label class="font-bold">Выберите Кухню:</label>

@foreach($kitchens as $key => $item)
    <div class="checkbox padder-sm m-b-md">
        <label class="i-checks">
            <input type="checkbox" name="kitchens[]" value="{{$key}}"
                   @if(in_array($key,$request->get('kitchens',[]))) checked @endif>
            <i></i>
            {{$item}}
        </label>
    </div>

@endforeach