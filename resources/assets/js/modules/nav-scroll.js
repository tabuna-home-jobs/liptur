if ($(".navbar-scroll")[0]) {
//jQuery to collapse the navbar on scroll
    $(window).scroll(function () {
        if ($(".navbar-scroll.navbar").offset().top > 50) {
            $(".navbar-scroll.navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-scroll.navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });

//jQuery for page scrolling feature - requires jQuery Easing plugin
    $(function () {
        $('a.page-scroll').bind('click', function (event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });
}
