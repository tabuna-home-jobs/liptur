if (document.getElementById('reservation')) {
    var reservation_app = new Vue({
        el: '#reservation',
        data: {
            'quantity': 1,
            'user_id': reservation["user_id"],
            'post_id': reservation["post_id"],
        },
        methods: {
            send: function () {
                swal({
                        title: "Отправить заявку на бронирование?",
                        text: "Ваша заявка будет отправлена на обработку",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Отправить',
                        cancelButtonText: "Закрыть",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal({
                                title: 'Отправка данных',
                                text: '',
                                type: 'warning',
                                closeOnConfirm: false
                            });
                            if (reservation_app.quantity < 1) {
                                reservation_app.quantity = 1;
                            }
                            if (reservation_app.quantity > 100) {
                                reservation_app.quantity = 100;
                            }
                            reservation_app.$http.post('/api/reservation', {
                                'user_id': reservation_app.user_id,
                                'post_id': reservation_app.post_id,
                                'quantity': reservation_app.quantity,
                                'date': $('#reservationdata').val(),
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
                                    title: "Ошибка передачи данных",
                                    text: "",
                                    timer: 2000,
                                    showConfirmButton: false,
                                    type: "error",
                                });
                            });
                        }
                    });

            },
            minus: function () {
                if (this.quantity > 1) {
                    this.quantity = this.quantity - 1;
                } else {
                    this.quantity = 1;
                }
            },
            plus: function () {
                if (this.quantity < 100) {
                    this.quantity = this.quantity + 1;
                } else {
                    this.quantity = 100;
                }
            }
        },
        mounted: function () {
            $('#reservationdata').datepicker({
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
                    'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
                    'Октябрь', 'Ноябрь', 'Декабрь'],
                dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                firstDay: 1,
                dateFormat: 'yy-mm-dd'
            }).on('changeDate', function () {
                reservation_app.date = $('#reservationdata').val()
            });
        }
    });
}