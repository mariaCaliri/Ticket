@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">

                            @if(auth()->user()->is_admin == 1)
                                <a href="{{url('admin/routes')}}">Admin</a>
                            @else
                                <div class=”panel-heading”>Normal User</div>
                            @endif


                        <!DOCTYPE html>
                        <html lang="it">

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
                        <body>
                        <div class="column is-9">
                            <nav class="breadcrumb" aria-label="breadcrumbs">
                                <ul>
                                    <li><a href="../">Bulma</a></li>
                                    <li><a href="../">Templates</a></li>
                                    <li><a href="../">Examples</a></li>
                                    <li class="is-active"><a href="#" aria-current="page">Admin</a></li>
                                </ul>
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
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
                            <main>
                                <h3>
                                    Non ci sono Ticket aperti.
                                </h3>
                                <a class="button" href="{{ route('tickets.create')  }}">Apri ticket</a>
                            </main>


                         </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </body>
    </html>
    @endsection

