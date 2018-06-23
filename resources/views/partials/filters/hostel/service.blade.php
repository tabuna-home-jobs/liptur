<label class="font-bold">Выберите услуги:</label>
@foreach($parameters as $key => $item)



    @if($loop->iteration == 11)
        <div class="collapse padder-sm" id="collapseService">
            @endif


            <div class="checkbox m-b-md">

                <label class="i-checks">
                    <input type="checkbox" name="service[]" value="{{$key}}"
                           @if(in_array($key,$request->get('service',[]))) checked @endif>
                    <i></i>
                    {{$item}}
                </label>
            </div>


            @if($loop->iteration == 10)
                <p class="text-right m-n">
                    <a class="btn btn-link font-thin text-sm" role="button" data-toggle="collapse"
                       href="#collapseService" aria-expanded="false" aria-controls="collapseService">
                        Показать ещё
                    </a>
                </p>
            @endif



            @if($loop->iteration  > 10 && $loop->last)
        </div>
    @endif

@endforeach