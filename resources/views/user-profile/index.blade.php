@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Utente - Dettaglio Profilo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #aside{
            background-color: #212C32;
            height: 94vh;
        }
        #bg-test{
            background-color:#1C272C ;
        }
    </style>
</head>
<body>
    <div class="container is-fluid" style="padding: 0px">
        <div class="columns">
            <div id="aside" class=" column is-2 has-background-grey-dark ">
                <aside class="menu is-hidden-mobile">
                    <div class=" has-text-centered mt-2">
                        <img style="width: 80px;margin-top: 5px;" src="/img/user-img.png">
                    </div>
                    <p id="bg-text" style="font-size: 20px;" class="menu-label has-text-white">
                        <i class="fas fa-user-cog"></i> GENERALE
                    </p>
                    <ul class="menu-list">
                        <li ><a style="color:lightsteelblue;margin-bottom: 20px" href="{{ route('user.profile') }}"> <i class="fa-solid fa-user fa-xl"></i> Profilo</a></li>
                        <li><a style="color: lightsteelblue;margin-bottom: 20px" href="{{ route('change-password') }}"> <i class="fa-solid fa-lock fa-xl"></i> Modifica Password</a>
                        </li>
                        <li><a style="color: lightsteelblue;margin-bottom: 20px" href="{{ route('login-history') }}"> <i class="fa-solid fa-list fa-xl" ></i> Lista Accessi</a></li>
                        <li><a style="color: lightsteelblue;margin-bottom: 20px"><i
                                    class="fa-solid fa-circle-question icon fa-xl"></i><span
                                    class="name ml-4">Help</span></a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="column is-10">
                        <div class="card">
                                <div class="header">
                                    <img style="width: 70px" src="/img/user-profile.png">
                                    <h1 style="font-size: 20px;display: inline; text-transform: uppercase">Dettaglio utente"{{ auth()->user()->id }}"</h1>
                                </div>
                            <div class="card-content">
                                <div class="content">
                                    <div class="field">
                                        <div class="control">
                                            <form method="POST" action="{{ route('profile.update',auth()->id()) }}">
                                                @csrf
                                                <label class="label">Nome</label>
                                                <input class="input" type="text" id="name" name="name"
                                                       value="{{ auth()->user()->name }}" autofocus="" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label class="label">Email</label>
                                            <input class="input" type="text" id="email" name="email"
                                                   value="{{ auth()->user()->email }}"
                                                   placeholder="john.doe@example.com">
                                        </div>
                                    </div>
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button type="submit" class="button is-link">Modifica</button>
                                        </div>
                                        <div class="control">
                                            <a href=" {{ route('home') }}" class="button is-link is-light">Cancella</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                        {{--                            <div class="control mb-5">--}}
{{--                                <button type="button" class="btn btn-primary">--}}
{{--                                    <a style="color: white;" href=" {{ route('home') }}">Torna alla dashboard</a>--}}
{{--                                </button>--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    <a style="color: white;" >Salva Modifica</a>--}}
{{--                                </button>--}}
{{--                            </div>--}}
            </div>
</body>
</html>
@endsection

