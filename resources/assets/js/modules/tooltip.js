$(function () {

    $('body').tooltip({
        selector: '[rel=tooltip]'
    });

    $('[data-toggle="tooltip"]').tooltip();


    $('[data-toggle="popover"]').popover({
        'html': true,
        'trigger': 'hover'
    });


    /*
     $('[data-toggle="popover"]').on("click", function () {
     this.popover({
     'html': true,
     'trigger': 'hover'
     });
     });
     */

});