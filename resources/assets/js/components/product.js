$(function () {
  if (document.getElementById('product')) {
    new Vue({
      'el': '#product',
      data: {
        commentText: ""
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
        addIntoCart(id) {
          EventBus.$emit('add-product-into-cart', {id});
        },
        async addComment() {
          const {commentText} = this;
          const productId = $(this.$el).attr('product-id')
          await this.$http.post(`/api/shop/${productId}/comment`, {
            content: commentText,
          });
          location.reload();
        },
        clearComment() {
          this.commentText = ''
        },
      }
    });
  }
});