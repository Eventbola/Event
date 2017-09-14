{{--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">--}}
{{--invite--}}
{{--</button>--}}

{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>--}}
{{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}

{{--@foreach($users as $user)--}}
{{--@if($user->first_name != 'Admin' && $user->first_name != 'Backend' && $user->first_name != 'Default'&& $user->id != auth()->user()->id)--}}

{{--<form method="POST" action="{{ route('email')}}" class="form-group">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group">--}}
{{--<img src="https://cdn.pixabay.com/photo/2017/01/06/19/15/soap-bubble-1958650_960_720.jpg"--}}
{{--style="width:40px; height:40px; border-radius:50%">--}}
{{--<label> {{$user->first_name}}&nbsp;{{$user->last_name}}</label>--}}
{{--<input name="email" type="hidden" value="{{ $user->email }}">--}}
{{--<input name="id" type="hidden" value="{{ $user->id }}">--}}
{{--<input name="event_id" type="hidden" value="{{ $event->id }}">--}}
{{--<input name="user_id" type="hidden" value="{{$event->user_id}}">--}}
{{--<button type="submit" class="btn btn-primary" style="float: right">Invite--}}
{{--</button>--}}
{{--<hr>--}}
{{--</div>--}}
{{--</form>--}}
{{--@endif--}}
{{--@endforeach--}}

{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--<button type="button" class="btn btn-primary">Save changes</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


{{--<a type="button" class="btn btn-link" data-toggle="modal" data-target="{{'#exampleModal1'.$event->id}}">--}}
{{--invite--}}
{{--</a>--}}

{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="{{'#exampleModal1'.$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--aria-hidden="true">--}}
{{--<div class="modal-dialog" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h5 class="modal-title" id="exampleModalLabel">Invite your {{$event->id}}</h5>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--@foreach($users as $user)--}}
{{--@if($user->first_name != 'Admin' && $user->first_name != 'Backend' && $user->first_name != 'Default'&& $user->id != auth()->user()->id)--}}

{{--<form method="POST" action="{{ route('email')}}" class="form-group">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group">--}}
{{--<img src="https://cdn.pixabay.com/photo/2017/01/06/19/15/soap-bubble-1958650_960_720.jpg"--}}
{{--style="width:40px; height:40px; border-radius:50%">--}}
{{--<label> {{$user->first_name}}&nbsp;{{$user->last_name}}</label>--}}
{{--<input name="email" type="hidden" value="{{ $user->email }}">--}}
{{--<input name="id" type="hidden" value="{{ $user->id }}">--}}
{{--<input name="event_id" type="hidden" value="{{ $event->id }}">--}}
{{--<input name="user_id" type="hidden" value="{{$event->user_id}}">--}}
{{--<button type="submit" class="btn btn-primary" style="float: right">Invite--}}
{{--</button>--}}
{{--<hr>--}}
{{--</div>--}}
{{--</form>--}}
{{--@endif--}}
{{--@endforeach--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--<button type="button" class="btn btn-primary">Save changes</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


{{--{--<a id="invite" href="#" data-toggle="modal" data-target=".bs-example-modal-lg">invite</a>--}}

{{--<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"--}}
{{--aria-hidden="true" id="onload">--}}
{{--<div class="modal-dialog">--}}
{{--<!-- Modal content-->--}}
{{--<div class="modal-content" style="width: 70%">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal" style="color: red">×</button>--}}
{{--<h4 class="modal-title"><i class="fa fa-exclamation-circle"></i>Invite your friends here!!!</h4>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}

{{--@foreach($users as $user)--}}

{{--@if($user->first_name != 'Admin' && $user->first_name != 'Backend' && $user->first_name != 'Default'&& $user->id != auth()->user()->id)--}}

{{--<form method="POST" action="{{ route('email')}}" class="form-group">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group">--}}
{{--<img src="https://cdn.pixabay.com/photo/2017/01/06/19/15/soap-bubble-1958650_960_720.jpg"--}}
{{--style="width:40px; height:40px; border-radius:50%">--}}
{{--<label> {{$user->first_name}}&nbsp;{{$user->last_name}}</label>--}}
{{--<input name="email" type="hidden" value="{{ $user->email }}">--}}
{{--<input name="id" type="hidden" value="{{ $user->id }}">--}}
{{--<input name="event_id" type="hidden" value="{{ $event->id }}">--}}
{{--<input name="user_id" type="hidden" value="{{$event->user_id}}">--}}
{{--<button type="submit" class="btn btn-primary" style="float: right">Invite--}}
{{--</button>--}}
{{--<hr>--}}
{{--</div>--}}
{{--</form>--}}

{{--@endif--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}


{{--<button type="button" class="btn btn-link" data-toggle="modal" data-target="#invitation">--}}
{{--invite--}}
{{--</button>--}}

{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="invitation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--aria-hidden="true">--}}
{{--<div class="modal-dialog" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h4 class="modal-title"><i class="fa fa-exclamation-circle"></i>Invite your friends here!!!</h4>--}}

{{--<button type="button" class="close" data-dismiss="modal1" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<div id="custom-search-input">--}}
{{--<div class="input-group col-md-12">--}}
{{--<input type="text" class="form-control input-lg" placeholder="search your fri here!!!"/>--}}
{{--<span class="input-group-btn">--}}
{{--<button class="btn btn-info btn-lg" type="button">--}}
{{--<i class="glyphicon glyphicon-search"></i>--}}
{{--</button>--}}
{{--</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--<hr>--}}

{{--@foreach($users as $user)--}}
{{--@foreach($sent as $item)--}}

{{--@if($user->first_name != 'Admin' && $user->first_name != 'Backend' && $user->first_name != 'Default'&& $user->id != auth()->user()->id )--}}
{{--@foreach($requests as $request)--}}
{{--@if($user->id != $request->user_invited_id && $event->id != $request->event_id )--}}

{{--<form method="POST" action="{{ route('email')}}" class="form-group">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group">--}}
{{--<img src="https://cdn.pixabay.com/photo/2017/01/06/19/15/soap-bubble-1958650_960_720.jpg"--}}
{{--style="width:40px; height:40px; border-radius:50%">--}}
{{--<label> {{$user->first_name}}&nbsp;{{$user->last_name}}</label>--}}
{{--<input name="email" type="hidden" value="{{ $user->email }}">--}}
{{--<input name="id" type="hidden" value="{{ $user->id }}">--}}
{{--<input name="event_id" type="hidden" value="{{ $event->id }}">--}}
{{--<input name="user_id" type="hidden" value="{{$event->user_id}}">--}}
{{--<button type="submit" class="btn btn-primary" style="float: right">Invite--}}
{{--</button>--}}
{{--<hr>--}}
{{--</div>--}}
{{--</form>--}}
{{--@endif--}}

{{--@endforeach--}}
{{--@endif--}}


{{--@endforeach--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


{{--<script type="text/javascript">--}}
{{--function centerModal() {--}}
{{--$(this).css('display', 'block');--}}
{{--var $dialog = $(this).find(".modal-dialog");--}}
{{--var offset = ($(window).height() - $dialog.height()) / 2;--}}
{{--// Center modal vertically in window--}}
{{--$dialog.css("margin-top", offset);--}}
{{--}--}}

{{--$('.modal').on('show.bs.modal', centerModal);--}}
{{--$(window).on("resize", function () {--}}
{{--$('.modal:visible').each(centerModal);--}}
{{--});--}}

{{--//   $('#invite').on('click', function(){--}}
{{--//      console.log(100)--}}
{{--//   });--}}
{{--</script>--}}