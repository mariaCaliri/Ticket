@extends('layouts.app')
@section('content')
    <div class="container is-fluid">
    <div class="columns">
        <div class=" box column is-2 has-background-info-dark ">
            <aside class="menu is-hidden-mobile">
                <p class="menu-label has-text-white">
                    GENERALE
                </p>
                <ul class="menu-list">
                    <li><a href="{{ route('operator.profile') }}"> <i class="fa-solid fa-user"></i> Profilo</a></li>
                    <li><a href="{{ route('operator-change-password') }}"> <i class="fa-solid fa-lock"></i> Modifica Password</a>
                    </li>
                    <li><a href=""> <i class="fa-solid fa-list"></i> Lista Accessi</a></li>
                </ul>
            </aside>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header has-background-grey-lighter  ">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <!DOCTYPE html>
                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Dashboard Operatore</title>
                        <link rel="stylesheet"
                              href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
                        <!-- Bulma Version 0.9.0-->
                        <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
                        <link rel="stylesheet"
                              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                              crossorigin="anonymous" referrerpolicy="no-referrer"/>
                    </head>

                    <body>
                    <div class="container">
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
                                <label class="radio">
                                    <input type="radio" name="answer">
                                    Tutti
                                </label>
                                <label class="radio">
                                    <input type="radio" name="answer">
                                    Aperti
                                </label>
                                <label class="radio">
                                    <input type="radio" name="answer">
                                    Chiusi
                                </label>
                                {{--                            <p class="level-item"><a class="button is-success">New</a></p>--}}
                            </div>
                        </nav>
                        <div class="columns">
                            <div class="column is-12">
                                <div class="card events-card">
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            Tickets
                                        </p>

                                    </header>
                                    <div class="card-table">
                                        <div class="content">
                                            <table class="table is-fullwidth is-striped">
                                                <thead>
                                                <tr class="info">
                                                    <th>Id</th>
                                                    <th>Titolo</th>
                                                    <th>Data di apertura</th>
                                                    <th>Categoria</th>
                                                    <th>Stato</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($tickets as $ticket)
                                                    <tr>
                                                        <td>{{ $ticket->id }}</td>
                                                        <td>{{ $ticket->title }}</td>
                                                        <td>{{ $ticket->registered_at }}</td>
                                                        <td>{{ $ticket->category->name }}</td>
                                                        <td>
                                                            @if( $ticket->status =='in attesa')
                                                                <a class=" has-text-danger" href="">In Attesa</a>
                                                            @elseif($ticket->status == 'in lavorazione')
                                                                <a class=" has-text-warning" href=""> In Lavorazione</a>
                                                            @elseif($ticket->status == 'completato')
                                                                <a class=" has-text-success" href=""> Ticket chiuso</a>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <span class=" has-text-info"> <a
                                                                    href=" {{route('tickets.show',$ticket->id)  }}"
                                                                    class="btn btn-search"> <i
                                                                        class="fa-solid fa-magnifying-glass"></i></a> </span>
                                                            <span class=" has-text-info">  <a
                                                                    href="{{route('tickets.edit',$ticket->id)  }}"
                                                                    class="btn btn-mod"><i
                                                                        class="fa-solid fa-pencil"></i></a></span>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <a href="#" class="card-footer-item">View All</a>
                                    </footer>
                                </div>
                            </div>


                        </div>
                    </div>
                    </body>
                </div>
            </div>
        </div>
        <script async type="text/javascript" src="../js/bulma.js"></script>
    </div>

    </div>
@endsection
