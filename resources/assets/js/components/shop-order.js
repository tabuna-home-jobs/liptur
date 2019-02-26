$(function () {
  if (document.getElementById('shop-order')) {
    new Vue({
      'el': '#shop-order',
      data: {
        formData: {
          payment: 'cash',
          delivery: 'courier'
        },
        deliveryPrice: '***',
        errors: {},
        aggree: false
      },
      mounted() {
        this.$set(this.formData, 'email', this.$refs.email.dataset.value || '');
        this.$set(this.formData, 'phone', this.$refs.phone.dataset.value || '');
        this.$set(this.formData, 'first_name', this.$refs.first_name.dataset.value || '');
        this.$set(this.formData, 'last_name', this.$refs.last_name.dataset.value || '');
      },
      methods: {
        async tryCalcDelivery() {
          const {zip, delivery} = this.formData;

          if(!delivery || delivery === 'pickup' || !zip || zip.length != 6) {
            return;
          }

          const req = await this.$http.get(`/shop/order/32423/delivery/${delivery}?to=${zip}`);
          console.log(req);
          const price = req.body.price || '***';

          this.$set(this, 'deliveryPrice', price);
        },
        async sendOrder() {
          const formData = this.formData;
          
          if(!this.aggree) {
            return false;
          }

          try {
            await this.$http.post('/api/cart/order', {
              email: formData.email || '',
              name: formData.first_name || formData.last_name ? `${formData.first_name||''} ${formData.last_name||''}`: null,
              phone: formData.phone || '',
              password: formData.password || '',
              password_confirmation: formData.password_confirmation || '',
              nick: formData.nick || '',
              message: formData.message || '',
              delivery: formData.delivery || '',
              payment: formData.payment || '',
            });
            swal({
              title: "Выполнено успешно",
              text: "Ваш заказ создан!",
              type: "success",
              confirmButtonClass: "btn-success",
              confirmButtonText: "Перейти на главную страницу",
            }, function () {
              window.location.href = '/shop';
            });
          } catch (e) {
            if(e.body.errors) {
              this.$set(this, 'errors', e.body.errors)
            } else {
                this.$set(this, 'errors', {})
                swal({
                    title: "Ошибка передачи данных",
                    text: "",
                    timer: 2000,
                    showConfirmButton: false,
                    type: "error",
                });
            }
          }
        }
      }
    });
  }
});