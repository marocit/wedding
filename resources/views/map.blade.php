@extends('layouts.master')

@section('content')


  <section id="map" class="hero is-fullheight"></section>

@endsection

<script>
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById("map"), {
          center:{
            lat: 52.514582433111215,
            lng: 13.673931038623095
          },
          zoom: 8,
          // mapTypeId: 'terrain',
          scrollwheel: true,
          streetViewControl: false,
          mapTypeControl: false,
          navigationControl: 1,styles:[{"stylers":[{"saturation":-100}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#0099dd"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#aadd55"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"}]},{}],
        });

        var url = '/fetch'
        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {



          var baloons = [
            '/images/balloon.png',
            '/images/1.png',
            '/images/2.png',
            '/images/3.png',
            '/images/4.png',
            '/images/5.png',
          ];
          // var image = 'http://wedding.dev/images/balloon.png';
        for(i = 0; i < data.length; i++) {
          var image = baloons[Math.floor(Math.random() * baloons.length)];
          var latLng = new google.maps.LatLng(data[i].lat,data[i].lng);
          var marker = new google.maps.Marker({
            position: latLng,
            title: data[i].title,
            animation: google.maps.Animation.DROP,
            map: map,
            icon: image
          });
        }
        marker.addListener('click', toggleBounce);

        function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        }
        });
      }
</script>

