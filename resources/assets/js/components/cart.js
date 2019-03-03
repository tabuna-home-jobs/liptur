function reloadCartAffix() {
  if($('#cart-affix-target').height() < $('#cart-affix').height() || $(window).width()<=992) {
    $(window).off('.affix');
    $("#cart-affix")
    .removeClass("affix affix-top affix-bottom")
    .removeData("bs.affix");
    return;
  }
  $('#cart-affix').affix({
    offset: {
      top: $('#cart-affix').offset().top,
      bottom: function () {
        return $(document).height() - $('#cart').offset().top - $('#cart').height()
      }
    }
  })
}

$(function () {
  if (document.getElementById('cart')) {

    new Vue({
      'el': '#cart',
      data: {
        products:  [],
        total:  "0.00",
        totalCount: 0,
        purchaseCount: 0,
        orderCount: 0,
        data: localCartData,
        isPurchase: true,
      },
      async mounted() {
        this.reRender(localCartData);
        $(window).on('load resize', function () {
          reloadCartAffix();
        });
        const {body} = await this.$http.get('/api/cart')
        this.renderData(body);
      },
      methods: {
        renderData({content, total, count}, local) {
          this.data = {content, total, count};
          this.reRender();
          EventBus.$emit('cart-updated', { total, count, content });
        },

        changeIsPurchase(value) {
          this.$set(this, 'isPurchase', value);
          this.reRender();
        },

        reRender() {
          const {content = {}} = this.data || {};
          const {total, totalCount, products, purchaseCount, orderCount} =
              Object.keys(content).reduce((acc, key) => {
                const {total, totalCount, products, purchaseCount, orderCount} = acc
                const product = content[key];

                const qty = parseInt(product.qty) || 0;

                const _purchaseCount = product.qty > 1 ? purchaseCount: purchaseCount + qty;
                const _orderCount = product.qty > 1 ? orderCount + qty: orderCount;

                if(product.qty > 1 && !this.isPurchase || product.qty < 2 && this.isPurchase) {
                  return {
                    total: total + product.subtotal,
                    totalCount: totalCount + qty,
                    products: [...products, product],
                    purchaseCount: _purchaseCount,
                    orderCount: _orderCount
                  }
                }
                return {
                  ...acc,
                  purchaseCount: _purchaseCount,
                  orderCount: _orderCount
                };
              }, {total: 0, totalCount: 0, products: [], purchaseCount: 0, orderCount: 0});
          this.total = total;
          this.totalCount = totalCount;
          this.products = products;
          this.orderCount = orderCount;
          this.purchaseCount = purchaseCount;
        },

        formatPrice(value) {
          return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        },

        updateQty(product, qty) {
          if(qty>0) {
            this.$set(product, "qty", qty);
            this.update(product);
          }
        },

        updateInput(product) {
          this.update(product);
        },

        finishOrder() {
          console.log("finish")
        },

        async update(product) {
          const {body} = await this.$http.put(`/api/cart/${product.rowId}/${product.qty}`);
          this.renderData(body);
        },

        async destroy(product) {
          const { body } = await this.$http.delete(`/api/cart/${product.rowId}`);
          this.renderData(body);
          reloadCartAffix();
        }
      }
    });
  }
});