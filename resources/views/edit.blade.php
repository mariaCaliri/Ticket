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
    <form action="{{ route('tickets.update',$ticket->id) }}" method="Post" enctype="multipart/form-data">
@csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titolo:</strong>
                    <input type="text" name="title" value="{{ $ticket->title }}" class="form-control" placeholder="Company name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Priorità:</strong>
                        <input type="text" name="priority" class="form-control" placeholder="Priorità" value="{{ $ticket->priority }}">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stato:</strong>
                    <input type="text" name="status" class="form-control" placeholder="Stato" value="{{ $ticket->status }}">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                <div class="form-floating">
                        <select name="category" >
                            <option selected>Seleziona categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                </div>

            <div class="d-grid gap-2 d-md-block mb-5 text-center">
                <button class="btn btn-primary " type="button">Invia</button>
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
