<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina Categorie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista Categorie</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Crea Categoria</a>
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
            <th>ID</th>
            <th>CATEGORIA</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>

                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Modifica</a>
                        <a class="btn btn-warning" href="{{ route('categories.show', $category->id) }}">Dettaglio</a>
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
