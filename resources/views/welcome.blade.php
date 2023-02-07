<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TicketSystem</title>
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />

    <style>
        body{
            background-image:url("{{ asset('img/back.jpg') }}");
            background-position: center;
            background-size: cover;
        }
        .overlay{
            position: fixed; /* Sit on top of the page content */
            width: 100%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.2); /* Black background with opacity */
            z-index: 2;
        }
    </style>
</head>

<body  >
<div class="overlay"></div>
{{--@if (Route::has('login'))--}}
{{--    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--        <nav class="float-right">--}}
{{--            <ul>--}}
{{--                @auth--}}
{{--                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>--}}
{{--                @else--}}
{{--                    <li class="border-solid border-2 rounded-md p-2 px-3 m-3 hover:bg-slate-50 hover:text-blue-600"> <a href="{{ route('login') }}">Log in</a>--}}
{{--                    </li>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <li class="border-solid border-2 rounded-md p-2 px-3 hover:bg-slate-50 hover:text-blue-600"> <a href="{{ route('register') }}">Register</a>--}}
{{--                        </li>--}}

{{--                    @endif--}}
{{--                @endauth--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--@endif--}}
<section class="hero  is-fullheight">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a style="color: white;text-transform: uppercase;font-weight: bold" class="navbar-item" href="../">
                       TicketSystem
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                </div>
                <div id="navbarMenu" class="navbar-menu">
                    <div class="navbar-end">
                        @if (Route::has('login'))
                            <span class="navbar-item">
                                @auth
                                <a class="button is-white is-outlined" href="{{ url('/home') }}">
                                </a>
                            </span>
                        @else
                        <span class="navbar-item">
                                <a class="button is-white is-outlined" href="{{ route('login') }}">Log in</a>
                            </span>
                            @if (Route::has('register'))
                                <span class="navbar-item">
                                <a class="button is-white is-outlined" href="{{ route('register') }}">Register</a>
                            </span>
                            @endif
                        @endauth
                            @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-6 is-offset-3">
                <h1 class="title" style="color: white;font-size: 55px">
                  <strong> Hai bisogno di aiuto?</strong>
                </h1>
                <h2 class="subtitle" style="color: red;font-size: 25px">
                   Registrati o effettua il login e contattaci!

                </h2>
{{--                <div class="box">--}}
{{--                    <div class="field is-grouped">--}}
{{--                        <p class="control is-expanded">--}}
{{--                            <input class="input" type="text" placeholder="Enter your email">--}}
{{--                        </p>--}}
{{--                        <p class="control">--}}
{{--                            <a class="button is-info">--}}
{{--                                Notify Me--}}
{{--                            </a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

</section>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>
