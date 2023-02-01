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
</head>
<body>
<div class="container">

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Crea un nuovo ticket
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('tickets.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <strong>Titolo:</strong>
                    <input type="text" name="title" class="input"
                           placeholder="titolo">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror <strong>Messaggio:</strong>
                    <textarea class="textarea" name="message" value="{{ old('message') }}"
                              placeholder="Messaggio"></textarea>
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="select mt-5">
                        <select name="priority">
                            <option>Seleziona la priorità problema</option>
                            <option value="urgente">Urgente</option>
                            <option value="mediamente urgente">Mediamente Urgente</option>
                            <option value="non urgente">Non urgente</option>
                        </select>
                    </div>
                    <div class="select mt-5">
                        <select name="category_id">
                            <option selected>Seleziona categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
            <button type="submit" class="button is-info">Aggiungi</button>
            </div>
            <div class="control">
            <button type="submit" class="button is-danger"><a style="color: white;" href="{{ route('admin.home') }}">
                    Annulla </a></button>
            </div>
            </div>
        </form>
    </div>
</div>
{{--<h1>Crea Nuovo Ticket</h1>--}}
{{--<form method="post" action="{{ route('tickets.store') }}">--}}
{{--    @csrf--}}
{{--    <div class="control m-5">--}}
{{--        <input class="input" type="text" name="title" value="{{ old('title') }}" placeholder="Inserisci titolo">--}}
{{--    </div>--}}

{{--    <textarea class="textarea" name="message" value="{{ old('message') }}" placeholder="Messaggio"></textarea>--}}


{{--    <div class="control m-5">--}}
{{--        <div class="select">--}}
{{--            <select name="priority">--}}
{{--                <option>Seleziona la priorità problema</option>--}}
{{--                <option value="urgente">Urgente</option>--}}
{{--                <option value="mediamente urgente">Mediamente Urgente</option>--}}
{{--                <option value="non urgente">Non urgente</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="control m-5">--}}
{{--        <div class="select">--}}
{{--            <select name="category_id" >--}}
{{--                <option selected>Seleziona categoria</option>--}}
{{--                @foreach($categories as $category)--}}
{{--                <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}


</body>
</html>
@endsection
