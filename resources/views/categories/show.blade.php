@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="it">
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
            height: 94vh;
        }

        #bg-test {
            background-color: #1C272C;
        }
    </style>

</head>
<body>
<div class="container is-fluid" style="padding: 0px">
    <div class="columns">
        <div id="aside" class="column is-2  is-fullheight has-background-grey-dark" style="position: relative">
            <aside class="menu is-hidden-mobile">

                <div class="has-text-centered">
                    <img style="width: 75px; margin-bottom: 50px" src="/img/admin2.png">
                </div>

                <div class="menu">
                    <ul class="menu-list has-text-white ">
                        <li>
                            <a style="color: lightsteelblue;"href="{{ route('admin.utente.index') }}"><span class="icon"> <i class=" icon fa-solid fa-users fa-xl"></i></span><span class="name ml-4">Utenti</span>
                            </a>
                        </li>
                        <li>
                            <a style="color: lightsteelblue;" href="{{ route('admin.operatore.index') }}"><span class="icon"><i class="icon fa-solid fa-users-line  fa-xl"></i> </span><span class="name ml-4">Operatori</span>
                            </a>
                        </li>
                        <li>
                            <a style="color: lightsteelblue;" href="{{ route('categories.index') }}"><span class="icon"> <i class="icon fa-regular fa-rectangle-list  fa-xl"></i></span><span class="name ml-4">Categorie</span>
                            </a>
                        </li>
                        <li>
                            <a style="color: lightsteelblue;margin-top: 5px" href="#"> <i class="icon fa-solid fa-chart-line fa-xl"></i> <span class="name ml-4">Report</span></a>
                        </li>



                        <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-gear icon fa-xl"></i><span class="name ml-4">Settings</span></a>
                        </li>
                        <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-user-plus icon fa-xl"></i><span class="name ml-4">Aggiungi</span>
                            </a></li>
                        <li><a style="color: lightsteelblue;"><i class="fa-solid fa-circle-question icon fa-xl"></i><span class="name ml-4">Help</span></a>
                        </li>
                    </ul>
                </div>
        </div>

        <div class="column is-9">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Dettaglio categoria "{{ $category->id }}"
                    </p>
                </header>

                <div class="card-content">
                    <div class="content">
                        <strong>Nome</strong>
                        <span>{{ $category->name }}</span>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="{{ route('admin.home') }}" class="button is-info mt-5">Indietro</a>
                </footer>
            </div>
        </div>
    </div>
</div>

<script src=" {{ asset('js/modal.js') }}"></script>
</body>
</html>
@endsection
