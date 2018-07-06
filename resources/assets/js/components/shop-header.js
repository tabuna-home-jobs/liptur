$(function () {
  if (document.getElementById('shop-header')) {
    new Vue({
      'el': '#shop-header',
      data: {
        cartProducts: localCartData.content || [],
        cartTotal: localCartData.total || "0.00",
        cartTotalCount: localCartData.count || 0
      },
      beforeCreate() {
        EventBus.$on('cart-updated', (data) => {
         this.renderCart(data)
        });
      },
      methods: {
        formatPrice(value) {
          return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        },

        declOfNum(number, titles) {
          cases =[2, 0, 1, 1, 1, 2];
          return titles[(number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5]];
        },


        renderCart({ total, count, content }) {
          this.cartTotal = total;
          this.cartTotalCount = count;
          this.cartProducts = content;
          localStorage.setItem(CART_LOCAL_STORAGE_KEY, JSON.stringify({ total, count, content }));
        },

        async destroy(product, event) {
          event.stopPropagation();
          const { body } = await this.$http.delete(`/api/cart/${product.rowId}`);
          EventBus.$emit('cart-updated', body);
        }
      }
    });
  }
});