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
                Modifica Categoria
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('categories.update',$category->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <strong>Nome Categoria:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                           placeholder="nome">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <footer class="card-footer">
            <button type="submit" class="button is-info">Modifica</button>
            <button type="submit" class="button is-danger"><a style="color: white;" href="{{ route('admin.home') }}"> Annulla </a></button>
        </footer>
        </form>
    </div>
</div>

</body>
</html>
@endsection
