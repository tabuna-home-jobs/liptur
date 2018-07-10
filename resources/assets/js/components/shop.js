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

$(function () {
  if (document.getElementById('shop1')) {
    new Vue({
      'el': '#shop1',
      methods: {
        addIntoCart(id) {
          EventBus.$emit('add-product-into-cart', { id });
        },
      }
    });
  }
});