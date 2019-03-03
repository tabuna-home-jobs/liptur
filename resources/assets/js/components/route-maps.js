document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('route-item') == null) {
        return;
    }

    var gmp = new Vue({
        el: '#route-item',
        data: {
            'routes': [],
            language: $('#html').attr('lang'),
        },
        methods: {
            waypoints: function (coords) {
                var result = [];

                for (var i = 1; i < coords.length - 1; ++i) {
                    result.push({
                        location: coords[i],
                        stopover: false
                    });
                }

                return result;
            },
            render: function (coords) {
                if (coords.length < 2) {
                    this.directionsDisplay.setMap(null);
                    return;
                }

                //console.log(this.map);

                this.directionsDisplay.setMap(this.map.map);
                this.directionsDisplay.setOptions({
                    suppressMarkers: true
                });

                var waypoints = this.waypoints(coords);

                var request = {
                    origin: coords[0],
                    waypoints: waypoints,
                    destination: coords[coords.length - 1],
                    travelMode: google.maps.TravelMode.DRIVING
                };

                this.directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        this.directionsDisplay.setDirections(response);
                    }
                }.bind(this));
            }
        },
        mounted: function () {
            this.map = new GMaps({
                el: '#route-item-maps',
                lat: 52.6121996,
                lng: 39.5981225,
                zoom: 8,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                height: '40vh'
            });

            this.directionsService = new google.maps.DirectionsService();
            this.directionsDisplay = new google.maps.DirectionsRenderer();

            this.routes = $('#route-item').data('route');

            var route = [];
            var bounds = new google.maps.LatLngBounds();

            for (var i = 0; i < this.routes.length; i++) {
                var elem = this.routes[i];
                var pos = elem.position;

                var coord = new google.maps.LatLng({
                    lat: pos.lat,
                    lng: pos.lng
                });

                route.push(coord);
                bounds.extend(coord);

                var content = "<div class='card-maps'>" + (i + 1) + '. ' + elem.description + "</div>";

                if (typeof elem.icon === 'undefined') {
                    elem.icon = '/dist/svg/maps/administration.svg';
                }


                this.map.addMarker({
                    lat: pos.lat,
                    lng: pos.lng,
                    icon: {
                        url: elem.icon,
                        scaledSize: new google.maps.Size(45, 48)
                    },
                    infoWindow: {
                        content: content,
                        maxWidth: 400,
                    }
                });
            }

            this.render(route);
            this.map.map.fitBounds(bounds);
            this.map.map.panToBounds(bounds);
        }
    });
});