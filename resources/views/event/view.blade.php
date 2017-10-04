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
        var markers = [];
        var Locations = [];
                @foreach($locations as $index => $location)
                 var item = [];
                item.push('title');
                item.push({{ $location->lat }})
                item.push({{ $location->lng }})
                item.push({{ $index }})
                Locations.push(item);
        @endforeach

        function setMarkers(datalocations, map) {
            for (var i = 0; i < datalocations.length; i++) {

                var myLatLng = new google.maps.LatLng(datalocations[i][1], datalocations[i][2]);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    title: datalocations[i][0],
                    zIndex: datalocations[i][3]
                });

                // Push marker to markers array
                markers.push(marker);
            }
            return markers;
        }

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: {lat: 11.562108, lng: 104.888535}
                });
            setMarkers(Locations, map);

//            var mylatlng={lat: parseFloat(Locations[0]['lat']), lng: parseFloat(Locations[0]['lng'])};
//            console.log(parseFloat(Locations[0]['lat']),parseFloat(Locations[0]['lng']));
//            var marker = new google.maps.Marker({
//                position: mylatlng,
//                map: map
//            });
        }
    </script>

</head>
<body>
            <div id="map" style="width:80%;height:400px;margin: auto"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"
        async defer></script>

</body>
</html>