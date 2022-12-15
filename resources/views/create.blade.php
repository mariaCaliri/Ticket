<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<h1>Crea Nuovo Ticket</h1>
<form method="post" action="{{ route('tickets.store') }}">
    @csrf
    <div class="control">
        <input class="input" type="text" name="title" value="{{ old('title') }}" placeholder="Inserisci tipo di problema">
    </div>

    <div class="control">
        <input class="input" type="text" name="category"  value="{{ old('category') }}" placeholder="Inserisci la categoria">
    </div>
    <textarea class="textarea" name="message" value="{{ old('message') }}" placeholder="Messaggio"></textarea>

    <div class="control">
        <div class="select">
            <select name="status">
                <option>Seleziona gravità del problema</option>
                <option value="1">Urgente</option>
                <option value="2">Mediamente Urgente</option>
                <option value="3">Non urgente</option>
            </select>
        </div>
    </div>
    <div class="control">
        <div class="select" name="category">
            <select name="category" class="form-control">
                <option value="">Seleziona categoria</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="control">
        <button type="submit" class="button is-primary">Submit</button>
    </div>


</form>

</body>
</html>
