<div id="cartProductModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content wrapper-md">
        <div class="block-header padder-v-micro">
            Товар добавлен в корзину
        </div>
        <div class="col-md-8">
          <div v-for="product in products" class="row panel panel-default box-shadow-lg pos-rlt m-b-none">
            <div class="col-md-4 col-xs-12 no-padder-h">
              <div class="img-full">
                <img height="190" v-bind:src="product.options.image"/>
              </div>
            </div>
            <div class="col-md-7 col-xs-12 padder-v">
              <a class="text-green text-bold text-lg" v-bind:href="product.options.url">
                  @{{product.name}}
                </a>
              <div class="padder-v-micro text-sm">
                @{{product.options.annotation}}
              </div>
              <div class="row m-t">
                <div class="col-xs-4">
                  <div class="input-group cart-component">
                    <input type="text" class="form-control" v-model="product.qty" v-on:change="updateInput(product)"/>
                    <button type="button" class="btn btn-default" v-on:click="updateQty(product, parseInt(product.qty)+1)">
                      +
                    </button>
                    <button type="button" class="btn btn-default" v-on:click="updateQty(product, parseInt(product.qty)-1)">
                      -
                    </button>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="text-sm">Цена за 1 шт:</div>
                  <em class="text-green text-xxxl">@{{formatPrice(product.price)}}</em>&nbsp;<em class="text-sm text-green">руб.</em>
                </div>
                <div class="col-xs-4">
                  <div class="text-sm">Сумма:</div>
                  <em class="text-green text-xxxl">@{{formatPrice(product.subtotal)}}</em>&nbsp;<em class="text-sm text-green">руб.</em>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row m-l-none">
            <div>
              Товаров в корзине: <b>@{{totalCount}}</b>
            </div>
            <div class="row padder-v-micro">
              <div class="col-xs-12">
                <span class="text-md">На сумму:&nbsp;</span><em class="text-green text-35px">@{{ formatPrice(total) }}</em>&nbsp;<em class="text-green text-md">руб.</em>
              </div>
            </div>
            <button class="btn btn-warning w-full m-t text-u-c" v-on:click="closeCart()">Продолжить покупки</button>
            <a href="{{route('shop.cart')}}" class="btn btn-success w-full m-t text-u-c">Перейти в корзину</a>
          </div>
        </div>
        <div class="clearfix"></div>
        <a class="top-right wrapper-md" v-on:click="closeCart()"><i class="close-modal"></i></a>
      </div>
    </div>
  </div>