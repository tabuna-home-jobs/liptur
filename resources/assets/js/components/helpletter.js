if (document.getElementById('helpletter')) {
  new Vue({
    el: '#helpletter',
    components: { 'vue-recaptcha': VueRecaptcha },
    data: {
      formData: {},
      errors: {}
    },
    methods: {
      onVerify: function (response) {
        this.formData['g-recaptcha-response'] = response
      },
      onExpired: function () {
        this.formData['g-recaptcha-response'] = undefined
      },
      send: function () {
        this.errors = {}
        const data = $.extend({}, this.formData)
        this.$http.post('/' + $('html').attr('lang') + '/helpletter', data).then(function (response) {
          swal({
            title: response.data.title,
            text: response.data.message,
            timer: 2000,
            showConfirmButton: false,
            type: response.data.type,
          });
          this.errors = {};
          this.formData = {};
          this.resetRecaptcha();
        }).catch(function (e) {
          this.errors = e.body
        });
      },
      resetRecaptcha: function () {
        this.$refs.recaptcha.reset()
      },
    }
  });
}