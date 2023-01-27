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
        .container {
            display: flex;
            justify-content: flex-end;
        }
        #textarea{
            display: none;
        }

    </style>
    <script>

        window.addEventListener('DOMContentLoaded', (event) => {
            let notification = document.querySelector('#notification');
            let status = document.querySelector('#status').textContent;
            let textarea = document.querySelector('#textarea');
            let openText = document.querySelector('#open-text')

            if (status === 'completato') {
                notification.classList.remove('is-hidden');
            }

            openText.addEventListener('click', function(){
                textarea.style.display= "block";
            });
        });
    </script>



</head>
<body>
<div class="container is-fluid">

    <div class="card ">
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
                <span id="status">{{ $ticket->status }}</span>
            </div>
            <div>
                <strong>Categoria</strong>
                <span>{{ $ticket->category->name }}</span>
            </div>

        </div>
    </div>
</div>

<div class="column">
    <div id="notification" style="width: 50%;" class="notification is-danger  is-light is-hidden">
        Questo ticket è stato chiuso!
    </div>
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
    {{--    @foreach($ticket->messages as $message)--}}
    {{--    <div class="box" style="width: 30%">--}}
    {{--        <article class="media">--}}
    {{--            <div class="media-left">--}}
    {{--                <figure class="image is-64x64">--}}
    {{--                    @if( $message->user_id == '1')--}}
    {{--                        <img src="/img/admin2.png" style="width: 65px">--}}
    {{--                        <a class=" has-text-black" href="">Amministratore</a>--}}
    {{--                    @elseif($message->user_id == '2')--}}
    {{--                        <img src="/img/operatore-blu.png">--}}
    {{--                        <a class=" has-text-black" href=""> Operatore</a>--}}
    {{--                    @else--}}
    {{--                        <img src="/img/user-profile.png">--}}
    {{--                        <a class=" has-text-black" href=""> Cliente</a>--}}
    {{--                    @endif--}}

    {{--                </figure>--}}
    {{--            </div>--}}
    {{--            <div class="media-content">--}}
    {{--                <div class="content">--}}
    {{--                    <p>--}}
    {{--                        <strong>Messaggio:</strong>--}}
    {{--                        <br>--}}
    {{--                        {{ $message->body }}--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--                <nav class="level is-mobile">--}}
    {{--                    <div class="level-left">--}}

    {{--                    </div>--}}
    {{--                </nav>--}}
    {{--            </div>--}}
    {{--        </article>--}}
    {{--    </div>--}}
    {{--    @endforeach--}}

    @foreach($ticket->messages as $message)
        <article style="width: 30%" class="message is-medium is-info">
            <div class="message-header">
                @if( $message->user_id == '1')
                    <img src="/img/admin2.png" style="width: 65px">
                    <a class=" has-text-black" href=""></a>
                @elseif($message->user_id == '2')
                    <img src="/img/operatore-blu.png" style="width: 65px">
                    <a class=" has-text-black" href=""> </a>
                @else
                    <img src="/img/user-profile.png" style="width: 65px">
                    <a class=" has-text-black" href=""> </a>
                @endif

            </div>
            <div class="message-body">
                <strong>Messaggio:</strong>
                <br>
                {{ $message->body }}
            </div>
        </article>

    @endforeach
    @if($ticket->status == 'completato')
        <button class="button" title="Disabled button" disabled>Rispondi</button>
    @else
    <button id="open-text" class="button is-link is-light" style="margin-bottom: 10px;">Rispondi</button>
    @endif
    <form id="textarea" method="post" action="{{ route('chat.store')}}">
        @csrf
                <textarea class="textarea is-hovered textarea is-medium" style="width: 50%"  name="body" placeholder="Contenuto" minlength="5"
                          maxlength="2000">
                </textarea>


        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

        <div style="margin-top: 10px" class="field">
            <div class="control">
                <button type="submit" class="button is-link is-outlined">Pubblica</button>

            </div>
        </div>
    </form>
    <a class="button is-link" href="{{ route('admin.home') }}">Torna alla dashboard </a>
</div>

</body>
</html>
