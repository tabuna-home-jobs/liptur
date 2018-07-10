$(function () {
  if (document.getElementById('shop-order')) {
    new Vue({
      'el': '#shop-order',
      data: {
        formData: {
          payment: 'cash',
          delivery: 'courier'
        },
        errors: {},
        aggree: false
      },
      mounted() {
        this.$set(this.formData, 'email', this.$refs.email.dataset.value || '');
        this.$set(this.formData, 'phone', this.$refs.phone.dataset.value || '');
      },
      methods: {
        async sendOrder() {
          const formData = this.formData;
          
          if(!this.aggree) {
            return false;
          }

          try {
            await this.$http.post('/api/cart/order', {
              email: formData.email,
              name: formData.first_name && formData.last_name ? `${formData.first_name} ${formData.last_name}`: null,
              phone: formData.phone,
              password: formData.password,
              password_confirmation: formData.password_confirmation,
              nick: formData.nick,
              message: formData.message,
              delivery: formData.delivery,
              payment: formData.payment,
            });
            $('#success-order-modal').modal('show');
          } catch (e) {
            this.$set(this, 'errors', e.body.errors)
          }
        }
      }
    });
  }
});