<!DOCTYPE html>
<html>
<head>
    <title>Place details</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <script>
        function initAutocomplete() {
            var myLatLng = {lat: 11.562108, lng: 104.888535};
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 8,
                mapTypeId: 'roadmap'
            });
            google.maps.event.addListener(map, 'click', function(event){
                // Add marker
                addMarker({coords:event.latLng});
            });

            for(var i = 0;i < markers.length;i++){
                // Add marker
                addMarker(markers[i]);
            }

            // Add Marker Function
            function addMarker(props){
                var marker = new google.maps.Marker({
                    position:props.coords,
                    map:map,
                    //icon:props.iconImage
                });

                // Check for customicon
                if(props.iconImage){
                    // Set icon image
                    marker.setIcon(props.iconImage);
                }

                // Check content
                if(props.content){
                    var infoWindow = new google.maps.InfoWindow({
                        content:props.content
                    });

                    marker.addListener('click', function(){
                        infoWindow.open(map, marker);
                    });
                }
            }
        }

    </script>

</head>
<body>
<input id="pac-input"
       class="form-control"
       type="text"
       name="location-test"

       required="required"
       style=" width: 400px">
<div id="map" style="width:80%;height:400px;margin: auto"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>