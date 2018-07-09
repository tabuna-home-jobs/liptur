$(function () {
  if (document.getElementById('shop-order')) {
    new Vue({
      'el': '#shop-order',
      data: {
        formData: {},
        errors: {},
        aggree: false
      },
      methods: {
        async sendOrder() {
          const formData = this.formData;
          
          if(!this.aggree) {
            return false;
          }

          await this.$http.post('/api/cart/order', {
            email: formData.email,
            name: `${formData.first_name} ${formData.last_name}`,
            phone: formData.phone,
            password: formData.password,
            retry_password: formData.retry_password,
            nick: formData.nick,
            nick: formData.nick,
            message: formData.message,
            delivery: formData.delivery,
            delivery: formData.delivery,
            payment: formData.payment,

          })
          console.log(formData)
        }
      }
    });
  }
});