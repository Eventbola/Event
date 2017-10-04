@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('after-styles')
    <link rel="stylesheet"
          href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}"/>

    <style>

        #map {
            width: 580px;
            height: 300px;
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

         */
        .jssorb051 .i {
            position: absolute;
            cursor: pointer;
        }

        .jssorb051 .i .b {
            fill: #fff;
            fill-opacity: 0.5;
            stroke: #000;
            stroke-width: 400;
            stroke-miterlimit: 10;
            stroke-opacity: 0.5;
        }

        .jssorb051 .i:hover .b {
            fill-opacity: .7;
        }

        .jssorb051 .iav .b {
            fill-opacity: 1;
        }

        .jssorb051 .i.idn {
            opacity: .3;
        }
    </style>
    <style>
        .jssora051 {
            display: block;
            position: absolute;
            cursor: pointer;
        }

        .jssora051 .a {
            fill: none;
            stroke: #fff;
            stroke-width: 360;
            stroke-miterlimit: 10;
        }

        .jssora051:hover {
            opacity: .8;
        }

        .jssora051.jssora051dn {
            opacity: .5;
        }

        .jssora051.jssora051ds {
            opacity: .3;
            pointer-events: none;
        }
    </style>

    <style type="text/css">
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
            height: 250px;
            padding-top: 20px;
            box-shadow: 0 60px 90px -90px rgba(0, 0, 0, .75);
            background: url('http://i.imgur.com/npRXN3Z.jpg');
        }

        .content-wrapper {
            margin: -220px auto 20px;
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

        .wrapper {
            display: inline-flex;
            margin: 0;
            padding: 0;
            align-items: center;
            justify-content: center;
            height: 50px;
        }

        i {
            padding: 0px 10px;
        }

        .wrapper i:nth-child(1) {
            color: #4867AA;
            cursor: pointer;
            text-shadow: 0px 7px 10px rgba(0, 0, 0, 0.4);
            transition: all ease-in-out 150ms;
        }

        .wrapper i:nth-child(1):hover {
            margin-top: -10px;
            text-shadow: 0px 16px 10px rgba(0, 0, 0, 0.3);
            transform: translate(0, -8);
        }

        .wrapper i:nth-child(2) {
            color: #1DA1F2;
            cursor: pointer;
            text-shadow: 0px 7px 10px rgba(0, 0, 0, 0.4);
            transition: all ease-in-out 150ms;
        }

        .wrapper i:nth-child(2):hover {
            margin-top: -10px;
            text-shadow: 0px 16px 10px rgba(0, 0, 0, 0.3);
            transform: translate(0, -8);
        }

        .wrapper i:nth-child(3) {
            color: #813DB4;
            cursor: pointer;
            text-shadow: 0px 7px 10px rgba(0, 0, 0, 0.5);
            transition: all ease-in-out 150ms;
        }

        .wrapper i:nth-child(3):hover {
            margin-top: -10px;
            text-shadow: 0px 14px 10px rgba(0, 0, 0, 0.4);
            transform: translate(0, -5);
        }

        .wrapper i:nth-child(4) {
            color: #fffc00;
            cursor: pointer;
            text-shadow: 0px 7px 10px rgba(0, 0, 0, 0.4);
            transition: all ease-in-out 150ms;
        }

        .wrapper i:nth-child(4):hover {
            margin-top: -10px;
            text-shadow: 0px 16px 10px rgba(0, 0, 0, 0.3);
            transform: translate(0, -8);
        }

        /*.invisible {*/
        /*visibility: hidden;*/
        /*}*/
        /*.container {*/
        /*width: 375px;*/
        /*}*/
        .tags-container {
            margin: 10px;
            display: flex;
            flex-wrap: wrap;
            border: solid 1px #cfd7e6;
        }

        .tags-container > input {
            flex: 1 0 auto;
            margin: 5px;
            border: none;
        }

        .tags-container > input:focus {
            outline: none;
        }

        .tag {
            margin: 5px;
            background-color: #eceff2;
            padding: 2px 24px 2px 8px;
            font-size: 15px;
            color: #2a4a4b;
            position: relative;
            border-radius: 4px;
            display: inline-block;
            max-width: 161px;
            white-space: nowrap;
            text-align: center;
            text-overflow: ellipsis;
            overflow: hidden;
            box-sizing: border-box;
        }

        .tag::after {
            content: 'x';
            position: absolute;
            right: 6px;
            top: 2px;
            font-size: 12px;
            color: #a7b8d1;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <label style="font-size: 30px">Create an Event</label>
        <hr>
        <div class="row">
            <div class="col-md-12" style="width: 70%">
                <form class="form-horizontal" action="{{route('store001')}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3>Basic Info</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{trans('meta.event.photo')}} </label>
                        <div class=" col-md-9 ">
                            <input class="from-control"
                                   type="file"
                                   required="required"
                                   name="image"
                                   placeholder="put your image here">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{{trans('meta.event.name')}}</label>
                        <div class="col-md-9">
                            <input class="form-control"
                                   type="text"
                                   required="required"
                                   name="event_name"
                                   placeholder="Add a short, clear name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-3 control-label">Location</label>
                        <div class="col-md-9">
                            {{--<input class="form-control"--}}
                            {{--type="text"--}}
                            {{--value="{{$event->location}}"--}}
                            {{--required="required"--}}
                            {{--name="location"--}}
                            {{--placeholder="include a place or address">--}}
                            <input id="pac-input"
                                   class="form-control"
                                   type="text"
                                   name="location"
                                   placeholder="put your location here or search by google map"
                                   required="required"
                                   style=" width: 400px">
                            <input class="form-control" type="hidden" name="lat" id="lat">
                            <input class="form-control" type="hidden" name="lng" id="lng">
                            <div id="map"></div>

                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"
                                    async defer></script>


                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Start Time</label>
                        <div class="col-md-9" style="width: 50%">
                            <div class='input-group date ' id='datetimepicker6'>
                                <input type='text'
                                       name="time_start"
                                       required="required"
                                       class="form-control"/>
                                <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> End Time</label>
                        <div class="col-md-9" style="width: 50%">
                            <div class='input-group date ' id='datetimepicker7'>
                                <input type='text'
                                       name="time_end"
                                       required="required"
                                       class="form-control"/>
                                <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <h3>Details</h3>
                    Let people know what type of event you're hosting and what to expect
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                                        <textarea class="form-control textarea"
                                                  rows="6"
                                                  name="description"
                                                  id="Message"
                                                  required="required"
                                                  placeholder="Tell people more a bout event"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Keywords</label>
                        <div class="col-md-9" style="margin-left: -10px;margin-top: -4px">
                            <div id="tags" class="tags-container">
                                <input id="search"
                                       type="text"
                                       name="keyword"
                                       placeholder="type and enter"/>


                            </div>
                            {{--<input class="form-control"--}}
                            {{--type="text"--}}
                            {{--name="keyword"--}}
                            {{--required="required"--}}
                            {{--placeholder="Type and select keyword from the list of results">--}}
                            {{--<input type="text"--}}
                            {{--name="keyword"--}}
                            {{--data-role="tagsinput"--}}
                            {{--class="form-control">--}}
                            {{--<input type="text"--}}
                            {{--value=""--}}
                            {{--name="keyword"--}}
                            {{--data-role="tagsinput"--}}
                            {{--placeholder="Add keyword"/>--}}

                        </div>
                    </div>

                    <hr>
                    <h3> Tickets</h3>
                    Let people know where they can get tickets for your event
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ticket URL</label>
                        <div class="col-md-9">
                            <input class="form-control"
                                   type="text"
                                   name="ticket_url"
                                   required="required"
                                   placeholder="Add a link to your ticket website">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>


        </div>
    </div>
    </div>
@endsection
@section('after-scripts')
    <script type="text/javascript"
            src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/moment/src/moment.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker6').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });
            $('#datetimepicker7').datetimepicker({
                useCurrent: false, //Important! See issue #1075
                format: 'YYYY-MM-DD HH:mm:ss'
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
    <script>
        function initAutocomplete() {
            var myLatLng = {lat: 11.562108, lng: 104.888535};
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 6,
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
                    var marker = new google.maps.Marker({
                        position : place.geometry.location,
                        map : map,
                        draggable : true,
                    });
                    var location = place.geometry.location;

                    var lat = location.lat();
                    var lng = location.lng();
                    $('#lat').val(lat);
                    $('#lng').val(lng);

                    // Create a marker for each place.
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
@endsection
