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
            background-color: #212C32;
            padding: 20px;
            height: 94vh;
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
                        <li style="color: lightsteelblue"><a style="color: lightsteelblue;margin-top: 5px" class="has-text-white" href="{{ route('admin.home') }}">
                                <span style="color: lightsteelblue"><i class="fa-solid fa-house-user"></i></span>
                                Torna alla dashboard</a> </li>
                    </ul>


                </ul>

            </aside>
        </div>
        <div class="column is-9">
            <div class="columns">
                <div class="column is-12">
                    <!-- Main container -->
                    <nav class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <div class="field has-addons">
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Cerca un operatore">
                                    </p>
                                    <p class="control ">
                                        <button class="button is-info">
                                            Cerca
                                        </button>
                                    </p>
                                </div>
                                </div>
                            </div>


                    </nav>
                    <div class="card events-card">
                        <header class="card-header">
                            <p class="card-header-title  has-background-grey-lighter ">
                                Operatori
                            </p>

                        </header>
                        <div class="table-container">
                            <div class="card-table">
                                <div class="content">
                                    <table class="table is-fullwidth is-striped">
                                        <thead>
                                        <tr>
                                            <th> Id <i class="fa-solid fa-right-left"></i>
                                            </th>
                                            <th>Nome <i class="fa-solid fa-right-left"></i>
                                            </th>
                                            <th>Email <i class="fa-solid fa-right-left"></i>
                                            </th>
                                            <th>Actions <i class="fa-solid fa-right-left"></i>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <form action="{{ route('admin.utente.destroy',$user->id) }}" method="Post">
                                                        <a class="button is-info" style="color: black" href=" {{ route('admin.utente.show',$user->id) }}"> <i
                                                                      class="fa-solid fa-magnifying-glass"></i></a>
                                                        <a class="button is-primary" style="color: black" href="{{ route('admin.utente.edit',$user->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="button is-danger" type="submit">

                                                        <i class="fa-solid fa-trash has-text-black "></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">View All</a>
                        </footer>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

</body>
</html>
@endsection
