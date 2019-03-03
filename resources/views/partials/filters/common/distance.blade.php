<div class="form-group">
    <label class="font-bold">Удалённость от центра:</label>
    <input id="distance" name="distance" value="{{$request->get('distance')}}"
           data-slider-value="{{$request->get('distance')}}" type="text" data-slider-min="1" data-slider-max="1000"
           data-slider-step="5"/>
</div>
