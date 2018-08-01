var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {


  mix.less('./resources/assets/less/old/app.less', './public/dist/css/orchid.css');
    mix.less('./resources/assets/less/new/app.less', './public/dist/css/shop.css');
  mix.styles('./resources/assets/vendor/summernote/dist/summernote-bs3.css', './public/dist/css/summernote.css');
  mix.copy('./resources/assets/vendor/bootstrap/dist/fonts/', './public/build/dist/fonts');
  mix.copy('./resources/assets/vendor/font-awesome/fonts/', './public/build/dist/fonts');
  mix.copy('./resources/assets/vendor/simple-line-icons/fonts/', './public/build/dist/fonts');
  mix.copy('./resources/assets/fonts/', './public/build/dist/fonts');

  mix.scripts([
    "./resources/assets/vendor/jquery/dist/jquery.min.js",

    './resources/assets/vendor/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
    "./resources/assets/vendor/bootstrap/dist/js/bootstrap.min.js",
    './resources/assets/vendor/matchheight/dist/jquery.matchHeight-min.js',
    './resources/assets/vendor/owl.carousel/dist/owl.carousel.js',
    './node_modules/owl.carousel2.thumbs/dist/owl.carousel2.thumbs.min.js',
    "./resources/assets/vendor/slider-pro/dist/js/jquery.sliderPro.js",
    "./resources/assets/vendor/gmaps/gmaps.min.js",
    "./resources/assets/vendor/onepage-scroll/jquery.onepage-scroll.min.js",
    "./resources/assets/vendor/moment/min/moment-with-locales.js",
    "./resources/assets/vendor/bootstrap-sweetalert/dist/sweetalert.min.js",
    "./resources/assets/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js",
    './resources/assets/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',

    './resources/assets/vendor/jquery.easing/js/jquery.easing.min.js',
    './resources/assets/vendor/waypoints/lib/jquery.waypoints.min.js',
    './resources/assets/vendor/isotope/dist/isotope.pkgd.min.js',

    "./resources/assets/vendor/vue/dist/vue.min.js",
    "./resources/assets/vendor/vue-resource/dist/vue-resource.js",

    "./resources/assets/vendor/fancybox/dist/jquery.fancybox.min.js",

    "./resources/assets/vendor/summernote/dist/summernote.min.js",
    "./node_modules/vue-recaptcha/dist/vue-recaptcha.js",

    "./resources/assets/js/app.js",
    "./resources/assets/js/components/bus.js",
    "./resources/assets/js/components/*",
    "./resources/assets/js/modules/**",
    "./resources/assets/js/components/**",
    "./resources/assets/js/directives/**"
    /* "./resources/assets/vendor/jquery/dist/jquery.ui.touch-punch.min.js"*/
  ], './public/dist/js/orchid.js');

  mix.scripts([
    "./resources/assets/vendor/moment/moment.js",
    "./resources/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js",
    "./resources/assets/vendor/g-map-field/dist/js/index.min.js"
  ], './public/dist/js/g-map-route.js')


  mix.version([
    "dist/css/orchid.css",
    "dist/js/orchid.js"
  ]);
});
