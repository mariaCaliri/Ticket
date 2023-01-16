@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TicketSystem</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        #aside {
            background-color: #212C32;
            padding: 20px;
        }

        #bg-test {
            background-color: #1C272C;
        }
    </style>
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
@endsection
