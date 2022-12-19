<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Tickets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifica Ticket</h2>
            </div>

        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
@endif
    <form method="Post" action="{{ route('tickets.update', $ticket->id) }}"  enctype="multipart/form-data">
@csrf
@method('Put')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titolo:</strong>
                    <input type="text" name="title" value="{{ $ticket->title }}" class="form-control" placeholder="Titolo">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">

                        <div class="select is-multiple ">
                            <strong>Priorità:</strong>
                            <select name="priority" >
                                <option>{{ $ticket->priority}} </option>
                                <option value="urgente" >urgente</option>
                                <option value="mediamente urgente" >mediamente urgente</option>
                                <option value="non urgente" >non urgente</option>
                            </select>
                    </div>
                </div>

            <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                <div class="select is-multiple ">
                    <strong>Status:</strong>
                    <select name="status" >
                        <option>{{ $ticket->status}} </option>
                        <option value="in lavorazione" >in lavorazione</option>
                        <option value="completato" >completato</option>
                        <option value="in attesa" >in attesa</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                <div class="form-floating">
                    <strong>Categoria:</strong>
                        <select name="category_id" >
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                </div>

            <div class="d-grid gap-2 d-md-block mb-5 text-center">
                <button class="btn btn-primary " type="submit" >Invia</button>
            </div>

                <div class="d-grid gap-2 d-md-block mt-5 text-center">
                    <a class="btn btn-primary" type="submit" href=" {{ route('admin.home') }}" >
                        Indietro</a>
                </div>
            </div>
        </div>
    </form>

</div>
</body>

</html>
