$(function () {
  if (document.getElementById('cart-modal')) {
    new Vue({
      'el': '#cart-modal',
      data: {
        cartProducts: [],
        cartTotal: "0.00",
        cartTotalCount: 0
      },
      async mounted() {
        EventBus.$on('add-product-into-cart', (data) => {
          this.addIntoCart(data.id)
        });
      },

      methods: {
        renderCart({total, count, content}, local) {
          this.cartTotal = total;
          this.cartTotalCount = count;
          this.cartProducts = content;
          if(!local) {
            localStorage.setItem(CART_LOCAL_STORAGE_KEY, JSON.stringify({total, count, content}));
          }
        },

        formatCartPrice(value) {
          return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        },

        updateCartQty(product, qty) {
          if(qty>0) {
            this.$set(product, "qty", qty);
            this.updateCart(product);
          }
        },

        updateCartInput(product) {
          this.updateCart(product);
        },

        async updateCart(product) {
          const {body} = await this.$http.put(`/api/cart/${product.rowId}/${product.qty}`);
          this.renderCart(body);
        },

        closeCart() {
          $(this.$el).modal('hide');
        },

        async addIntoCart(product) {
          const {body} = await this.$http.post(`/api/cart/${product}`);
          this.renderCart(body);
          $(this.$el).modal('show');
        },
      }
    });
  }
});