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
            <div class="pull-right">
                <a class="btn btn-primary" href=" {{ route('admin.home') }}" >
                    Indietro</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
@endif
    <form action="{{ route('tickets.update',$ticket->id) }}" method="GET" enctype="multipart/form-data">
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

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <input type="text" name="category" class="form-control" placeholder="Categoria" value="{{ $ticket->category->name }}">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>

        </div>
    </form>
</div>
</body>

</html>
