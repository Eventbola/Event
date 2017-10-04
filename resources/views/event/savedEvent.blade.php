@extends('frontend.layouts.app')
@include('event.includes.nav')
@section('content')
   <div class="panel panel-default">
       <div class="panel-heading">
           <h1 class="panel-title">
               user
           </h1>
       </div>
       <div class="list-group">
              @foreach($events as $event)
                  <div class="list-group-item">
                      <h1>{{$event->title}}</h1>
                      <p>{{$event->location}}</p>
                  </div>
              @endforeach
       </div>
   </div>
@endsection

