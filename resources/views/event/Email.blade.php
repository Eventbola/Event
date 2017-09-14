@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('content')
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <ul class="list-group">
                @foreach ($users as $user)
                        <li class="list-group-item"> <img src="img/profile/{{$user->image}}" style="height: 40px;width:40px;border-radius:50%"> &nbsp;&nbsp;{{$user->name}}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span><button class="btn btn-primary btn-sm" >Invite</button></span>
                        </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
