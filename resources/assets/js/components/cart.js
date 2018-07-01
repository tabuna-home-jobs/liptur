$(function () {
  if (document.getElementById('cart')) {
    new Vue({
      'el': '#cart',
      data: {
        price: false,
        content: [],
        total: "0.00"
      },
      async mounted() {
        const {body} = await this.$http.get('/api/cart')
        console.log(body)
        this.total = body.total;
        this.content = body.content;
      },
      methods: {
        update(event) {
          console.log("update")
        },

        destroy(id) {
          console.log("delete", id)
        },

        finishOrder() {
          console.log("finish")
        }
      }
    });
  }
});