@extends('frontend.layouts.app')
@section('after-styles')
    <style type="text/css">
        .main_h {
            position: fixed;
            top: 0px;
            max-height: 70px;
            z-index: 999;
            width: 100%;
            padding-top: 17px;
            background: none;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            opacity: 0;
            top: -100px;
            padding-bottom: 6px;
            font-family: "Montserrat", sans-serif;
        }

        @media only screen and (max-width: 766px) {
            .main_h {
                padding-top: 25px;
            }
        }

        .open-nav {
            max-height: 1000px !important;
        }

        .open-nav .mobile-toggle {
            transform: rotate(-90deg);
            -webkit-transform: rotate(-90deg);
        }

        .sticky {
            background-color: rgba(255, 255, 255, 0.93);
            opacity: 1;
            top: 0px;
            border-bottom: 1px solid gainsboro;
        }

        .logo {
            width: 50px;
            font-size: 25px;
            color: #8f8f8f;
            text-transform: uppercase;
            float: left;
            display: block;
            margin-top: 0;
            line-height: 1;
            margin-bottom: 10px;
        }

        @media only screen and (max-width: 766px) {
            .logo {
                float: none;
            }
        }

        nav {
            float: right;
            width: 60%;
        }

        @media only screen and (max-width: 766px) {
            nav {
                width: 100%;
            }
        }

        nav ul {
            list-style: none;
            overflow: hidden;
            text-align: right;
            float: right;
        }

        @media only screen and (max-width: 766px) {
            nav ul {
                padding-top: 10px;
                margin-bottom: 22px;
                float: left;
                text-align: center;
                width: 100%;
            }
        }

        nav ul li {
            display: inline-block;
            margin-left: 35px;
            line-height: 1.5;
        }

        @media only screen and (max-width: 766px) {
            nav ul li {
                width: 100%;
                padding: 7px 0;
                margin: 0;
            }
        }

        nav ul a {
            color: #888888;
            text-transform: uppercase;
            font-size: 12px;
        }

        .mobile-toggle {
            display: none;
            cursor: pointer;
            font-size: 20px;
            position: absolute;
            right: 22px;
            top: 0;
            width: 30px;
            -webkit-transition: all 200ms ease-in;
            -moz-transition: all 200ms ease-in;
            transition: all 200ms ease-in;
        }

        @media only screen and (max-width: 766px) {
            .mobile-toggle {
                display: block;
            }
        }

        .mobile-toggle span {
            width: 30px;
            height: 4px;
            margin-bottom: 6px;
            border-radius: 1000px;
            background: #8f8f8f;
            display: block;
        }

        .row {
            width: 100%;
            max-width: 940px;
            margin: 0 auto;
            position: relative;
            padding: 0 2%;
        }

        * {
            box-sizing: border-box;
        }

        body {
            color: #8f8f8f;
            background: white;
            font-family: "Cardo", serif;
            font-weight: 300;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
        }

        h1 {
            font-size: 30px;
            line-height: 1.8;
            text-transform: uppercase;
            font-family: "Montserrat", sans-serif;
        }

        p {
            margin-bottom: 20px;
            font-size: 17px;
            line-height: 2;
        }

        .content {
            padding: 50px 2% 250px;
        }

        .hero {
            position: relative;
            background: url(http://www.philippefercha.com/cd/toggle-menu-bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            text-align: center;
            color: #fff;
            padding-top: 110px;
            min-height: 500px;
            letter-spacing: 2px;
            font-family: "Montserrat", sans-serif;
        }

        .hero h1 {
            font-size: 50px;
            line-height: 1.3;
        }

        .hero h1 span {
            font-size: 25px;
            color: #e8f380;
            border-bottom: 2px solid #e8f380;
            padding-bottom: 12px;
            line-height: 3;
        }

        .mouse {
            display: block;
            margin: 0 auto;
            width: 26px;
            height: 46px;
            border-radius: 13px;
            border: 2px solid #e8f380;
            position: absolute;
            bottom: 40px;
            position: absolute;
            left: 50%;
            margin-left: -26px;
        }

        .mouse span {
            display: block;
            margin: 6px auto;
            width: 2px;
            height: 2px;
            border-radius: 4px;
            background: #e8f380;
            border: 1px solid transparent;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-name: scroll;
            animation-name: scroll;
        }

        @-webkit-keyframes scroll {
            0% {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                -webkit-transform: translateY(20px);
                transform: translateY(20px);
            }
        }

        @keyframes scroll {
            0% {
                opacity: 1;
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                -webkit-transform: translateY(20px);
                -ms-transform: translateY(20px);
                transform: translateY(20px);
            }
        }

    </style>
@endsection
@section('content')

    <link href='https://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
    <link href='style.css' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>


    <header class="">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#frontend-navbar-collapse">
                            <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!--navbar-header-->
                    <div class="collapse navbar-collapse" id="frontend-navbar-collapse" style="color: red">
                        <ul class="nav navbar-nav">
                            {{--<li>{{ link_to_route('home', trans('navs.frontend.macros'), [], ['class' => active_class(Active::checkRoute('frontend.macros')) ]) }}</li>--}}
                            <li><a href="{{route('home')}}">Browser Event</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right ">
                            @if ($logged_in_user)
                                {{--<li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard'), [], ['class' => active_class(Active::checkRoute('frontend.user.dashboard')) ]) }}</li>--}}
                            @endif
                            @if (! $logged_in_user)

                                <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login'), [], ['class' => active_class(Active::checkRoute('frontend.auth.login'))]) }}</li>
                                @if (config('access.users.registration'))
                                    <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register-kh'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                                @endif
                            @else
                                <li>{{ link_to_route('create', trans('navs.frontend.create')) }}</li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                                       style="position:relative; padding-left:50px;">
                                        <img src="/img/profile/{{ Auth::user()->image }}" alt="no-image"
                                             style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        @permission('view-backend')
                                        <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                                        @endauth

                                        <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}</li>
                                        <li><a href="{{route('manage')}}">Manage Event</a></li>
                                        <li>{{ link_to_route('calendar', trans('navs.frontend.calendar')) }}</li>
                                        <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>

                                        {{--<li><a href="">Saved  0 </a></li>--}}
                                        {{--<li><a href="">Organize profile</a></li>--}}
                                    </ul>
                                </li>
                            @endif
                            @if (config('locale.status') && count(config('locale.languages')) > 1)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ trans('menus.language-picker.language') }}
                                        <span class="caret"></span>
                                    </a>
                                    @include('includes.partials.lang')
                                </li>
                            @endif
                        </ul>
                    </div><!--navbar-collapse-->
                </div><!--container-->
            </nav>

    </header>

    <div class="hero">

        <h1><span>I'm a cool</span><br>Navigation</h1>

        <div class="mouse">
            <span></span>
        </div>

    </div>

    <div class="row content">
        <h1 class="sec01">Section 01</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet
            nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus
            quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore
            quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium
            inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt
            consectetur. Sit, eius, itaque, porro, beatae impedit officia tenetur reiciendis autem vitae a quae ipsam
            repudiandae odio dolorum quaerat asperiores possimus corporis optio animi quisquam laboriosam nihil quam
            voluptatum quidem veritatis iste culpa iure modi perspiciatis recusandae ipsa libero officiis aliquam
            doloremque similique id quasi atque distinctio enim sapiente ratione in quia eum perferendis earum
            blanditiis. Nobis, architecto, veniam molestias minus iste necessitatibus est ab in earum ratione eveniet
            soluta molestiae sed illo nostrum nemo debitis. Minus, quod totam aliquam ea asperiores fugit quaerat
            excepturi dolores ratione numquam consequatur id unde alias provident vero incidunt exercitationem similique
            consequuntur hic possimus? Fuga, eveniet quaerat inventore corporis laborum eligendi enim soluta obcaecati
            aliquid veritatis provident amet laudantium est quisquam dolore exercitationem modi? Distinctio, pariatur,
            ab velit praesentium vitae quidem consequatur deleniti recusandae odit officiis. Quidem, cupiditate.</p>

        <script type="text/javascript">
            // Sticky Header
            $(window).scroll(function () {

                if ($(window).scrollTop() > 100) {
                    $('.main_h').addClass('sticky');
                } else {
                    $('.main_h').removeClass('sticky');
                }
            });

            // Mobile Navigation
            $('.mobile-toggle').click(function () {
                if ($('.main_h').hasClass('open-nav')) {
                    $('.main_h').removeClass('open-nav');
                } else {
                    $('.main_h').addClass('open-nav');
                }
            });

            $('.main_h li a').click(function () {
                if ($('.main_h').hasClass('open-nav')) {
                    $('.navigation').removeClass('open-nav');
                    $('.main_h').removeClass('open-nav');
                }
            });

            // navigation scroll lijepo radi materem
            $('nav a').click(function (event) {
                var id = $(this).attr("href");
                var offset = 70;
                var target = $(id).offset().top - offset;
                $('html, body').animate({
                    scrollTop: target
                }, 500);
                event.preventDefault();
            });
        </script>
@endsection


