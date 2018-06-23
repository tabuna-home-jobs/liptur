if (document.getElementById('newletter')) {
    new Vue({
        el: '#newletter',
        data: {
            'email': null,
        },
        methods: {
            send: function () {

                this.$http.post('/api/newsletter', {
                    'email': this.email
                }).then(function (response) {
                    swal({
                        title: response.data.title,
                        text: response.data.message,
                        timer: 2000,
                        showConfirmButton: false,
                        type: response.data.type,
                    });
                }, function (response) {
                    swal({
                        title: response.data.title,
                        text: response.data.message,
                        timer: 2000,
                        showConfirmButton: false,
                        type: response.data.type,
                    });
                });
            }
        }
    });
}