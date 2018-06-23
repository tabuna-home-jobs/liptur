if (document.getElementById('support')) {
    new Vue({
        el: '#support',
        data: {
            'name': null,
            'email': null,
            'message': null,
            'phone': null,
            'upload': null,
            'process': false,
        },
        methods: {
            send: function () {

                if (this.process == false) {
                    this.process = true;
                    this.button = $('#support .btn-submit');
                    this.button.button('loading');


                    // Полюбому можно лучше записать
                    var formData = new FormData();
                    formData.append('name', this.name);
                    formData.append('email', this.email);
                    formData.append('message', this.message);
                    formData.append('phone', $('#support input[name="phone"]').val());
                    formData.append('upload', this.upload[0]);


                    this.$http.post('/' + $('html').attr('lang') + '/contacts', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(function (response) {


                        this.process = false;
                        this.button.button('reset');
                        $('#support').modal('hide');

                        swal({
                            title: response.data.title,
                            text: response.data.message,
                            timer: 2000,
                            showConfirmButton: false,
                            type: response.data.type,
                        });

                    });
                }
            },
            onFileChange: function (e) {
                this.upload = e.target.files || e.dataTransfer.files;
            }
        }
    });
}