<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
<div id="container">
    <h1>Dettaglio Categoria "{{ $category->id }}"</h1>
</div>
<div>
    <strong>Nome</strong>
    <span>{{ $category->name }}</span>
</div>

<div class="control">
    <!-- pulsante modifica -->
    <form method="get" action="{{ route('categories.edit', $category->id )  }}">
        @csrf
        @method('PUT')
        <button class="button is-primary mt-5">Modifica</button>
    </form>
    <!-- pulsante torna indietro -->
    <div class="control mb-5">
        <button class="button is-primary mt-5">
            <a href=" {{ route('admin.home') }}">Torna alla dashboard</a>
        </button>
    </div>
</div>

</body>
</html>
