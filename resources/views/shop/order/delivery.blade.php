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

    <div class="form-group m-t-sm" v-bind:class="{ 'has-error': errors.address }">
      <label class="text-sm text-left">Адрес <span class="text-red">*</span> :</label>
      <input type="text" name="address" autofocus class="form-control"
             v-model="formData.address"
             required
             ref="address"
      />
      <span class="help-block" v-if="errors.address"><strong>@{{ errors.address[0]}}</strong></span>
    </div>

    <div v-if="deliveryData.mail" class="form-group m-t-sm">
      <p>
        стоимость доставки: @{{deliveryData.mail.price || '***'}} руб.</br>
        срок доставки с момента передачи в ТК: от @{{deliveryData.mail.min_days || '***'}} до @{{deliveryData.mail.max_days || '***'}} дней
      </p>
    </div>
  </form>

  {{--courier--}}
  <div class="col-md-12" v-show="formData.delivery === 'courier'">
    <div v-show="cdekWatData===null" id="forpvz" style="width:100%; height:350px;"></div>
    <div v-if="cdekWatData">
      <p>
        <h4>Доставка осуществляется до пункта выдачи заказа ТК</h4>
        выбран пункт выдачи заказа "@{{cdekWatData.PVZ.Name || '***'}}"  <a class="inline text-green" v-on:click="cdekWatData = null">выбрать другой</a></br>
        город: @{{cdekWatData.cityName || '***'}} (код: @{{cdekWatData.city || '***'}})</br>
        адрес: @{{cdekWatData.PVZ.Address || '***'}}</br>
        время работы: @{{cdekWatData.PVZ.WorkTime || '***'}}</br>
        стоимость доставки: @{{cdekWatData.price || '***'}} руб.</br>
        срок доставки с момента передачи в ТК: @{{cdekWatData.term || '***'}} дн.
      </p>
    </div>
  </div>


</div>