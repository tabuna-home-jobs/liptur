$('.click').click(function () {
    var target = $(this).data("target");
    var toggle = $(this).data("toggle");

    if ($(target).hasClass(toggle)) {
        $(target).removeClass(toggle);
    }
    else {
        $(target).addClass(toggle);
    }
});


$('.click-visually').click(function () {
    var target = $(this).data("target");
    var toggle = $(this).data("toggle");

    if ($(target).hasClass(toggle)) {
        $(target).removeClass(toggle);
        $.fn.matchHeight._update();
        $.fn.matchHeight._update();
    }
    else {
        $(target).addClass(toggle);
        $.fn.matchHeight._update();
        $.fn.matchHeight._update();
    }
});

