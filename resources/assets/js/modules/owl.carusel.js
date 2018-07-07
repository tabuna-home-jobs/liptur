$(function () {

    $('.poster-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        nav: true,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        margin: 15,
        navText: [
            '<i class="icon-arrow-left"></i>',
            '<i class="icon-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 5
            },
            1000: {
                items: 9
            }
        }
    });

    $('.ad-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        nav: true,
        lazyLoad: true,
        autoplay: true,
        center: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        navText: [
            '<i class="icon-arrow-left"></i>',
            '<i class="icon-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                stagePadding: 20,
            },
            600: {
                items: 5,
                stagePadding: 100,
              },
              1000: {
                items: 7,
                margin: 100,
                stagePadding: 75,
                slideBy: 7,
                nav: true
            }
        }
    });
    
    $('.category-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        lazyLoad: true,
        // center: true,
        navText: [
            '<i class="icon-arrow-left"></i>',
            '<i class="icon-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                stagePadding: 20,
            },
            600: {
                items: 4,
                stagePadding: 100,
              },
              1000: {
                items: 6,
                margin: 76,
                slideBy: 6,
            }
        }
    });

    $('.main-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        nav: true,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        navText: [
            '<i class="icon-arrow-left"></i>',
            '<i class="icon-arrow-right"></i>'
        ],
        items: 1,
    });

    $('.main-carousel-1').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items:1,
        margin:30,
        stagePadding:30,
        smartSpeed:450
    });
        

    $('.secondary-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        nav: true,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        navText: [
            '<i class="icon-arrow-left"></i>',
            '<i class="icon-arrow-right"></i>'
        ],
        items: 1,
    });


    $('.own-content').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: false,
        nav: true,
        lazyLoad: true,
        autoHeight: true,
        autoplay: false,
        navText: [
            '<i class="icon-arrow-left"></i>',
            '<i class="icon-arrow-right"></i>'
        ],
        items: 1,
    });
    
    
});