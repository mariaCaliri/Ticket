@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                            @if(auth()->user()->type == 1)
                                <a href="{{url('admin/routes')}}">Admin</a>
                            @else
                                <div class=”panel-heading”>Normal User</div>
                            @endif


                        <!DOCTYPE html>
                        <head>
                            <meta charset="utf-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <title>Admin - Free Bulma template</title>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
                            <!-- Bulma Version 0.9.0-->
                            <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
                            <link rel="stylesheet" type="text/css" href="../css/admin.css">
                        </head>
                        <div>
                        <div class="column is-9">
                            <nav class="breadcrumb" aria-label="breadcrumbs">
                                <ul>
                                    <li><a href="../">Bulma</a></li>
                                    <li><a href="../">Templates</a></li>
                                    <li><a href="../">Examples</a></li>
                                </ul>
                            </nav>
                            <section class="hero is-info welcome is-small">
                                <div class="hero-body">
                                    <div class="container">
                                        <h1 class="title">
                                            Hello, Utente.
                                        </h1>
                                        <h2 class="subtitle">
                                            I hope you are having a great day!
                                        </h2>
                                    </div>
                                </div>
                            </section>
                            <form method="GET" >
                                @csrf
                            <main>
                                <a class="button" href="{{ route('tickets.create')  }}">Apri ticket</a>
                            </main>
                            <main>
                                <h3>
                                     Chats
                                </h3>
                                <a class="button" href="{{ route('chat')  }}">Mostra chat</a>
                            </main>

                            </form>
                         </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection

