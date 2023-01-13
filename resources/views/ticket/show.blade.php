<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dettaglio ticket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
<div class="container" style="width: 40%;">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
             Dettaglio Ticket "{{ $ticket->id }}"
            </p>
        </header>
        <div class="card-content">
            <div class="content">
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
                <strong>Categoria</strong>
                <span>{{ $ticket->category->name }}</span>
            </div>
            <div>
                <strong>Operator</strong>
                <span>{{ $ticket->operator->name }}</span>
            </div>


                <footer class="card-footer">

                    <form method="get" action="{{ route('tickets.edit', $ticket->id )  }}">
                        @csrf
                        @method('PUT')
                        <button class="button is-info mt-5">Modifica</button>
                    </form>

                    <button class="button is-primary mt-5">
                        <a href=" {{ route('admin.home') }}">Torna alla dashboard</a>
                    </button>
                    <a href="#" class="card-footer-item">Chiudi</a>
                </footer>

        </div>
    </div>
</div>
        <!-- pulsante chat -->
        <div class="control mt-5">
            <div>
                <strong>Messaggio:</strong>
                <span>{{ $ticket->message }}</span>
            </div>
            <div class="control mt-5">
                <div class="mt-5">
                    <table class="table is-bordered mt-5">
                        <tr>
                            <th>Utente</th>
                            <th>Messaggio</th>
                        <tr>
                            @foreach($ticket->messages as $message)
                                <td>
                                    @if( $message->user_id == '1')
                                        <a class=" has-text-black" href="">Amministratore</a>
                                    @elseif($message->user_id == '2')
                                        <a class=" has-text-black" href=""> Operatore</a>
                                    @else
                                        <a class=" has-text-black" href=""> Cliente</a>
                                    @endif
                                </td>
                                <td>
                                    {{ $message->body }}
                                </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <form method="post" action="{{ route('chat.store')}}">
                @csrf
                <div class="field">
                    <label class="label">Contenuto</label>
                    <div class="control">
                    <textarea
                        name="body"
                        class="textarea"
                        placeholder="Contenuto"
                        minlength="5"
                        maxlength="2000"
                        required rows="10"
                    >{{ old('body') }}</textarea>
                    </div>
                </div>
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link is-outlined">Pubblica</button>
                    </div>
                    <button class="button is-primary mt-5">
                        <a href="">Chiudi Ticket</a>
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
