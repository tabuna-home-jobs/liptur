$(function () {
  if (document.getElementById('product')) {
    new Vue({
      'el': '#product',
      data: {
        cartProducts: [],
        cartTotal: 0,
        cartTotalCount: 0
      },
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

        $('.warnings-carousel').owlCarousel({
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',
          lazyLoad: true,
          responsive: {
            0: {
              items: 1,
              stagePadding: 20,
            },
            600: {
              margin: 30,
              items: 4,
            },
            1000: {
              items: 4,
              margin: 30,
            }
          }
        });
      },
      methods: {
        formatPrice(value) {
          return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        },

        renderCart({ total, count, content }) {
          this.cartTotal = total;
          this.cartTotalCount = count;
          this.cartProducts = content;
        },

        updateQty(product, qty) {
          if (qty > 0) {
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
          const { body } = await this.$http.put(`/api/cart/${product.rowId}/${product.qty}`);
          this.renderCart(body);
        },

        async destroy(product) {
          const { body } = await this.$http.delete(`/api/cart/${product.rowId}`);
          this.renderCart(body);
        },

        closeCart() {
          $('#cartProductModal').modal('hide');
        },
        
        async addIntoCart(product) {
          const {body} = await this.$http.post(`/api/cart/${product}`);
          this.renderCart(body);
          $('#cartProductModal').modal('show');
        }
      }
    });
  }
});