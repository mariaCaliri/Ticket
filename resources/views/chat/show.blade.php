<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div class="box">
        <div>
            <h1>Stai rispondendo al ticket : "{{ $ticket->id }}"</h1>
            <strong>Messaggio:</strong>
            <span>{{ $ticket->message }}</span>
        </div>
        <div>
            <form method="get" >
                <div class="field">
                    <div class="control  mt-5">
                        <a href="{{ route('chats.create', $ticket->id) }}" class="button  is-link ">Rispondi</a>
                    </div>
                    <div class="control mt-5">
                        <a href="{{ route('chats.index', $ticket->id) }}"  class="button  is-link ">Torna indietro</a>
                    </div>
                </div>
            </form>

        </div>
</div>
</body>
</html>
