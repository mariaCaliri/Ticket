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
            height: 94vh;
        }

        #bg-test {
            background-color: #1C272C;
        }
    </style>
</head>
    <div class="container-fluid">
                <div class="card">
                    <div class="card-header">{{ __('Cambia Password') }}</div>
                    <div class="card-content">
                        <form action="{{ route('update-password') }}" method="POST">
                            @csrf
                            <div class="content">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="field">
                                    <label for="oldPasswordInput" class="form-label">Password Attuale</label>
                                    <div class="control">
                                        <input name="old_password" type="password" class="input @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                               placeholder="Password Attuale">
                                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="newPasswordInput" class="form-label">Nuova Password</label>
                                    <div class="control">
                                        <input name="new_password" type="password" class="input @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                               placeholder="Nuova Password">
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="confirmNewPasswordInput" class="form-label">Conferma Nuova Password</label>
                                    <div class="control">
                                        <input name="new_password_confirmation" type="password" class="input" id="confirmNewPasswordInput"
                                           placeholder="Conferma Password">
                                    </div>
                                </div>

                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                 <button class="button is-info">Conferma</button>
                                </div>
                                <div class="control">
                                 <button class="button is-danger"><a style="color: white" href="{{ route('home') }}"> Annulla</a></button>
                                </div>
                                <div class="control">
                                 <button class="button is-primary"><a style="color: white" href="{{ route('home') }}">Torna alla dashboard</a></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

    </div>
@endsection
