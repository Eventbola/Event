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
    </style>
@endsection()
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="width: 50%">
                <h3 style="color: blue">Manage Events</h3>
            </div>

            <div class="col-md-12">
                <br>
                <h4 style="text-align: left"> Posted({{count($events)}})</h4>
                <hr style="border-color: silver; float: left" width="900px">
            </div>
            <div class="col-md-12" id="display">

                @foreach($events as $index => $event)

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
                                    <li><a class="text-body-medium text-color--blue-under"><span
                                                    class="fa fa-users"></span>

                                            <a
                                                    class="btn btn-link btn-xs invite"
                                                    data-toggle="modal"
                                                    data-event-id="{{ $event->id }}"
                                                    data-target="#myModal"
                                                    style="padding: 0.1px 0.1px;
                                                    font-size: 14px;">
                                                Invite
                                            </a>

                                            <!-- Modal -->

                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="margin-right: 15%;">
                                                        <div class="modal-header">
                                                            <button style="color: red" type="button" class="close"
                                                                    data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Invite your friend
                                                                here! <span id="id-event"></span></h4>
                                                        </div>
                                                        <div class="modal-body" id="show-users">

                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </a>

                                    </li>

                                </ul>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>


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
                    event_id: self.attr('data-event-id'){{--<input name="id" type="hidden" value="{{ $user->id }}">--}}
                    {{--<input name="event_id" type="hidden" value="{{ $event->id }}">--}}
                    {{--<input name="user_id" type="hidden" value="{{$event->user_id}}">--}}

                },
                success: function (response) {
                    $('#id-event').text(self.attr('data-event-id'));
                    if (response.status === true) {
                        $.each(response.data, function (key, val) {
                            wrapper += '<form  method="POST" action="{{ route('email')}}">{{ csrf_field() }}' + val.first_name + ' ' + val.last_name + '<input name="email" type="hidden" value="' + val.email + '">' + '<input name="user_event_id" type="hidden" value="' + response.user_id + '">' + '<input name="event" type="hidden" value="' + self.attr('data-event-id') + '">' + '<input name="user" type="hidden" value="' + val.id + '">' + '<button  type="submit" class="btn btn-link pull-right">Invite</button> </form>';
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