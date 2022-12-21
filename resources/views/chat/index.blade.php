<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div id="container">
    @foreach($tickets as $ticket)
    <div>
        <h1>Dettaglio Ticket "{{ $ticket->id }}"</h1>
        <strong>Messaggio:</strong>
        <span>{{ $ticket->message }}</span>

        <form method="post">
        @csrf
            <div class="field">
                <div class="control  mt-5">
                    <a href="{{ route('chat.create', $ticket->id) }}" class="button  is-link ">Rispondi</a>
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                </div>
            </div>
        </form>

    </div>
    @endforeach

</div>
</body>
</html>
