<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina operatori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista Operatori</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('admin.operatore.create') }}"> Crea Operatore</a>
                <a class="btn btn-success" href="{{ route('admin.home') }}"> Torna alla dashboard</a>
                <a class="btn btn-success" href="{{ route('store.allOperator.email') }}"> Manda email a tutti gli operatori</a>
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
            <th>ID</th>
            <th>NOME</th>
            <th> Email</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($operators as $operator)
            <tr>
                <td>{{ $operator->id }}</td>
                <td>{{ $operator->name }}</td>
                <td>{{ $operator->email }}</td>

                <td>
                    <form action="{{ route('admin.operatore.destroy',$operator->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('admin.operatore.edit',$operator->id) }}">Modifica</a>
                        <a class="btn btn-warning" href="{{ route('admin.operatore.show',$operator->id) }}">Dettaglio</a>
                        <a class="btn btn-info" href="{{ route('send.email.view',$operator->id) }}">Manda Email</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">Cancella</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
