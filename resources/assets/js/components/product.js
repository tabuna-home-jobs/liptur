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
              arrows: false,
              buttons: false,
              autoplay: false,
              touchSwipe: false,
              thumbnailsPosition: 'right',
              thumbnailPointer: true,
              thumbnailArrows: true,
              thumbnailWidth: 110,
              thumbnailHeight: 110,
              breakpoints: {
                  800: {
                      thumbnailsPosition: 'bottom',
                      thumbnailWidth: 110,
                      thumbnailHeight: 110
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
          try {
                await this.$http.post(`/api/shop/${productId}/comment`, {
                    content: commentText,
                });
                swal({
                  title: "Выполнено успешно",
                  text: "Ваш комментарий добавлен!",
                  type: "success",
                  confirmButtonClass: "btn-success",
                  confirmButtonText: "Закрыть",
                }, function () {
                  location.reload();
                });
          } catch (e) {
                swal({
                    title: "Ошибка",
                    text: "Не получилось добавить комментарий!",
                    type: "error",
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "Закрыть",
                });
          }  
              
              
        },
        clearComment() {
          this.commentText = ''
        },
      }
    });
  }
});