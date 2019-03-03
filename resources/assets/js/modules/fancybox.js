$(document).ready(function () {

    $('#investor-content img').each(function () {
        $(this).wrap($('<a data-fancybox="investor" href="' + $(this).attr('src') + '" />'));
    });

});