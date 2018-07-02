$(function () {
  if (document.getElementById('product')) {
    new Vue({
      'el': '#product',
      data: {},
      mounted() {
          $( '#shop-product-slider' ).sliderPro({
              width: '100%',
              height: 600,
              orientation: 'vertical',
              loop: false,
              arrows: true,
              buttons: false,
              thumbnailsPosition: 'right',
              thumbnailPointer: true,
              thumbnailWidth: 110,
              breakpoints: {
                  800: {
                      thumbnailsPosition: 'bottom',
                      thumbnailWidth: 110,
                      thumbnailHeight: 80
                  },
                  500: {
                      thumbnailsPosition: 'bottom',
                      thumbnailWidth: 110,
                      thumbnailHeight: 50
                  }
              }
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