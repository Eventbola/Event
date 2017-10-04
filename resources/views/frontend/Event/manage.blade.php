@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('after-styles')
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
        @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

        *, *:before, *:after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100vh;
        }

        body {
            font: 14px/1 'Open Sans', sans-serif;
            color: #555;
            background: #eee;
        }

        h1 {
            padding: 50px 0;
            font-weight: 400;
            text-align: center;
        }

        p {
            margin: 0 0 20px;
            line-height: 1.5;
        }

        main {
            /*min-width: 320px;*/
            /*max-width: 800px;*/
            padding: 50px;
            margin: 0 auto;
            background: #fff;
        }

        section {
            display: none;
            padding: 20px 0 0;
            border-top: 1px solid #ddd;
        }

        input {
            display: none;
        }

        label {
            display: inline-block;
            margin: 0 0 -1px;
            padding: 15px 25px;
            font-weight: 600;
            text-align: center;
            color: #bbb;
            border: 1px solid transparent;
        }

        label:before {
            font-family: fontawesome;
            font-weight: normal;
            margin-right: 10px;
        }

        label[for*='1']:before {
            content: '\f0c5';
        }

        label[for*='2']:before {
            content: '\f0c0';
        }

        label[for*='3']:before {
            content: '\f003';
        }

        label[for*='4']:before {
            content: '\f1a9';
        }

        label:hover {
            color: #888;
            cursor: pointer;
        }

        input:checked + label {
            color: #555;
            border: 1px solid #ddd;
            border-top: 2px solid orange;
            border-bottom: 1px solid #fff;
        }

        #tab1:checked ~ #content1,
        #tab2:checked ~ #content2,
        #tab3:checked ~ #content3,
        #tab4:checked ~ #content4 {
            display: block;
        }

        @media screen and (max-width: 650px) {
            label {
                font-size: 0;
            }

            label:before {
                margin: 0;
                font-size: 18px;
            }
        }

        @media screen and (max-width: 400px) {
            label {
                padding: 15px;
            }
        }

    </style>
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

        /**
        search style
         */
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

        abbr[title] {
            border-bottom: none !important;
            cursor: inherit !important;
            text-decoration: none !important;
        }

        .ScrollStyle {
            max-height: 200px;
            overflow-y: scroll;
            /*overflow-x: scroll;*/
            /*max-width: 1000px;*/
        }
    </style>
@endsection()
@section('content')
    <div class="container">
        <div class="row">
            <h1 style="text-align: left;padding-top: 16px;background-color: white;text-align: left;padding-bottom: 16px">{{ trans('header.frontend.event.manage_event') }}</h1>

            <main>

                <input id="tab1" type="radio" name="tabs" checked>
                <label for="tab1">Posted({{count($events)}})</label>

                <input id="tab2" type="radio" name="tabs">
                <label for="tab2">Requested Events</label>

                <input id="tab3" type="radio" name="tabs" checked>
                <label for="tab3">Invite by Email</label>


                <section id="content1">
                    <div class="row">
                        <div class="col-md-12" id="display">
                            @if(count($events)>0)
                                @foreach($events as $index => $event)
                                    <div class="panel panel-default" style="width: 100%">

                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <span style="color: red">&#9733;</span>
                                                <label><span style="color:#032640;margin-left: -13px"><abbr
                                                                title="Event's title">{{$event->title}}</abbr></span></label>
                                                <br>
                                                <label>{{$event->time_start}} &nbsp; &nbsp;{{$event->time_end}}</label>
                                                <ul class="list-actions" style="margin-left: 25px">
                                                    <li><a href="edit/{{$event->id}}"
                                                           class="text-body-medium text-body--faint"><span
                                                                    class="glyphicon glyphicon-pencil"></span>Edit</a>
                                                    </li>
                                                    <li><a href="page/{{$event->id}}"
                                                           class="text-body-medium text-color--blue-under"><span
                                                                    class="glyphicon glyphicon-file"></span>View</a>
                                                    </li>
                                                    <li><a href="delete/{{$event->id}}"
                                                           class="text-body-medium text-color--blue-under"><span
                                                                    class="glyphicon glyphicon-trash"></span>Delete</a>
                                                    </li>
                                                    <li><a class="text-body-medium text-color--blue-under"><span
                                                                    class="fa fa-users"></span>
                                                        </a>

                                                        <a
                                                                class="btn btn-link btn-xs invite"
                                                                data-toggle="modal"
                                                                data-event-id="{{ $event->id }}"
                                                                data-target="#myModal"
                                                                style="padding: 0.1px 0.1px;
                                                    font-size: 14px;">
                                                            Invite members
                                                        </a>

                                                        <!-- Modal -->

                                                        <div class="modal fade" id="myModal" tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content"
                                                                     style="margin-right: 15%;">
                                                                    <div class="modal-header">
                                                                        <button style="color: red" type="button"
                                                                                class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel">
                                                                            Invite your friend
                                                                            here
                                                                            <br>

                                                                            {{--<span id="id-event"></span>--}}
                                                                            {{--<p style="color: red">T</p>--}}
                                                                            {{--<br>--}}
                                                                            {{--<form id="vanna" class="register-form">--}}
                                                                            {{--<input type="text" placeholder="name"/>--}}
                                                                            {{--<input type="password"--}}
                                                                            {{--placeholder="password"/>--}}
                                                                            {{--<input type="text"--}}
                                                                            {{--placeholder="email address"/>--}}
                                                                            {{--</form>--}}
                                                                            {{--<script src="{{ asset('library/bootstrap/js/jquery.min.js')}}"></script>--}}
                                                                            {{--<script type="text/javascript">--}}
                                                                            {{--$(document).ready(function () {--}}
                                                                            {{--$("#vanna").toggle();--}}
                                                                            {{--$("p").click(function () {--}}
                                                                            {{--$("p").toggle();--}}
                                                                            {{--});--}}
                                                                            {{--});--}}
                                                                            {{--</script>--}}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="modal-body" id="show-users">

                                                                        {{--</div>--}}
                                                                        {{--<div class="modal-footer">--}}
                                                                        {{--</div>--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                    @if($event_members!=null)
                        @foreach($event_members as $event_member)
                            <div class="panel panel-default" style="width: 100%">

                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <label><span style="color:#032640"><abbr
                                                        title="Event's title">{{$event_member->title}}</abbr></span></label>
                                        <br>
                                        <label>{{$event_member->time_start}} &nbsp;
                                            &nbsp;{{$event_member->time_end}}</label>
                                        <ul class="list-actions" style="margin-left: 25px">
                                            {{--<li><a href="edit/{{$event_member->id}}"--}}
                                                   {{--class="text-body-medium text-body--faint"><span--}}
                                                            {{--class="glyphicon glyphicon-pencil"></span>Edit</a>--}}
                                            {{--</li>--}}

                                            <li><a href="page/{{$event_member->id}}"
                                                   class="text-body-medium text-color--blue-under"><span
                                                            class="glyphicon glyphicon-file"></span>View</a>
                                            </li>
                                            {{--<li><a href="delete/{{$event_member->id}}"--}}
                                                   {{--class="text-body-medium text-color--blue-under"><span--}}
                                                            {{--class="glyphicon glyphicon-trash"></span>Delete</a>--}}
                                            {{--</li>--}}

                                            <li><a class="text-body-medium text-color--blue-under"><span
                                                            class="fa fa-users"></span>
                                                </a>

                                                <a
                                                        class="btn btn-link btn-xs invite"
                                                        data-toggle="modal"
                                                        data-event-id="{{ $event_member->id }}"
                                                        data-target="#myModal"
                                                        style="padding: 0.1px 0.1px;
                                                    font-size: 14px;">
                                                    Invite members
                                                </a>

                                                <!-- Modal -->

                                                <div class="modal fade" id="myModal" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content"
                                                             style="margin-right: 15%;">
                                                            <div class="modal-header">
                                                                <button style="color: red" type="button"
                                                                        class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel">
                                                                    Invite your friend
                                                                    here
                                                                    <br>

                                                                    {{--<span id="id-event"></span>--}}
                                                                    {{--<p style="color: red">T</p>--}}
                                                                    {{--<br>--}}
                                                                    {{--<form id="vanna" class="register-form">--}}
                                                                    {{--<input type="text" placeholder="name"/>--}}
                                                                    {{--<input type="password"--}}
                                                                    {{--placeholder="password"/>--}}
                                                                    {{--<input type="text"--}}
                                                                    {{--placeholder="email address"/>--}}
                                                                    {{--</form>--}}
                                                                    {{--<script src="{{ asset('library/bootstrap/js/jquery.min.js')}}"></script>--}}
                                                                    {{--<script type="text/javascript">--}}
                                                                    {{--$(document).ready(function () {--}}
                                                                    {{--$("#vanna").toggle();--}}
                                                                    {{--$("p").click(function () {--}}
                                                                    {{--$("p").toggle();--}}
                                                                    {{--});--}}
                                                                    {{--});--}}
                                                                    {{--</script>--}}
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body" id="show-users">

                                                                {{--</div>--}}
                                                                {{--<div class="modal-footer">--}}
                                                                {{--</div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @endif
                </section>
                @if(count($user_requester_names )>0)
                    <section id="content2">
                        <div class="ScrollStyle">
                            @foreach($user_requester_names as $user_requester_name)
                                <div class="panel panel-default" style="width: 99%">
                                    <div class="panel-body">

                                        <strong> {{$user_requester_name->last_name}}
                                            &nbsp;{{$user_requester_name->first_name}}</strong>&nbsp;asked to join
                                        your
                                        event's
                                        name&nbsp;<strong><a href="{{route('notification', $event->id)}}"><abbr
                                                        title="select this to see more this requested events">{{$event->title}}</abbr>
                                            </a></strong>
                                        <br>
                                        <br>
                                        <a href="{{route('user_notifications', [$event->id, $user_requester_name->id])}}">
                                            <button class="btn btn-primary" type="submit">Confirm</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
                <section id="content3">
                    <div class="panel panel-default" style="width: 100%">

                        <div class="panel-body" style="margin-left: 105px">
                            <div class="col-md-12">
                                <form class="form-inline" action="{{route('participate')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="first_name">First name:</label>
                                            <input type="text"
                                                   name="first_name"
                                                   required="required"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last name:</label>
                                            <input type="text"
                                                   name="last_name"
                                                   required="required"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Email">Title:</label>
                                            <input type="text"
                                                   required="required"
                                                   name="title"
                                                   class="form-control"
                                                   style="margin-left: 38px;width: 519px">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Email">Email:</label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control"
                                                   style="margin-left: 29px;width: 519px">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary"
                                                style="margin-left: 124px;width: 519px">Send
                                        </button>
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </section>
            </main>
        </div>
    </div>

@endsection

@section('after-scripts')
    <script type="text/javascript">

        $(document).on('click', 'a.btn.btn-link.btn-xs.invite', function () {
            var self = $(this);
            var wrapper = '';
            $.ajax({
                type: 'POST',
                url: '{{ route('frontend.get-invited-users') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    event_id: self.attr('data-event-id')
                },
                success: function (response) {
                    $('#id-event').text(self.attr('data-event-id'));
                    if (response.status === true) {
                        $.each(response.data, function (key, val) {
                            wrapper += '<form  method="POST" action="{{ route('email')}}">{{ csrf_field() }}' + val.first_name + ' ' + val.last_name + '<input name="email" type="hidden" value="' + val.email + '">' + '<input name="user_event_id" type="hidden" value="' + response.user_id + '">' + '<input name="event" type="hidden" value="' + self.attr('data-event-id') + '">' + '<input name="user" type="hidden" value="' + val.id + '">' + '<button  type="submit" class="btn btn-link">Invite</button> </form>';
                        });
                    }

                },
                error: function (response) {
                    console.log(wrapper);
                },
                complete: function () {
                    $('#myModal').modal('show');
                    $('#show-users').html(wrapper);
                }
            })
        })
    </script>
@endsection