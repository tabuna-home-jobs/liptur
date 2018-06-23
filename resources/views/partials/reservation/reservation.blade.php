<div class="panel wrapper-xl b box-shadow-lg padder-lg" id="reservation">
    <p class="h3 font-thin  m-b-lg">Бронирование</p>
    <form role="form" id="reservation-form" v-on:submit.prevent="send">

        <div class="form-group  m-t-md">
            <div class="data-holder">
                <input id="reservationdata" type="text" maxlength="200" value="{{$reservation['date']}}" required class=""  >
            </div>
            <label for="reservationdata" class="text-sm text-left">Дата поездки</label>
        </div>
        <div class="form-group  m-t-md">

            <div class="quantity-holder">
                <span  v-on:click="minus">&mdash;</span>
                <input type="text" id="quantity"  maxlength="200" required v-model="quantity" value="1" class="">
                <span href="#" v-on:click="plus" class="btn-plus">+</span>
            </div>
            <label for="quantity" class="text-sm text-left">Количество мест</label>
        </div>

    </form>

    <div class="mrgftop">
        <p class="text-center">
            <button type="submit" form="reservation-form" class="btn btn-danger btn-rounded">Забронировать</button>
        </p>
    </div>
    <script>
        var reservation = [];
        reservation["user_id"] = "{{$reservation['user_id']}}";
        reservation["post_id"] = "{{$reservation['postid']}}";
    </script>

    <link rel="stylesheet" href="/css/reservation.css">
    @push('scripts')
    <script  src="{{ URL::asset('js/reservation.js') }}"></script>
    @endpush
</div>