$(function () {
    if (document.getElementById('like')) {
        new Vue({
            'el': '#like',
            data: {
                status: false,
                count: null,
                submit: false,
            },
            mounted: function () {
                this.status = $('#like').data('status');
                this.count = $('#like').data('count');
                this.id = $('#like').data('id');
            },
            methods: {
                like: function (event) {

                    if (!this.submit) {
                        this.submit = true;


                        this.$http.put('/' + $('html').attr('lang') + '/like/' + this.id).then(function (response) {
                        });

                        (this.status) ? this.count-- : this.count++;
                        this.status = !this.status;
                        this.submit = false;

                    }

                }
            }
        });
    }
});