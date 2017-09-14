@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('after-styles')
    <style type="text/css">
        #custom-search-input {
            padding: 3px;
            border: solid 1px #E4E4E4;
            border-radius: 6px;
            background-color: #fff;
        }

        #custom-search-input input {
            border: 0;
            box-shadow: none;
        }

        #custom-search-input button {
            margin: 2px 0 0 0;
            background: none;
            box-shadow: none;
            border: 0;
            color: #666666;
            padding: 0 8px 0 10px;
            border-left: solid 1px #ccc;
        }

        #custom-search-input button:hover {
            border: 0;
            box-shadow: none;
            border-left: solid 1px #ccc;
        }

        #custom-search-input .glyphicon-search {
            font-size: 23px;
        }

        ul.list-actions {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        ul.list-actions li {
            margin-top: 1.5%;
            padding-right: 10px;
            display: inline-block;
            margin-bottom: 1px;
        }

        div.progress {
            height: 5px;
            width: 40%;
            margin-top: 3%;
            margin-bottom: 0px;
            float: right;

        }
    </style>
@endsection()
@section('content')
    <div class="container">
        <div class="row">
            {{--<div class="col-md-12" style="width: 50%">--}}
                {{--<h3 style="color: blue">Manage Events</h3>--}}
                {{--<div id="custom-search-input">--}}
                    {{--<div class="input-group col-md-12">--}}
                        {{--<input type="text" class="form-control input-lg" id="live_search" placeholder="Search for events and attendees"/>--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-info btn-lg" type="button">--}}
                            {{--<i class="glyphicon glyphicon-search"></i>--}}
                        {{--</button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                <br>
                <h4 style="text-align: left"> Posted({{count($events)}})</h4>
                <hr style="border-color: silver; float: left" width="900px">
            </div>
            <div class="col-md-12" id="display">
                @foreach($events as $event)
                    <div class="panel panel-default" style="width: 80%">

                        <div class="panel-body">
                            <div class="col-md-12">
                                <label>{{$event->title}}</label>
                                <br>
                                <label>{{$event->time_start}} &nbsp; &nbsp;{{$event->time_end}}</label>
                                <ul class="list-actions">
                                    <li><a href="edit/{{$event->id}}" class="text-body-medium text-body--faint"><span
                                                    class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                    <li><a href="page/{{$event->id}}"
                                           class="text-body-medium text-color--blue-under"><span
                                                    class="glyphicon glyphicon-file"></span>View</a></li>
                                    <li><a href="delete/{{$event->id}}" class="text-body-medium text-color--blue-under"><span
                                                    class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                    <li><a href="#" class="text-body-medium text-color--blue-under"><span
                                                    class="fa fa-users"></span>invite</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection

{{--@section('after-scripts')--}}

    {{--<script type="text/javascript">--}}
        {{--$(function (){--}}
            {{--$('#live_search').on('keyup', function () {--}}
                {{--var self = $(this);--}}
                {{--$.ajax({--}}
                    {{--type: 'POST',--}}
                    {{--url: '{{ route('live-search') }}',--}}
                    {{--data: {--}}
                        {{--_token: '{{ csrf_token() }}',--}}
                        {{--key: self.val()--}}
                    {{--},--}}
                    {{--success: function (response){--}}
                        {{--var html = '';--}}
                        {{--$.each(response.data, function(key, val){--}}
                           {{--html += '<div class="panel panel-default">' +--}}
                                        {{--'<div class="panel-heading"> ' +--}}
                                                 {{--val.title +--}}
                                        {{--'</div>' +--}}
                                         {{--'<div class="panel-body">'--}}
                                             {{--+ val.location +--}}
                                          {{--'</div>'+--}}
                                        {{--'<div class="panel-footer">'--}}
                                                {{--+ '<button class="btn btn-danger"><a href="delete/{{$event->id}}">delete</a> </button> '+--}}
                                        {{--'</div>'+--}}
                                  {{--'</div>';--}}
                        {{--});--}}

                        {{--$('#display').html(html);--}}
                    {{--},--}}
                    {{--error: function () {--}}

                    {{--}--}}
                {{--})--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}

{{--@endsection--}}