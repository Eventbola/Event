{{--@component('mail::layout')--}}
{{--Header--}}
{{--@slot('header')--}}
{{--@component('mail::header', ['url' => config('app.url')])--}}
{{--{{ config('app.name') }}--}}
{{--@endcomponent--}}
{{--@endslot--}}

{{--Body--}}
{{--{{ $slot }}--}}

{{--Subcopy--}}
{{--@isset($subcopy)--}}
{{--@slot('subcopy')--}}
{{--@component('mail::subcopy')--}}
{{--{{ $subcopy }}--}}
{{--@endcomponent--}}
{{--@endslot--}}
{{--@endisset--}}

{{--Footer--}}
{{--@slot('footer')--}}
{{--@component('mail::footer')--}}
{{--© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.--}}
{{--@endcomponent--}}
{{--@endslot--}}
{{--@endcomponent--}}

{{--@extends('frontend.layouts.app')--}}
{{--@section('content')--}}

{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--<a class="dropdown">--}}
    {{--<ul href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
        {{--aria-expanded="false"><i style="color: #1f6377" class="fa fa-user-plus fa-2x" aria-hidden="true"></i>(<b>2</b>)--}}
    {{--</ul>--}}
    {{--<ul class="dropdown-menu notify-drop" style="width: 500px">--}}
        {{--<div class="notify-drop-title">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<p style="margin-left: 5px">Friend Requests</p>--}}
                    {{--<hr>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="drop-content">--}}
            {{--@if(count($user_requests_lasts)>0)--}}
                {{--@foreach($user_requests_lasts as $user_request_last)--}}
                    {{--<h4>{{$user_request_last->first_name}}</h4>--}}
                    {{--<button name="delete request"--}}
                            {{--style="float: right; margin-right: 3px; background-color: whitesmoke; color: black; margin-bottom: 5px"--}}
                            {{--type="submit">Delete Request--}}
                    {{--</button>--}}
                    {{--<button name="confirm"--}}
                            {{--style="float: right; margin-right: 5px; background-color: cornflowerblue; color: white"--}}
                            {{--type="submit"> Confirm--}}
                    {{--</button>--}}
                {{--@endforeach--}}
            {{--@endif--}}


        {{--</div>--}}
        {{--<div class="notify-drop-footer text-center">--}}
        {{--</div>--}}
    {{--</ul>--}}
{{--</a>--}}
{{--<script>--}}
    {{--$(function () {--}}
        {{--$('[data-tooltip="tooltip"]').tooltip()--}}
    {{--});--}}
{{--</script>--}}
{{--@endsection--}}
