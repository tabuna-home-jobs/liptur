$(document).ready(function () {
    if (document.getElementById('map-event')) {
        var option = document.getElementById('map-event').dataset;
        var map;

        $(document).ready(function () {
            map = new GMaps({
                el: '#map-event',
                lat: parseFloat(option.lat),
                lng: parseFloat(option.lng),
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                height: '500px',
            });

            //console.log("paaaaaaaapapapap");


            if (typeof option.image === 'undefined') {
                option.image = '/dist/svg/maps/administration.svg';
            }

            map.addMarker({
                lat: parseFloat(option.lat),
                lng: parseFloat(option.lng),
                title: option.name,

                icon: {
                    url: option.image,
                    scaledSize: new google.maps.Size(45, 48)
                },

                infoWindow: {
                    content: '<p>' + option.name + '</p>'
                }
            });


        });
    }


    document.addEventListener('DOMContentLoaded', function () {
        if (!document.getElementById('map-contact')) {
            return;
        }

        var map = new GMaps({
            el: '#map-contact',
            lat: 52.6046077,
            lng: 39.5722640,
            zoom: 13,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
            height: '300px',
        });

        map.addMarker({
            lat: 52.611772,
            lng: 39.5969189,
            infoWindow: {
                content: '<p>ОКУ «Центр кластерного развития туризма Липецкой области»</p>'
            }
        });

        map.addMarker({
            lat: 52.592148,
            lng: 39.562698,
            infoWindow: {
                content: '<p>ОАУ «Областной Центр событийного туризма»</p>'
            }
        });
    });

    $(document).ready(function () {
        $('.maps').click(function () {
            $('.maps .gm-style').css("pointer-events", "auto");
        });

        $(".maps").mouseleave(function () {
            $('.maps .gm-style').css("pointer-events", "none");
        });
    });


    if (document.getElementById('map-route')) {

        var option = document.getElementById('map-route').dataset;
        var routes = JSON.parse(option.route);

        console.log(routes);

        var map;
        $(document).ready(function () {
            map = new GMaps({
                el: '#map-route',
                //lat: parseFloat(option.lat),
                //lng: parseFloat(option.lng),
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                height: '500px',
            });

            /*
             map.addMarker({
             lat: parseFloat(option.lat),
             lng: parseFloat(option.lng),
             title: option.name,
             infoWindow: {
             content: '<p>'+ option.name +'</p>'
             }
             });
             */
        });
    }
});



