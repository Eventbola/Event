
@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('after-styles')
    <link rel="stylesheet" href="{{asset('library/bootstrap/css/fullcalendar.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="{{route('today')}}" class="list-group-item">today</a>
                    <a href="{{route('tomorrow')}}" class="list-group-item">Tomorrow</a>
                    <a href="{{route('week')}}" class="list-group-item">This week</a>
                    <a href="{{route('month')}}" class="list-group-item">This month</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="list-group" style="border-radius:8px">
                        @foreach($events as $event)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-3"><img src="/image/{{$event->image}}" style="width: 150px;height: 100px" class="img-responsive"></div>
                                    <div class="col-md-9" style="line-height: 100%">
                                           <p style="font-weight: bold;color: red">{{$event->title}}</p>
                                           <p >{{$event->description}}</p>
                                           <p>{{$event->time_start}}</p>
                                           <p>{{$event->location}}</p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('after-scripts')--}}
    {{--<script src="{{ asset('library/bootstrap/js/jquery-ui.min.js')}}"></script>--}}
    {{--<script src="{{ asset('library/bootstrap/js/moment.min.js')}}"></script>--}}
    {{--<script src="{{ asset('library/bootstrap/js/fullcalendar.min.js')}}"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('#calendar').fullCalendar({--}}
                {{--googleCalendarApiKey: 'AIzaSyC5vv_qg1BTxSVcaa-nIeCP35wUnef6iDE',--}}
                {{--header: {--}}
                    {{--left: 'prev,next today',--}}
                    {{--center: 'title',--}}
                    {{--right: 'listDay,listWeek,month'--}}
                {{--},--}}

                {{--views: {--}}
                    {{--listDay: {buttonText: 'list day'},--}}
                    {{--listWeek: {buttonText: 'list week'},--}}
                {{--},--}}
                {{--events: [--}}
                            {{--@foreach($events as $event)--}}
                            {{--{--}}
                                {{--title: '{{ $event->title}}',--}}
                                {{--start: '{{ $event->time_start }}',--}}
                                {{--url: '{{ route('page', $event->id) }}'--}}
                            {{--},--}}
                    {{--@endforeach--}}
                {{--]--}}
            {{--});--}}

            {{--$(document).on('click', '#tomorrow', function () {--}}
                {{--console.log(new Date().getFullYear());--}}
                {{--$('#calendar').fullCalendar('today');--}}
            {{--})--}}
        {{--});--}}

    {{--</script>--}}
{{--@endsection--}}



