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
        products: localCartData.content || [],
        total: localCartData.total || "0.00",
        totalCount: localCartData.count || 0
      },
      async mounted() {
        $(window).on('load resize', function () {
          reloadCartAffix();
        });
        const {body} = await this.$http.get('/api/cart')
        this.renderData(body);
      },
      methods: {
        renderData({total, count, content}, local) {
          this.total = total;
          this.totalCount = count;
          this.products = content;
          EventBus.$emit('cart-updated', { total, count, content });
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