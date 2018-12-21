if (document.getElementById('modalSeachIn')) {
    var search = new Vue({
        el: '#modalSeachIn',
        data: {
            posts: [],
            loading: false,
            error: false,
            query: '',
            language: $('#html').attr('lang'),
            noresutl: '0'
        },
        methods: {
            search: function () {
                this.error = '';
                this.posts = [];
                this.loading = true;
                this.noresutl = 0;

                this.$http.get('/ru/search?query=' + this.query).then(function (response) {
                    response.body.error ? this.error = response.body.error : this.posts = response.body;
                    if( this.posts.length <= 0 ){
                        this.noresutl = 1;
                    }

                    this.loading = false;

                });

            }
        }
    });
}
