document.addEventListener('DOMContentLoaded', function () {
    $(function () {
        if ($('.datetimepicker').length < 1) {
            return;
        }

        $('.datetimepicker').datetimepicker({
            defaultDate: moment().format('YYYY-MM-DD HH:mm:ss'),
            format: 'YYYY-MM-DD HH:mm:ss',
            locale: $('html').attr('lang'),
            icons: {
                time: "icon-clock",
                date: "icon-calendar",
                up: "icon-arrow-up",
                down: "icon-arrow-down",
                previous: 'icon-arrow-left',
                next: 'icon-arrow-right',
            }
        });
    });

    $(function () {
        if ($('.datepicker').length < 1) {
            return;
        }

        $('.datepicker').datetimepicker({
            defaultDate: moment().format('YYYY-MM-DD'),
            viewMode: 'days',
            minDate: '2014-01-01',
            maxDate: moment().add(1, 'days').format('YYYY-MM-DD'),
            format: 'YYYY-MM-DD',
            locale: $('html').attr('lang'),
            icons: {
                time: "icon-clock",
                date: "icon-calendar",
                up: "icon-arrow-up",
                down: "icon-arrow-down",
                previous: 'icon-arrow-left',
                next: 'icon-arrow-right',
            }
        });
    });

    if (document.getElementById('select-news') != null) {

        $('#select-news').on('change dp.change', function (e) {
            if (e.oldDate != null) {
                document.location.href = document.location.pathname + '?date=' + $('#select-news > input').val();
            }
        });
    }


    /**
     * Booking
     */
    $(function () {


        $('.datepicker-booking').datetimepicker({
            viewMode: 'days',
            minDate: moment().format('YYYY-MM-DD'),
            format: 'YYYY-MM-DD',
            locale: $('html').attr('lang'),
            icons: {
                time: "icon-clock",
                date: "icon-calendar",
                up: "icon-arrow-up",
                down: "icon-arrow-down",
                previous: 'icon-arrow-left',
                next: 'icon-arrow-right',
            }
        });

        $('#select-booking-from').on('change dp.change', function (e) {
            if (e.oldDate != null) {
                console.log(e);
                $('#checkin_year_month').val(e.date.format('YYYY-M'));
                $('#checkin_monthday').val(e.date.format('D'));
            }
        });

        $('#select-booking-to').on('change dp.change', function (e) {
            if (e.oldDate != null) {
                console.log(e);
                $('#checkout_year_month').val(e.date.format('YYYY-M'));
                $('#checkout_monthday').val(e.date.format('D'));
            }
        });
    })


    /**
     * Filter
     */

    $(function () {
        if ($('.datepicker-filter').length < 1) {
            return;
        }

        $('.datepicker-filter').datetimepicker({
            defaultDate: moment().format('YYYY-MM-DD'),
            viewMode: 'days',
            minDate: '2016-01-01',
            maxDate: moment().add(1, 'year').format('YYYY-MM-DD'),
            format: 'YYYY-MM-DD',
            locale: $('html').attr('lang'),
            icons: {
                time: "icon-clock",
                date: "icon-calendar",
                up: "icon-arrow-up",
                down: "icon-arrow-down",
                previous: 'icon-arrow-left',
                next: 'icon-arrow-right',
            }
        });
    });

});