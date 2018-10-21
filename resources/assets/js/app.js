Vue.http.headers.common['X-CSRF-TOKEN'] = $('[name="csrf_token"]').attr('content');
Vue.http.options.emulateJSON = true;

$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')}
    });
});

moment.locale($('html').attr('lang'));
