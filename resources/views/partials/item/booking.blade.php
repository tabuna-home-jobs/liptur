<div class="panel wrapper-xl b box-shadow-lg padder-lg">
    <p class="h3 font-thin  m-b-lg">Забронировать <span class="text-danger">Номер</span></p>


    <div class="form-booking-hotel">
        <form action="{{$item->getContent('booking')}}" method="GET" target="_blank">
            <div class="row">
                <div class="col-xs-12">

                    <div class="form-group">
                        <input class="datepicker-booking form-control form-control-grey" type="text"
                               id="select-booking-from" name="from" placeholder="Выберите дату приезд">
                        <input type="hidden" name="checkin_year_month" id="checkin_year_month">
                        <input type="hidden" name="checkin_monthday" id="checkin_monthday">
                    </div>

                    <div class="form-group">
                        <input class="datepicker-booking form-control form-control-grey" type="text"
                               id="select-booking-to" name="to" placeholder="Выберите дату отъезда">
                        <input type="hidden" name="checkout_year_month" id="checkout_year_month">
                        <input type="hidden" name="checkout_monthday" id="checkout_monthday">
                    </div>
                </div>


                <div class="form-group text-center">
                    <button class="btn btn-danger btn-rounded" type="submit">Забронировать</button>
                </div>
            </div>
        </form>
    </div>


</div>



