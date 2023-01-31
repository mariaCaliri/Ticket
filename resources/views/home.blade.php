@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Utente</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        #aside {
            background-color: #212C32;
        }

        #bg-test {
            background-color: #1C272C;
        }
    </style>
</head>
<div class="container is-fluid" style="padding: 0">
    <div class="columns">
        <div id="aside" class="column is-1 is-fullheight has-background-grey-dark" style="position: relative">

            <div class="has-text-centered">
                <img style="width: 80px" src="/img/user-img.png">
            </div>

            <p id="bg-test" style="font-size: 20px;" class="menu-label has-text-white">
                <i class="fas fa-user-cog"></i> GENERALE
            </p>
            <div class="menu">
                <ul class="menu-list has-text-white">
                    <li>
                        <a style="color: lightsteelblue;" href="{{ route('user.profile') }}">
                          <span class="icon">  <i class="fa-solid fa-user fa-xl"></i> </span><span class="name ml-4"> Profilo</span>
                        </a>
                    </li>
                    <li>
                        <a style="color:lightsteelblue;" href="{{ route('change-password') }}">   <span class="icon">  <i class="fa-solid fa-lock fa-xl"></i></span><span class="name ml-4"> Modifica Password</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;" href="{{ route('login-history') }}"> <span class="icon"><i class="fa-solid fa-list fa-xl"></i></span><span class="name ml-4"> Lista Accessi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header has-background-grey-lighter  ">{{ __('Dashboard') }}</div>

            <div class="card-body">
                    <div>
                        <nav class="level">
                            <!-- Left side -->
                            <div class="level-left">
                                <div class="level-item">
                                    <p class="subtitle is-5">
                                        <strong>10 </strong>Tickets
                                    </p>
                                </div>
                                <div class="level-item">
                                    <div class="field has-addons">
                                        <p class="control">
                                            <input class="input" type="text" placeholder="Find a ticket">
                                        </p>
                                        <p class="control ">
                                            <button class="button is-info">
                                                Search
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right side -->
                            <div class="level-right">
                                <form method="GET">
                                    @csrf
                                    <div>
                                        <a class="button is-link has-text-white"
                                           href="{{ route('tickets.create')  }}"> <i
                                                class="fa-solid fa-plus"></i> Apri ticket</a>
                                    </div>
                                </form>

                                {{--<p class="level-item"><a class="button is-success">New</a></p>--}}
                            </div>
                        </nav>
                        <div class="card-table">
                            <div class="content">
                                <table class="table is-fullwidth is-striped">
                                    <thead>
                                    <tr class="info">
                                        <th>Id</th>
                                        <th>Titolo</th>
                                        <th>Data di apertura</th>
                                        <th>Categoria</th>
                                        <th>Priorità</th>
                                        <th>Stato</th>
                                        <th>Azioni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->id }}</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->registered_at }}</td>
                                            <td>{{ $ticket->category->name }}</td>
                                            <td>{{ $ticket->priority }}</td>
                                            <td>
                                                @if( $ticket->status =='in attesa')
                                                    <a class=" has-text-success" href="">In Attesa</a>
                                                @elseif($ticket->status == 'in lavorazione')
                                                    <a class=" has-text-warning" href=""> In Lavorazione</a>
                                                @elseif($ticket->status == 'completato')
                                                    <a class=" has-text-danger" href=""> Ticket chiuso</a>
                                                @endif
                                            </td>
                                            <td class="btn-container">
                                                <a class="button is-info" style="color: black"
                                                   href=" {{route('tickets.show',$ticket->id)  }}"> <i
                                                        class="fa-solid fa-magnifying-glass"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="column is-2 has-background-white-ter">
            <nav class="panel">
                <p class="panel-heading">
                    Filtri
                </p>
                <div class="panel-block">
                    <p class="control has-icons-left">
                        <input class="input" type="text" placeholder="Cerca un ticket">
                        <span class="icon is-left">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>

                <a class="panel-block is-active ">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                    Tutti
                </a>
                <a class="panel-block">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                    Aperti
                </a>
                <a class="panel-block">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                    Chiusi
                </a>
                <a class="panel-block">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                    Pendenti
                </a>

                <label class="panel-block">
                    <input type="checkbox">
                    Ricorda
                </label>
                <div class="panel-block">
                    <button class="button is-link is-outlined is-fullwidth">
                        Resetta Filtri
                    </button>
                </div>
            </nav>

        </div>



        </div>
    </div>
</div>
</div>
</html>
@endsection

