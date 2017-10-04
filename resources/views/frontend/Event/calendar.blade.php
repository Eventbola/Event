@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('after-styles')
    <link rel="stylesheet" href="{{asset('library/bootstrap/css/fullcalendar.min.css')}}">
    <style>

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4" >
                <div class="sidebar" id="sidebar">
                    <div class="panel panel-default " >
                        <div class="panel-heading" style="font-size: 22px">
                            Location
                        </div>
                        <div class="list-group panel-body" >
                            <div id="map" style="width:100%;height:200px;border: 1px solid grey"></div>
                        </div>
                    </div>
                    <div class="panel panel-warning ">
                        <div class="panel-heading" style="font-size: 22px;border: none">Date</div>
                        <div class="list-group " style=" font-size:20px">
                            <a href="{{route('today')}}" class="list-group-item">today</a>
                            <a href="{{route('tomorrow')}}" class="list-group-item">Tomorrow</a>
                            <a href="{{route('week')}}" class="list-group-item">This week</a>
                            <a href="{{route('month')}}" class="list-group-item">This month</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="list-group" style="border-radius:8px">
                    @foreach($events as $event)
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="/image/{{$event->image}}"
                                                           style="width: 150px;height: 100px" class="img-responsive">
                                </div>
                                <div class="col-md-9" style="line-height: 100%">
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i> {{$event->time_start}}</p>
                                    <p style="font-weight: bold;font-size:20px;color: black"> {{$event->title}}</p>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$event->location}}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')
    <scrip></scrip>
    <script>
        var markers = [];
        var Locations = [];
                @foreach($events as $index => $event)
                    var item = [];
                    item.push('{{ $event->title }}')
                    item.push({{ $event->lat }})
                    item.push({{ $event->lng }})
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
                var infowindow = new google.maps.InfoWindow();

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(datalocations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker,i));

                markers.push(marker);
            }
            return markers;
        }

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                center: {lat: 11.562108, lng: 104.888535}
            });
            setMarkers(Locations, map);

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE9rYyj-NUbxuvSJItH1ZI89FxtsYUxgs&libraries=places&callback=initAutocomplete"
            async defer></script>
    {{--<script src="{{ asset('library/bootstrap/js/jquery.sticky-kit.min.js')}}"></script>--}}
    <script src="{{ asset('library/bootstrap/js/jquery.sidebarFix.js')}}"></script>
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$("#sidebar").stick_in_parent();--}}

        {{--});--}}
    {{--</script>--}}
    <script type="text/javascript">
        $(window).load(function(){
            $('#sidebar').sidebarFix({
                frame: $('.middle')
            });
        });
    </script>

@endsection



