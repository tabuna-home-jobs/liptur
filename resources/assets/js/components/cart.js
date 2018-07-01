$(function () {
  if (document.getElementById('cart')) {
    new Vue({
      'el': '#cart',
      data: {
        price: false,
        products: [],
        total: "0.00"
      },
      async mounted() {
        const {body} = await this.$http.get('/api/cart')
        this.total = body.total;
        this.products = body.content;
      },
      methods: {
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
          this.total = body.total;
          this.products = body.content;
        },

        async destroy(product) {
          const { body } = await this.$http.delete(`/api/cart/${product.rowId}`);
          this.total = body.total;
          this.products = body.content;
        }
      }
    });
  }
});