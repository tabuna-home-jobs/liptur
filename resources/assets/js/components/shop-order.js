$(function () {
  if (document.getElementById('shop-order')) {
    new Vue({
      'el': '#shop-order',
      data: {
        formData: {
          payment: 'card',
          delivery: 'courier',
          zip: null,
          address: null,
        },
        deliveryPrices: {
          courier: null,
          mail: null
        },

        step: 0,
        errors: {},
        aggree: false,
        cdekLoaded: false,
        cdekWatData: null
      },
      mounted() {
        this.$set(this.formData, 'email', this.$refs.email.dataset.value || '');
        this.$set(this.formData, 'phone', this.$refs.phone.dataset.value || '');
        this.$set(this.formData, 'first_name', this.$refs.first_name.dataset.value || '');
        this.$set(this.formData, 'last_name', this.$refs.last_name.dataset.value || '');
      },
      methods: {
        onChooseCdek(wat) {
          this.$set(this, 'cdekWatData', wat);
        },
        changeDelivery() {
          this.$set(this.formData, 'payment', 'card');
        },

        async tryCalcDelivery() {
          try {
            const {zip, delivery} = this.formData;

            if(!delivery || delivery === 'pickup' || !zip || zip.length != 6) {
              return;
            }

            if(this.deliveryPrices[delivery]) {
              return;
            }

            const req = await this.$http.post(`/api/shop/delivery/cart`, {
              delivery_opts: this.getDeliveryOpts(),
              delivery
            });
            const price = req.body.price;

            this.$set(this.deliveryPrices, delivery, price);
          } catch (e) {
            swal({
              title: "Ошибка расчета доставки",
              text: e.body.message,
              timer: 2000,
              showConfirmButton: false,
              type: "error",
            });
          }
        },

        submitPersonal(e) {
          e.preventDefault()
          e.stopPropagation();

          this.checkAggree();

          this.gotoStep(1);

          const onChoose = this.onChooseCdek;

          if(!this.cdekLoaded) {
            new ISDEKWidjet({
              defaultCity: 'Липецк',
              cityFrom: 'Липецк',
              link: 'forpvz',
              country: 'Россия',
              path: '/cdek/',
              servicepath: '/api/shop/cdek/service',
              hidedelt: true,
              onChoose
            });
            this.cdekLoaded = true;
          }
        },

        gotoStep(step) {
          this.step = step;
        },

        getDeliveryOpts() {
          const delivery = this.formData.delivery;

          if(delivery === 'pickup') {
            return
          }

          if(delivery === 'mail') {
            const {zip, address} = this.formData;
            return {
              zip,
              address,
            }
          }

          if(delivery === 'courier') {
            if(!this.cdekWatData) {
              return null;
            }
            const {PVZ: {Address: pvz_address, Name: pvz_name} = {}, cityName: city_name, id = null, city: city_id = null, tarif = null, term} = (this.cdekWatData || {});
            return {id, pvz_address, pvz_name, tarif, city_id, city_name, term};
          }
        },

        async sendPurchase() {
          const formData = this.formData;

          this.checkAggree();
          this.$set(this, 'errors', {});

          try {
            const res = await this.$http.post(`/api/cart/purchase`, {
              email: formData.email || '',
              name: formData.first_name || formData.last_name ? `${formData.first_name||''} ${formData.last_name||''}`: null,
              phone: formData.phone || '',
              password: formData.password || '',
              password_confirmation: formData.password_confirmation || '',
              nick: formData.nick || '',
              message: formData.message || '',
              delivery: formData.delivery || '',
              delivery_opts: this.getDeliveryOpts(),
              payment: formData.payment || '',
            });

            if(res.body.redirect) {
              window.location.href = res.body.redirect;
            } else {
              swal({
                title: "Выполнено успешно",
                text: "Ваш заказ создан!",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Перейти на главную страницу",
              }, function () {
                window.location.href = '/shop';
              });
            }
          } catch (e) {
            this.catchSend(e)
          }
        },

        async sendOrder() {
          const formData = this.formData;

          this.checkAggree();

          try {
            const res = await this.$http.post(`/api/cart/order`, {
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

            if(res.body.redirect) {
              window.location.href = res.body.redirect;
            } else {
              swal({
                title: "Выполнено успешно",
                text: "Ваш заказ создан!",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Перейти на главную страницу",
              }, function () {
                window.location.href = '/shop';
              });
            }
          } catch (e) {
           this.catchSend(e)
          }
        },

        checkAggree() {
          if(!this.aggree) {
            swal({
              title: "Необходимо согласие",
              timer: 2000,
              showConfirmButton: false,
              type: "error",
            });
            throw new Error('Not aggree')
          }
          return true;
        },

        catchSend(e) {
          console.error(e);
          if(e.body && e.body.errors) {
            this.step = e.body.step || 0;
            this.$set(this, 'errors', e.body.errors)
          } else {
            this.$set(this, 'errors', {})
            swal({
              title: "Ошибка передачи данных",
              text: e.status === 500 ? 'Ошибка сервера': e.body.message,
              timer: 2000,
              showConfirmButton: false,
              type: "error",
            });
          }
        }
      }
    });
  }
});