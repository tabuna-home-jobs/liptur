<div class="form-group">
    <label class="font-bold">Период проведения :</label>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input class="datepicker-filter form-control form-control-grey" type="text" name="date[open]"
                       placeholder="Выберите дату"
                       @if($request->has('date') && key_exists('open',$request->get('date',[])))
                       value="{{$request->get('date')['open']}}"
                        @endif
                >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <input class="datepicker-filter form-control form-control-grey" type="text" name="date[close]"
                       placeholder="Выберите дату"
                       @if($request->has('date') && key_exists('open',$request->get('date',[])))
                       value="{{$request->get('date')['close']}}"
                        @endif

                >
            </div>
        </div>
    </div>
</div>
