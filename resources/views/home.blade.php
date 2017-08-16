@extends('layouts.master')

@section('content')


    <section class="hero is-light is-large">
        <div id="map" class="mapIndex"></div>
    </section>
    <section class="section">
      <div class="container">
          <div class="columns">
            <div class="column is-half">
              <h1 class="title has-text-danger description">Beschreibung</h1>
                <div class="content">
                <strong>Lieber Finder,<br><br></strong>
                  <p>toll, dass wieder einer der Ballons gefunden wurde. Wir haben sie alle bei unserer Hochzeit am 19. August 2017 von der Galopprennbahn in Hoppegarten starten lassen. Jeder Gast konnte mit einer Postkarte Grüße und Wünsche an das Brautpaar auf die Reise schicken. Wir möchten natürlich gern wissen, wie weit die Wünsche durch den Wind getragen wurden. Schickt bitte die Postkarte zurück und/oder markiert den Fundort hier auf der Karte.
                  <br>
                  <br>
                  Vielen Dank!
                  </p>
                </div>

              <!--   @if($errors->has('lng'))
                  <div class="notification is-warning">
                    <p class="help is-danger">{{ $errors->first('lng') }}</p>
                  </div>
                @endif -->



            </div>
            <div class="column">
                <div class="card">
                  <div class="card-content">
                    {!! Form::open(['method' => 'post', 'route' => 'store', 'files' =>true]) !!}
                       <div class="field">
                            {!! Form::label('searchmap', 'Suche nach Fundort', ['class' => 'label has-text-primary']) !!}
                              <div class="control">
                                {!! Form::text('searchmap', null, ['class' => 'input']) !!}
                              </div>
                       </div>
                      <div class="field">
                          {!! Form::label('title', 'Nachricht an das Brautpaar', ['class' => 'label has-text-primary']) !!}
                                <div class="control">
                                  {!! Form::textarea('title', null, ['class' => 'textarea', 'rows' => 5]) !!}
                                </div>
                                @if($errors->has('title'))
                                  <p class="help is-danger">{{ $errors->first('title') }}</p>
                                @endif
                                @if($errors->has('lng'))
                                  <p class="help is-danger">{{ $errors->first('lng') }}</p>
                                @endif
                      </div>
                        <div class="field is-horizontal is-hidden">
                          <div class="field-label is-normal">
                            {!! Form::label('lat', 'LAT', ['class' => 'label']) !!}
                          </div>
                          <div class="field-body">
                            <div class="field">
                              <div class="control">
                                {!! Form::text('lat', null, ['class' => 'input']) !!}
                              </div>
                              @if($errors->has('lat'))
                                  <p class="help is-danger">{{ $errors->first('lat') }}</p>
                              @endif
                            </div>
                          </div>
                       </div>
                        <div class="field is-horizontal is-hidden">
                          <div class="field-label is-normal">
                            {!! Form::label('lng', 'LNG', ['class' => 'label']) !!}
                          </div>
                          <div class="field-body">
                            <div class="field">
                              <div class="control">
                                {!! Form::text('lng', null, ['class' => 'input']) !!}
                              </div>
                              @if($errors->has('lng'))
                                  <p class="help is-danger">{{ $errors->first('lng') }}</p>
                              @endif
                            </div>
                          </div>
                       </div>
                       <hr>
                          <div class="field is-grouped is-grouped-centered">
                           <!--  <p class="control">
                              {!! Form::submit('Fundort hinzufügen', ['class' => 'button is-primary is-medium']) !!} -->

                            <button type="submit" class="button is-primary is-large">
                              <span class="icon is-medium">
                                <i class="fa fa-location-arrow"></i>
                              </span>
                              <span>Fundort hinzufügen</span>
                            </button>
                          </div>
                          {!! Form::close() !!}
                </div>
            </div>
            </div>
          </div> <!-- end columns -->
      </div> <!-- end container -->
    </section>

  @endsection

   <script>


      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById("map"), {
          center:{
            lat: 52.4970097,
            lng: 13.3306971
          },
          zoom: 15,
          navigationControl: 1,styles:[{"stylers":[{"saturation":-100}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#0099dd"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#aadd55"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"}]},{}],
          disableDefaultUI: true,
          gestureHandling: 'cooperative'
        });



        var marker = new google.maps.Marker({
          position: {
            lat: 52.4970097,
            lng: 13.3306971
          },
          map: map,
          draggable: true
        });

        var input = document.getElementById('searchmap');
        var searchBox = new google.maps.places.SearchBox(input);

        google.maps.event.addListener(searchBox, 'places_changed', function(){

          var places = searchBox.getPlaces();
          var bounds = new google.maps.LatLngBounds();
          var i, place;

          for(i=0; place=places[i]; i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
          }

          map.fitBounds(bounds);
          map.setZoom(15);

        });

        google.maps.event.addListener(marker, 'position_changed', function() {
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();

          $('#lat').val(lat);
          $('#lng').val(lng);
        });



      }



    </script>


