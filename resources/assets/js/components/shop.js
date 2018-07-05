$(function () {
  if (document.getElementById('shop')) {
    new Vue({
      'el': '#shop',
      methods: {
        addIntoCart(id) {
          EventBus.$emit('add-product-into-cart', { id });
        },
      }
    });
  }
});