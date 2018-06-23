document.addEventListener('DOMContentLoaded', function () {
  if (document.getElementById('global-map-wrapper') == null) {
    return;
  }

  window.idObject = [];
  window.markersArray = [];

  window.globalMaps = new Vue({
    el: '#global-map-wrapper',
    data: {
      'types': null,
      'place': {},
      'map': null,
      language: $('#html').attr('lang'),
      collapsed: true
    },
    mounted: function () {
      this.map = new GMaps({
        el: '#global-map',
        lat: 52.6121996,
        lng: 39.5981225,
        zoom: 8,
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: false,
        //height: '86vh'
      });

      $('.global-maps-menu-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        margin: 15,
        navText: [
          '<i class="icon-arrow-left"></i>',
          '<i class="icon-arrow-right"></i>'
        ],
        responsive: {
          0: {
            items: 4
          },
          600: {
            items: 10
          },
          1000: {
            items: 14
          }
        }
      });
    },
    methods: {
      load: function (type) {
        console.log("asfasfas")
        var lang = this.language;
        this.$http.get('/' + lang + '/maps/' + type).then(function (response) {
          //console.log(response);
          this.place = response.body;
          //console.log(this.place);
        }.bind(this));


        setTimeout(this.show, 1000);
      },
      show: function () {
        console.log("Asfasfas")
        this.map.markers.forEach(function (marker) {
          marker.setMap(null)
        });

        var bounds = new google.maps.LatLngBounds();

        Object.keys(this.place).map(function (key) {

          var item = this.place[key];

          var image = (item.image == null) ? '' : '';//"<img src='" + item.image + "' class='img-responsive'>";
          var title = (item.display.mapUrl == true) ? "<a href='/catalog/" + item.type + "/" + item.slug + "' class='h5'>" + item.name + "</a>" : '<p class="h5">' + item.name + '</p>';//"<img src='" + item.image + "' class='img-responsive'>";
          var description = (item.description != ' ...') ? "<p class='description_marker'>" + item.description + "</p>" : "<p>" + item.place.name + "</p>";//"<img src='" + item.image + "' class='img-responsive'>";


          var marker = globalMaps.map.addMarker({
            lat: item.place.lat,
            lng: item.place.lng,

            icon: {
              url: item.display.svg,
              scaledSize: new google.maps.Size(45, 48)
            },

            infoWindow: {
              id: item.id,
              image: item.image,
              name: item.name,
              address: item.place.name,

              content: "<button type='button' class='save_infowindow_btn' id='save_infowindow_btn" + item.id + "'>Добавить в маршрут</button><div class='card-maps' id='element-" + item.id + "'>" + title + description + "</div>",
              maxWidth: 400
            }
          });
          window.markersArray.push(marker);

          loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

          bounds.extend(loc);

        }.bind(this));

        this.map.fitBounds(bounds);

        this.map.panToBounds(bounds);

      }
    }
  });
});


if (document.getElementById('global-map')) {
  $(".adb").hide("slow");
  $("#footer").hide("slow");
  $("body").css("overflow", "hidden");
}