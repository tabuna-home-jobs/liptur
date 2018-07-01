$(function () {
  if (document.getElementById('product')) {
    new Vue({
      'el': '#product',
      data: {},
      mounted() {
        console.log("SDgsdgsdg", $(".owl-gallery"))
        $(".owl-gallery").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          nav: true,
          items: 1,
          thumbs: true,
          thumbsPrerendered: true
        });
      },
      methods: {
        async addIntoCart(product) {
          await this.$http.post(`/api/cart/${product}`);
        }
      }
    });
  }
});