<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <div>
        <h1>Dettaglio Ticket "{{ $ticket->id }}"</h1>

        <div>
            <strong>Titolo: </strong>
            <span>{{ $ticket->title }}</span>
        </div>
        <div>
            <strong>Data di Apertura</strong>
            <span>{{ $ticket->start_date }}</span>
        </div>
        <div>
            <strong>Priorità</strong>
            <span>{{ $ticket->priority }}</span>
        </div>
        <div>
            <strong>Status</strong>
            <span>{{ $ticket->status }}</span>
        </div>
        <div>
            <strong>Category</strong>
            <span>{{ $ticket->category->name }}</span>
        </div>
        <div>
            <strong>Operator</strong>
            <span>{{ $ticket->operator->name }}</span>
        </div>

        <div class="control">
            <form method="get" action="{{ route('tickets.edit', $ticket->id )  }}">
                @csrf
                @method('PUT')
            <button class="button is-primary mt-5">Modifica</button>
            </form>

            <div class="control">
                <button class="button is-primary mt-5">
                    <a href=" {{ route('admin.home') }}" >Torna alla dashboard</a>
                </button>

        </div>

            </form>
        </div>
    </div>
</body>
</html>
