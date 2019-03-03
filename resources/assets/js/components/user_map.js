document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('global-map-user-wrapper') == null) {
        return;
    }

    window.globalMaps2 = new Vue({
        el: '#global-map-wrapper',
        data: {
            'types': null,
            'place2': {},
            'map': null,
            language: $('#html').attr('lang')
        },
        mounted: function () {

            this.map = new google.maps.Map(document.getElementById('global-map'), {
                center: {lat: 52.6121996, lng: 39.5981225},
                zoom: 9,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                height: '100vh'
            });
        },
        methods: {
            route: function (route_id) {
                var coordinates = [];
                var location = [];

                /*this.map.markers.forEach(function (marker) {
                    marker.setMap(null);
                });*/

                var lang = this.language;
                this.$http.get('/' + lang + '/profile/places/' + route_id).then(function (response) {

                    var parsedBody = JSON.parse(response.bodyText);

                    this.place2 = parsedBody;

                    var bounds = new google.maps.LatLngBounds();
                    console.log(this.place2);
                    for (var i = 0;  i < this.place2.length; i++) {
                        var item = this.place2[i];

                        var image = (item.image == null) ? '' : '';//"<img src='" + item.image + "' class='img-responsive'>";
                        var description = (item.description != ' ...') ? "<p>" + item.description + "</p>" : "<p>" + item.place.name + "</p>";//"<img src='" + item.image + "' class='img-responsive'>";
                        var title = (item.display.mapUrl == true) ? "<a href='/catalog/" + item.type + "/" + item.slug + "' class='h5'>" + item.name + "</a>" : '<p class="h5">' + item.name + '</p>';//"<img src='" + item.image + "' class='img-responsive'>";

                        var marker = new google.maps.Marker({
                            position: {
                                lat: parseFloat(item.place.lat),
                                lng: parseFloat(item.place.lng)
                            },
                            map: this.map,

                            icon: {
                                url: item.display.svg,
                                scaledSize: new google.maps.Size(45, 48)
                            },

                            infoWindow: {
                                content: new google.maps.InfoWindow({
                                    content: "<div class='card-maps' id='element-" + item.id + "'>" + image + title + description + "</div>",
                                }),
                                maxWidth: 400
                            }
                        });

                        marker.addListener('click', function() {
                            this.infoWindow.content.open(this.map, this);
                        });

                        console.log("Marker ",marker);

                        loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                        location.push(loc);

                        coordinates.push({lat: marker.getPosition().lat(), lng: marker.getPosition().lng()});

                        bounds.extend(loc);
                    }

                   var directionsService = new google.maps.DirectionsService;

                    var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
                    var map = this.map;
                    directionsDisplay.setMap(map);

                    var waypoints = [];

                    for (var v = 0; v < location.length; v++) {
                        var address = location[v];
                        if (address !== "") {
                            waypoints.push({
                                location: address,
                                stopover: true
                            });
                        }
                    }

                    if (coordinates.length > 1) {
                        var originAddress = coordinates[0];
                        var destinationAddress = coordinates[1];

                        var request = {
                            origin: originAddress,
                            destination: destinationAddress,
                            waypoints: waypoints,
                            optimizeWaypoints: true,
                            travelMode: 'DRIVING'
                        };

                        directionsService.route(request, function (response, status) {
                            if (status == google.maps.DirectionsStatus.OK) {
                                directionsDisplay.setDirections(response);
                            }
                            else {
                                alert("Что-то пошло нетак");
                            }
                        });
                    }

                    this.map.fitBounds(bounds);

                    this.map.panToBounds(bounds);

                }.bind(this));

            }
        }
    });
});


/*
if (document.getElementById('global-map')) {
    $(".adb").hide("slow");
    $("#footer").hide("slow");
    $("body").css("overflow", "hidden");
}*/
