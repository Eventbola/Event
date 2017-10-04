<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')
        <link href="{{ asset('library/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{ asset('library/bootstrap/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{ asset('event/css/layout.css')}}" rel="stylesheet">

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
            {{ Html::style(mix('css/frontend.css')) }}
        @endif
        <style>
            .navbar-brand, ul.nav.navbar-nav.navbar-right > li > a  {
                padding: 10px;

            }
        </style>
        @yield('after-styles')


        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body id="app-layout" style="font-style: normal;font-family: 'Times New Roman';background-color:#E6E6FA">
        <div id="app">
            @include('includes.partials.logged-in-as')
            {{--@include('frontend.includes.nav')--}}

            <div class="container-fluid">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!--#app-->
        <!-- Scripts -->
        @yield('before-scripts')
        {{--{!! Html::script(mix('js/frontend.js')) !!}--}}

        <script src="{{asset('js/share.js')}}"></script>
        <script src="{{ asset('library/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{ asset('library/bootstrap/js/jquery.min.js')}}"></script>
        <script src="{{ asset('library/bootstrap/js/jquery.sidebarFix.js')}}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('event/js/layout.js')}}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/moment/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js') }}"></script>
        @yield('after-scripts')
        @include('includes.partials.ga')
    </body>
</html>