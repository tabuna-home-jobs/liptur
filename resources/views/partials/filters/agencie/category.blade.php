<label class="font-bold">Выберите предложение:</label>

@foreach($category as $key => $item)
    <div class="checkbox padder-sm m-b-md">

        <label class="i-checks">
            <input type="checkbox" name="category[]" value="{{$key}}"
                   @if(in_array($key,$request->get('category',[
                        'the-offer-of-tour-operators'
                   ]))) checked @endif>
            <i></i>
            {{$item}}
        </label>
    </div>

@endforeach