@extends('layouts.app')
@section('content')
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
<div class="container is-fluid" style="padding: 0">
    <div class="columns">
        <div id="aside" class="column is-2 has-background-grey-dark">
            <aside class="menu is-hidden-mobile">
                <div class="text-center">
                <img style="width: 80px;margin-top: 5px;" src="/img/user-img.png">
                </div>
                <p id="bg-text" class="menu-label has-text-white" style="font-size: 20px;"><i
                        class="fas fa-user-cog"></i> GENERALE</p>

                <ul class="menu-list">
                    <li style="margin-bottom: 20px">
                        <a href=" {{ route('home') }}"> <span style="color: lightsteelblue";>
                        <span><i class="fa-solid fa-house-user fa-xl"></i></span>
                            <span style="color: lightsteelblue">Home</span>
                        </a>
                    </li>
                    <li><a style="color: lightsteelblue;margin-bottom: 20px" href="{{ route('user.profile') }}"> <i
                                class="fa-solid fa-user fa-xl"></i> Profilo</a></li>
                    <li><a style="color: lightsteelblue;margin-bottom: 20px" href="{{ route('change-password') }}"> <i
                                class="fa-solid fa-lock fa-xl"></i> Modifica Password</a>
                    </li>
                    <li><a style="color: lightsteelblue;margin-bottom: 20px;" href="{{ route('login-history') }}"> <i
                                class="fa-solid fa-list fa-xl"></i> Lista Accessi
                        </a>
                    </li>
                    <li><a style="color: lightsteelblue;margin-bottom: 20px"><i
                                class="fa-solid fa-circle-question icon fa-xl"></i><span
                                class="name ml-4">Help</span></a>
                    </li>

                </ul>
            </aside>
        </div>
        <div class="column is-10">
            <div class="card">
                <div class="card-content">
                        <div class="content">
                            <table class="table is-bordered is-striped ">
                                <thead>
                                <tr class="info">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Data di accesso</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($logs as $log)
                                        <td> {{ $log->name }}</td>
                                        <td> {{ $log->email }}</td>
                                        <td> {{ $log->created_at }}</td>
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection


