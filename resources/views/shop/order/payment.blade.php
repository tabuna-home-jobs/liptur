<div class="row">
  <div class="col-md-6 m-b">
    <div class="bg-darkred text-white inline wrapper-sm padder-md m-r-sm">Шаг {{$step ?? 3}} </div>
    Выберите способ оплаты:
  </div>
  <div class="col-md-6">
    <div class="form-group select-group">
      <select name="payment" class="select2 form-control text-darkred" v-model="formData.payment">
        @foreach ($order['payment'] as $key=>$payment)
          <option :disabled="'{{$key}}'==='cash' && formData.delivery !=='pickup'" value="{{$key}}">{{$payment}}</option>
        @endforeach
      </select>
      <span class="caret"></span>
    </div>
  </div>
</div>