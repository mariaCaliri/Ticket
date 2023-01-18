@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TicketSystem</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        #aside {
            background-color: #212C32;
            padding: 20px;
        }

        #bg-test {
            background-color: #1C272C;
        }
    </style>
</head>
<body>

<div class="container is-fluid">
    <div class="columns">
        <div id="aside" class=" box column is-2  ">
            <aside class="menu is-hidden-mobile">
                <img style="width: 50px" src="/img/logo2.png">
                <span style="color: lightsteelblue;"> Benvenuto<strong
                        style="color: lightsteelblue;"> Admin </strong></span>

                <p id="bg-test" class="menu-label has-text-white">
                    AMMINISTRAZIONE
                </p>
                <ul class="menu-list has-text-white">

                    <li><a style="color: lightsteelblue;margin-bottom: 10px" href="{{ route('admin.utente.index') }}">
                            <i class="fa-regular fa-user"></i>Tutti gli Utenti</a>
                    </li>


                    <li><a style="color: lightsteelblue;margin-bottom: 5px" href="{{ route('categories.index') }}"> <i
                                class="fa-regular fa-rectangle-list"></i>
                            Categorie</a></li>

                    <p id="bg-test"> GESTIONE OPERATORI</p>

                    <ul class="menu-list has-text-white">
                        <li><a style="color: lightsteelblue;margin-top: 5px"
                               href="{{ route('admin.operatore.index') }}"> <i class="fa-solid fa-users-line"></i> Tutti
                                gli Operatori</a></li>

                    </ul>


                </ul>

            </aside>
        </div>
        <div class="column is-four-fifths">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Dettaglio Utente "{{ $user->id }}"
                    </p>
                </header>

                <div class="card-content">
                    <div class="content">
                        <strong>Nome</strong>
                        <span>{{ $user->name }}</span>
                    </div>
                </div>
                <footer class="card-footer">
                    <form method="get" action="{{ route('admin.utente.edit', $user->id )  }}">
                                @csrf
                                @method('PUT')
                                <button class="button is-info mt-5">Modifica</button>
                            </form>
                    <button class="button is-info mt-5 ml-5 "><a class="has-text-white" href="{{ route('admin.home') }}">
                            Torna alla dashboard</a>
                    </button>
                </footer>
            </div>
        </div>
{{--<div id="container">--}}
{{--    <h1><strong>Dettaglio Utente "{{ $user->id }}"</strong></h1>--}}
{{--</div>--}}
{{--<div>--}}
{{--    <strong>Nome</strong>--}}
{{--    <span>{{ $user->name }}</span>--}}
{{--</div>--}}
{{--<div class="control">--}}
{{--    <!-- pulsante modifica -->--}}
{{--
{{--    <!-- pulsante torna indietro -->--}}
{{--    <div class="control mb-5">--}}

{{--    </div>--}}
{{--</div>--}}

</body>
</html>
@endsection
