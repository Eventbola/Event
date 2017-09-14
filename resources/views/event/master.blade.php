<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('library/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('library/bootstrap/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('event/css/layout.css')}}" rel="stylesheet">
    <link href="{{ asset('event/css/slide.css')}}" rel="stylesheet">
    @yield('style')
    <title>Event</title>
    @yield('content')
</head>
<script src="{{ asset('library/bootstrap/js/jquery.min.js')}}"></script>
<script src="{{ asset('library/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('library/bootstrap/js/jssor.slider.min.js')}}"></script>
<script src="{{ asset('event/js/slide.js')}}"></script>
<script src="{{ asset('event/js/layout.js')}}"></script>
@yield('scripts')
</body>
</html>