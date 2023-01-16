@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Pagina operatori</title>
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
                        <!-- Right side -->
                        <div class="level-right">
                            <p class="level-item"><a class="button is-info" href="{{ route('admin.operatore.create') }}"> <span style="margin-right: 2px"><i class="fa-solid fa-plus"></i></span> Aggiungi Operatore</a></p>
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
                                        @foreach($operators as $operator)
                                            <tr>
                                                <td>{{ $operator->id }}</td>
                                                <td>{{ $operator->name }}</td>
                                                <td>{{ $operator->email }}</td>
                                                <td>
                                                    <form action="{{ route('admin.operatore.destroy',$operator->id) }}" method="Post">
                                                        <span class=" has-text-info">  <a class="btn btn-success"  href="{{ route('admin.operatore.edit',$operator->id) }}"><i class="fa-solid fa-pencil"></i></a></span>
                                                        <span class=" has-text-info"> <a class="btn btn-warning"  href="{{ route('admin.operatore.show',$operator->id) }}"> <i
                                                                    class="fa-solid fa-magnifying-glass"></i></a></span>
                                                        <a class="btn btn-info" href="{{ route('send.email.view',$operator->id) }}"><i class="fa-regular fa-envelope"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                            <span class=" has-text-info"><button type="submit" >  <i class="fa-solid fa-trash has-text-danger "></i></span></button>
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
    <button class="button is-info"><a class="has-text-white" href="{{ route('admin.home') }}">
            Torna alla dashboard</a>
    </button>

</div>


{{--<div class="container mt-2">--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Lista Operatori</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right mb-2">--}}
{{--                <a class="btn btn-success" href="{{ route('admin.operatore.create') }}"> Crea Operatore</a>--}}
{{--                <a class="btn btn-success" href="{{ route('admin.home') }}"> Torna alla dashboard</a>--}}
{{--                <a class="btn btn-success" href="{{ route('send.email.all.view') }}"> Manda email a tutti gli operatori</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <p>{{ $message }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <table class="table table-bordered">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>ID</th>--}}
{{--            <th>NOME</th>--}}
{{--            <th> Email</th>--}}
{{--            <th width="280px">Action</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach ($operators as $operator)--}}
{{--            <tr>--}}
{{--                <td>{{ $operator->id }}</td>--}}
{{--                <td>{{ $operator->name }}</td>--}}
{{--                <td>{{ $operator->email }}</td>--}}

{{--                <td>--}}

{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}
</body>
</html>
@endsection
