<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Utenti</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista Utenti</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('admin.utente.create') }}"> Crea Utente</a>
                <a class="btn btn-success" href="{{ route('admin.home') }}"> Torna alla dashboard</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('admin.utente.destroy',$user->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('admin.utente.edit',$user->id) }}">Modifica</a>
                        <a class="btn btn-warning " href="{{ route('admin.utente.show',$user->id) }}">Dettaglio</a>
                        @csrf
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
