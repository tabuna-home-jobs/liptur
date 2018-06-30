$(function () {
  if (document.getElementById('cart')) {
    new Vue({
      'el': '#cart',
      data: {
        price: false,
        items: [],
      },
      mounted: function () {
        console.log("Asfasf")
      },
      methods: {
        calc: function (event) {

        },

        finishOrder: function () {

        }
      }
    });
  }
});