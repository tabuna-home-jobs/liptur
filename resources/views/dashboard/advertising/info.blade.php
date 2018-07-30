<div class="wrapper-md">

    <div class="form-group m-t-md">
        <label class="col-sm-2 control-label">Имя</label>
        <div class="col-sm-10">
            <input type="text" name="slug" required class="form-control"
                   value="{{$adv->slug}}">
        </div>
    </div>

    <div class="line line-dashed b-b line-lg"></div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Категория</label>
        <div class="col-sm-10">
            <select required data-placeholder="Select Category" name="options[category]"
                    class="select2 form-control">
                @foreach($categories as $categoryCode => $categoryLabel)
                    <option value="{{$categoryCode}}"
                            @if($adv->getOption('category') == $categoryCode) selected @endif>
                        {{$categoryLabel}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="line line-dashed b-b line-lg"></div>


    <div class="form-group">
        <label class="col-sm-2 control-label">Период</label>

            <div class="col-sm-4">
                <div class="input-group">
                    <input required type='text' class="form-control datetimepicker"
                           value="{{\Carbon\Carbon::createFromTimestamp($adv->getOption('startDate'))->toDateTimeString()}}"
                           placeholder=""

                           name="options[startDate]"
                    >
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-group">
                    <input required type='text' class="form-control datetimepicker"
                           value="{{\Carbon\Carbon::createFromTimestamp($adv->getOption('endDate'))->toDateTimeString()}}"
                           placeholder=""

                           name="options[endDate]"
                    >
                </div>
            </div>
    </div>

</div>



