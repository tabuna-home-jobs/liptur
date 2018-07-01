const CART_LOCAL_STORAGE_KEY = "CART_LOCAL_STORAGE_KEY"

$(function () {
  if (document.getElementById('cart')) {
    new Vue({
      'el': '#cart',
      data: {
        products: [],
        total: "0.00",
        totalCount: 0
      },
      async mounted() {
        const localData = localStorage.getItem(CART_LOCAL_STORAGE_KEY);
        
        if(localData) {
          try {
            this.renderData(JSON.parse(localData));
          } catch (error) {
            localStorage.removeItem(CART_LOCAL_STORAGE_KEY);
          }
        }

        const {body} = await this.$http.get('/api/cart')
        this.renderData(body);
      },
      methods: {
        renderData({total, totalCount, content}, local) {
          this.total = total;
          this.totalCount = totalCount;
          this.products = content;
          if(!local) {
            localStorage.setItem(CART_LOCAL_STORAGE_KEY, JSON.stringify({total, totalCount, content}));
          }
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
        }
      }
    });
  }
});