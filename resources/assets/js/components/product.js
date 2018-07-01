$(function () {
  if (document.getElementById('product')) {
    new Vue({
      'el': '#product',
      data: {},
      async mounted() {
      
      },
      methods: {
        async addIntoCart(product) {
          await this.$http.post(`/api/cart/${product}`);
        }
      }
    });
  }
});