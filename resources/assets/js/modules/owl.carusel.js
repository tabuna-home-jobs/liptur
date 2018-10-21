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
            800: {
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
        autoplay: false,
        center: false,
        autoplayHoverPause: true,
        navText: [
            '<i class="icon-arrow-left"></i>',
            '<i class="icon-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 2,
                stagePadding: 5,
                nav:false,
                loop: false,
                /*autoWidth:true,
                autoHeight:true,*/
            },
            767: {
                items: 6,
                margin: 5,
                stagePadding: 5,
              },
            1200: {
                items: 7,
                margin: 10,
                stagePadding: 5,
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
                margin: 50,
                stagePadding: 20,
            },
            767: {
                items: 4,
                margin: 20,
                stagePadding: 15,
              },
            1200: {
                items: 6,
                margin: 40,
                stagePadding: 15,
            }
        }
    });
    

    
    $('.main-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        nav: false,
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