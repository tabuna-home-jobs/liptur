<div class="row">
  <div class="col-md-6 m-b">
    <div class="text-white inline wrapper-sm padder-md m-r-sm bg-darkred">Шаг 2 </div>
    Выберите способ получения заказа:
  </div>
  <div class="col-md-6">
    <div class="form-group select-group">
      <select name="delivery" class="select2 form-control text-darkred" v-model="formData.delivery" v-on:change="changeDelivery()">
        @foreach ($order['delivery'] as $key=>$delivery)
          <option value="{{$key}}">{{$delivery}}</option>
        @endforeach
      </select>
      <span class="caret"></span>
    </div>
  </div>

  {{--pickup--}}
  <div class="col-md-12" v-if="formData.delivery === 'pickup'">
    Адрес получения: <a href="<?php echo e(route('shop-contacts')); ?>" target="_blank">г. Липецк, пр-т. Победы, 67а</a>
  </div>

  {{--mail--}}
  <form class="col-md-6" v-if="formData.delivery === 'mail'">
    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.address }">
      <label class="text-sm text-left">Адрес <span class="text-red">*</span> :</label>
      <input type="text" name="address" autofocus class="form-control"
             v-model="formData.address"
             required
             ref="address"
      />
      <span class="help-block" v-if="errors.address"><strong>@{{ errors.address[0]}}</strong></span>
    </div>

    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.zip }">
      <label class="text-sm text-left">Индекс <span class="text-red">*</span> :</label>
      <input type="text" name="zip" autofocus class="form-control"
             maxlength="6"
             v-model="formData.zip"
             v-on:change="tryCalcDelivery()"
             required
             ref="zip"
      />
      <span class="help-block" v-if="errors.zip"><strong>@{{ errors.zip[0]}}</strong></span>
    </div>

    <div class="form-group m-t-sm">
      <label class="text-sm text-left">Стоимость доставки:</label>
      <h4>@{{deliveryPrices.mail || '***'}} руб.</h4>
    </div>
  </form>

  {{--courier--}}
  <div class="col-md-12" v-show="formData.delivery === 'courier'">
    <div v-show="cdekWatData===null" id="forpvz" style="width:100%; height:350px;"></div>
    <div v-if="cdekWatData">
      <h4 class="inline">Выбран пункт выдачи заказа "@{{cdekWatData.PVZ.Name}}"</h4> <a class="inline text-green" v-on:click="cdekWatData = null">выбрать другой</a>
      <h4>город: @{{cdekWatData.cityName}} (код: @{{cdekWatData.city}})</h4>
      <h4>адрес: @{{cdekWatData.PVZ.Address}}</h4>
      <h4>время работы: @{{cdekWatData.PVZ.WorkTime}}</h4>
      <h4>цена: @{{cdekWatData.price}} руб.</h4>
      <h4>срок: @{{cdekWatData.term}} дн.</h4>
    </div>
  </div>


</div>