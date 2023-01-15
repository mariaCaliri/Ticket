<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400;1,600;1,800&family=Noto+Serif:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-image: url("img/background.jpeg");
            background-repeat: no-repeat;
            background-size: 100% 80%;
            background-attachment: fixed;
        }

        span {
            color: #b26ef1;
        }


        nav {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        nav ul li {
            display: inline;
            padding-right: 10px;
            color: white;
        }

        nav ul li a {
            text-decoration: none;
            text-transform: uppercase;
        }


        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background: darkblue;
            opacity: .3;
            z-index: -10;
        }

        .hero-section {
            color: white;
            text-align: center;
            margin: 0 auto;
        }

        p {
            color: white;
            text-align: center;
            margin: 0 auto;
            font-size: 30px;
        }

        .main-title {
            font-size: 60px;
            text-transform: uppercase;
            font-weight: 550;
            margin-top: 250px;
        }


    </style>

    <title>TicketSystem</title>

</head>

<body>
<div>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <nav class="float-right">
                <ul>
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                        <li class="border-solid border-2 rounded-md p-2 px-3 m-3 hover:bg-slate-50 hover:text-blue-600"> <a href="{{ route('login') }}">Log in</a>
                        </li>

                    @if (Route::has('register'))
                            <li class="border-solid border-2 rounded-md p-2 px-3 hover:bg-slate-50 hover:text-blue-600"> <a href="{{ route('register') }}">Register</a>
                            </li>

                    @endif
                @endauth
                </ul>
            </nav>
        </div>
    @endif

    <div class="overlay">
        <header>
            <div id="logo">
                <img src="img/logowelcome.png" alt="logo" style="width: 100px; display: inline">
                <span> TICKETSYSTEM</span>
            </div>
        </header>
    </div>
</div>
<div class="hero-section">
    <div class="title">
        <h2 class="main-title"><em>Hai bisogno di aiuto?</em></h2>
        <p>Registrati o accedi per ricevere subito assistenza</p>
{{--        <div>--}}
{{--            <button style="width: 200px" class="border-solid border-2 rounded-md p-2 px-3 hover:bg-slate-50 hover:text-blue-600"></button>--}}
{{--        </div>--}}
    </div>
</div>


</body>
</html>
