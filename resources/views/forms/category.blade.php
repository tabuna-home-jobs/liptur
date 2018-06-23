<div class="wrapper-md">
    @if($category->has('category'))

        <div class="form-group">
            <label>Категория</label>


            @foreach($category->get('category') as $key => $name)
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[category][{{$key}}]" value="1"
                                       @if(isset($selectCategory[$key]) && $selectCategory[$key]) checked @endif>
                                <i></i>
                                {{$name}}
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="line line-dashed b-b line-lg"></div>
    @endif


    @if($category->has('kitchens'))

        <div class="form-group">
            <label>Кухня</label>

            @foreach($category->get('kitchens') as $key => $name)
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[kitchens][{{$key}}]" value="1"
                                       @if(isset($selectKitchens[$key]) && $selectKitchens[$key]) checked @endif>
                                <i></i>
                                {{$name}}
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="line line-dashed b-b line-lg"></div>
    @endif


</div>
