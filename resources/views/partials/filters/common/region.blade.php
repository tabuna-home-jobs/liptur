<label class="font-bold">Выберите район:</label>
@foreach($region as $key => $item)



    @if($loop->iteration == 4)
        <div class="collapse padder-sm" id="collapseRegion">
            @endif


            {{-- <div class="form-group">--}}
            <div class="radio m-b-md">


                <label class="i-checks">
                    <input type="radio" name="region" value="{{$key}}"
                           @if($request->get('region') == $key) checked @endif>
                    <i></i>
                    {{$item['name']}}
                </label>


            </div>
            {{--</div>--}}

            @if($loop->iteration == 3)
                <p class="text-right  m-n">
                    <a class="btn btn-link font-thin text-sm" role="button" data-toggle="collapse"
                       href="#collapseRegion" aria-expanded="false" aria-controls="collapseRegion">
                        Показать ещё
                    </a>
                </p>
            @endif



            @if($loop->last)
        </div>
    @endif

@endforeach