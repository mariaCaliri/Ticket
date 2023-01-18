<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dettaglio ticket</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .container{
            display: flex;
            justify-content: flex-end;
        }
    </style>

</head>
<body>
<div class="container is-fluid" >
    <div class="card " >
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
                <span>{{ $ticket->registered_at }}</span>
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

        </div>
    </div>
</div>
<!-- pulsante chat -->
<div class="column">

    <div class="box" style="width: 30%">
        <article class="media">
            <div class="media-left">
                <figure class="image is-64x64">
                    <img src="/img/user-profile.png" alt="Image">
                </figure>
            </div>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>Messaggio:</strong>
                        <br>
                        {{ $ticket->message }}
                    </p>
                </div>
                <nav class="level is-mobile">
                    <div class="level-left">

                    </div>
                </nav>
            </div>
        </article>
    </div>
    @foreach($ticket->messages as $message)
    <div class="box" style="width: 30%">
        <article class="media">
            <div class="media-left">
                <figure class="image is-64x64">
                    @if( $message->user_id == '1')
                        <img src="/img/admin2.png" style="width: 65px">
                        <a class=" has-text-black" href="">Amministratore</a>
                    @elseif($message->user_id == '2')
                        <img src="/img/operatore-blu.png">
                        <a class=" has-text-black" href=""> Operatore</a>
                    @else
                        <img src="/img/user-profile.png">
                        <a class=" has-text-black" href=""> Cliente</a>
                    @endif

                </figure>
            </div>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>Messaggio:</strong>
                        <br>
                        {{ $message->body }}
                    </p>
                </div>
                <nav class="level is-mobile">
                    <div class="level-left">

                    </div>
                </nav>
            </div>
        </article>
    </div>
    @endforeach

    <form method="post" action="{{ route('chat.store')}}">
        @csrf
        <div class="field">
            <label class="label">Rispondi</label>
            <div class="control" style="width: 50%">
                <div class="header has-background-grey-lighter" style="width: 100%">
{{--                    <span class="mr-3"> <i class="fa-solid fa-bold"></i></span> <span class="mr-3"><i class="fa-solid fa-italic"></i></span><span class="mr-3"><i class="fa-solid fa-underline"></i></span>--}}
{{--                    <span class="mr-3"><i class="fa-solid fa-list"></i></span><span class="mr-3"><i class="fa-solid fa-list-ol"></i></span>--}}
                    <div class="field has-addons">
                        <p class="control">
                            <button class="button">
      <span class="icon is-small">
        <i class="fas fa-bold"></i>
      </span>
                                <span>Bold</span>
                            </button>
                        </p>
                        <p class="control">
                            <button class="button">
      <span class="icon is-small">
        <i class="fas fa-italic"></i>
      </span>
                                <span>Italic</span>
                            </button>
                        </p>
                        <p class="control">
                            <button class="button">
      <span class="icon is-small">
        <i class="fas fa-underline"></i>
      </span>
                                <span>Underline</span>
                            </button>
                        </p>
                    </div>
                </div>

                    <textarea class="textarea is-link is-small" name="body" placeholder="Contenuto" minlength="5" maxlength="2000" required rows="10"{{ old('body') }}>
                    </textarea>
                </div>

        </div>
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link is-outlined">Pubblica</button>
                <a class="button is-link" href="{{ route('admin.home') }}">Torna alla dashboard </a>
            </div>

        </div>
    </form>

</div>


</body>
</html>
