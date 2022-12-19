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
    <div class="control m-5">
        <input class="input" type="text" name="title" value="{{ old('title') }}" placeholder="Inserisci titolo">
    </div>

    <textarea class="textarea" name="message" value="{{ old('message') }}" placeholder="Messaggio"></textarea>


    <div class="control m-5">
        <div class="select">
            <select name="priority">
                <option>Seleziona la priorità problema</option>
                <option value="urgente">Urgente</option>
                <option value="mediamente urgente">Mediamente Urgente</option>
                <option value="non urgente">Non urgente</option>
            </select>
        </div>
    </div>

    <div class="control m-5">
        <div class="select">
            <select name="category_id" >
                <option selected>Seleziona categoria</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <label for="start">Data di oggi:</label>

    <input type="date"  name="start_date"
           value="2018-07-22"
           min="2018-01-01" max="2022-12-31">

    <div class="control m-5">
        <button type="submit" class="button is-primary">Submit</button>
    </div>


</form>

</body>
</html>
