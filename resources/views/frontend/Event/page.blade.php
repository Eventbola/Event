@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('after-styles')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 400px;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        .content-wrapper {
            /*background-color: #00a7d0 !important;*/
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }

        /**
        style background
         */
        @import url(https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700);

        html, body {
            /*font-family: 'Roboto Slab', serif;*/
            background-color: #f2eff7;
        }

        .m-0 {
            margin-top: 0;
        }

        header {
            position: relative;
            height: 450px;
            padding-top: 20px;
            box-shadow: 0 60px 90px -90px rgba(0, 0, 0, .75);
            background: url('http://i.imgur.com/npRXN3Z.jpg');
            min-height: 500px;
        }

        .content-wrapper {
            margin: -400px auto 20px;
        }

        .content-wrapper p {
            margin-bottom: 20px;
            font-size: 19px;
        }

        .contentInner {
            background-color: #fff;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .3);
            float: left;
            position: relative;
            border-radius: 5px;
            padding: 2em;
            font-size: 18px;
            text-align: justify;
            color: #252728;
        }

        /*.navbar-brand,*/
        /*ul.nav.navbar-nav.navbar-right li a {*/
        /*line-height: 100px;*/
        /*height: 100px;*/
        /*padding-top: 0;*/
        /*}*/
    </style>
@endsection
@section('content')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="nav1">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content-wrapper" style="background-color: #f5f8fa">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('request')}}">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$event->id}}">
                        <input name="user_id" type="hidden" value="{{$event->user_id}}">
                        <input type="hidden" value="">
                        @if($eventadmin == null )
                            @if($user_request == null)

                                <button type="submit" class="btn btn-success btn-lg btn-block"
                                        style="width: 17%; margin-left: 81.5%;">Register
                                </button>
                            @else
                                {{--{{dd($user_request[0]->confirmed)}}--}}
                                @if($user_request[0]->confirmed == 0)
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" style="width: 17%; margin-left: 81.5%; height: 48px">
                                            Pandding
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="    width: 17%;
                                                                                                                margin-left: 81.5%;
                                                                                                                height: 31px;
                                                                                                                text-align: -webkit-center;">
                                            <a class="dropdown-item"  style="color: #f1071b" href="{{route('destroyrequest', [$event->id])}}" >Cancel Request</a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </form>
                    {{--@else--}}
                    {{--@if($event->user_id == auth()->id())--}}

                    {{--@else--}}
                    {{--<button type="submit" class="btn btn-success btn-lg btn-block"--}}
                    {{--style="   width: 95%;">Pandding--}}
                    {{--</button>--}}
                    {{--<div class="dropdown" style="float: right;margin-right: 15px;">--}}
                    {{--<button class="btn btn-secondary dropdown-toggle" type="button"--}}
                    {{--id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
                    {{--aria-expanded="false" style="width: 120px;">--}}
                    {{--Pandding--}}
                    {{--</button>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                    {{--<a class="dropdown-item" href="#" >Cancel Request</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--@endif--}}
                    {{--</div>--}}
                </div>

            </div>

            <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                <div class="contentInner themeScroll">
                    <div class="col-xs-8" style="width: 600px; height: 350px">
                        <img style=" width:550px; height: 300px; float: left"
                             src="{{asset('image')}}/{{$event->image}}"
                             alt="no image"
                             class="img-responsive center-block">
                    </div>

                    <div class="col-md-4">
                        <label> {{( new \Carbon\Carbon($event->time_start))->toFormattedDateString()}}</label>
                        <br>
                        <label>{{$event->title}}</label>
                        <p style="font-size: 14px">
                            created by &nbsp; {{$event->user->first_name}} &nbsp; {{$event->user->last_name}}
                        </p>
                    </div>

                    {{--<div class="row">--}}
                    <div class="col-md-7">
                        <div class="form-group">

                            <label>Description:</label>
                            <p style="font-size: 14px">
                                {{$event->description}}

                            </p>


                            <label>Tags</label>
                            <br>
                            <p style="font-size: 14px">{{$event->keyword}}</p>
                            <br>

                            <label>Share with </label>
                            <br>
                            <!-- Your share button code -->
                            {{--<a title="send to Facebook"--}}
                            {{--href="http://www.facebook.com/sharer.php?s=100&p[title]=YOUR_TITLE&p[summary]=YOUR_SUMMARY&p[url]=YOUR_URL&p[images][0]=YOUR_IMAGE_TO_SHARE_OBJECT"--}}
                            {{--target="_blank">--}}

                            <div class="fb-share-button"
                                 data-href="http://127.0.0.1:8000/event/page/"

                                 data-layout="button" data-size="large" data-mobile-iframe="true"><a
                                        class="fb-xfbml-parse-ignore" target="_blank">Share</a></div>

                            {{--<a href="https://www.facebook.com/sharer/sharer.php?u="--}}
                            {{--class="btn btn-social-icon btn-facebook" style="font-size: 23px; padding: 3px">--}}
                            {{--<span class="fa fa-facebook"></span>--}}
                            {{--</a>--}}
                            {{--<a href="" class="btn btn-social-icon btn-instagram" style="font-size: 30px;padding: 3px">--}}
                            {{--<span class="fa fa-instagram"></span>--}}
                            {{--</a>--}}
                            {{--<a class="btn btn-social-icon btn-github" style="font-size: 30px;padding: 3px">--}}
                            {{--<span class="fa fa-github"></span>--}}
                            {{--</a>--}}
                            {{--<a class="btn btn-social-icon btn-dropbox" style="font-size: 30px;padding: 3px">--}}
                            {{--<span class="fa fa-dropbox"></span>--}}
                            {{--</a>--}}

                        </div>


                    </div>
                    <div class="col-md-5">

                        <label>
                            Date and Time
                        </label>
                        <p style="font-size: 14px">
                            {{$event->time_start}} &nbsp; {{$event->time_end}}
                        </p>
                        <label>
                            Location
                            <br>
                            <p style="font-size: 14px">{{$event->location}}</p>
                        </label>
                    </div>
                    {{--</div>--}}


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <hr>
                                <img src="http://i.imgur.com/HB96qd8.jpg" alt=""
                                     class="img-responsive center-block">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <input id="aa" class="form-control" type="text" placeholder="Search Box"
                                   style="position:static; width: 500px" value="{{$event->location}}">
                            <br>
                            <br>
                            <br>
                            <div id="map"></div>
                            <script>
                                // This example adds a search box to a map, using the Google Place Autocomplete
                                // feature. People can enter geographical searches. The search box will return a
                                // pick list containing a mix of places and predicted search terms.

                                // This example requires the Places library. Include the libraries=places
                                // parameter when you first load the API. For example:
                                // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                function initAutocomplete() {
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        center: {lat: 11.562108, lng: 104.888535},
                                        zoom: 13,
                                        mapTypeId: 'roadmap'
                                    });

                                    // Create the search box and link it to the UI element.
                                    var input = document.getElementById('aa');
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
                                            var icon = {
                                                url: place.icon,
                                                size: new google.maps.Size(71, 71),
                                                origin: new google.maps.Point(0, 0),
                                                anchor: new google.maps.Point(17, 34),
                                                scaledSize: new google.maps.Size(25, 25)
                                            };

                                            // Create a marker for each place.
                                            markers.push(new google.maps.Marker({
                                                map: map,
                                                icon: icon,
                                                title: place.name,
                                                position: place.geometry.location
                                            }));

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
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"
                                    async defer></script>

                        </div>
                    </div>
                    <div id="map"></div>
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('after-scripts')
    <script>
        var markers = [];
        var Locations = [];
        var item = [];
        item.push('title');
        item.push({{ $event->lat }})
        item.push({{ $event->lng }})
        Locations.push(item);

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
                zoom: 6,
                center: {lat: 11.562108, lng: 104.888535}
            });
            setMarkers(Locations, map);

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"
            async defer></script>

{{--@section('after-script')--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"--}}
{{--async defer></script>--}}


@endsection