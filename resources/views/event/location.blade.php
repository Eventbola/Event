<!DOCTYPE html>
<html>
<head>
    <title>Place details</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        #map {
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function initAutocomplete() {
            var myLatLng = {lat: 11.562108, lng: 104.888535};
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 8,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {

                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {


                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
//                    var icon = {
//                        url: place.icon,
//                        size: new google.maps.Size(71,71),
//                        origin: new google.maps.Point(0, 0),
//                        anchor: new google.maps.Point(17, 34),
//                        scaledSize: new google.maps.Size(25, 25)
//                    };
                    var marker = new google.maps.Marker({
                        position : place.geometry.location,
                        map : map,
                        draggable : true,
                    });
                    var location = place.geometry.location;

                    var lat = location.lat();
                    var lng = location.lng();

//                    $('#latlang').text(lat + ' ' +lng);
                      $('#lat').val(lat);
                      $('#lng').val(lng);

                    // Create a marker for each place.
//                    markers.push(new google.maps.Marker({
//                        map: map,
//                        icon: icon,
//                        title: place.name,
//                        position: place.geometry.location
//                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

    </script>

</head>
<body>
 <div class="container-fluid">
     <form class="" action="{{route('store')}}">
         {{csrf_field()}}
         <div class="form-group">
             <input id="pac-input"
                    class="form-control"
                    type="text"
                    name="name_location"
                    required="required"
                    style=" width: 400px">
             <div id="map" style="width:80%;height:400px;margin: auto"></div>

         </div>
         <div class="form-group">
              <div class="row">
                  <div class="col-md-3">
                      <label>lat</label>
                  </div>
                  <div class="col-md-9">
                      <input class="form-control" type="hidden" name="lat" id="lat">
                  </div>
              </div>
         </div>
         <div class="form-group">
             <div class="row">
                 <div class="col-md-3">
                     <label>lng</label>
                 </div>
                 <div class="col-md-9">
                     <input class="form-control" type="hidden" name="lng" id="lng">
                 </div>
             </div>
         </div>
         <div class="form-group">
             <button class="btn btn-success">submit</button>
         </div>
     </form>

 </div>

        {{--<div id="latlang"></div>--}}

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"
        async defer></script>

</body>
</html>