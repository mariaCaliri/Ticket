@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="it">
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

        #aside{
            background-color: #212C32;
            width: 80px;
            height: 94vh;
        }
        #bg-test{
            background-color:#1C272C ;
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

        });
    </script>

</head>
<body>
<div class="container is-fluid">
    <div class="columns">
        <aside>
        <div id="aside" class=" box column is-1">
            <div class="menu is-hidden-mobile">
                <img style="width: 45px" src="/img/logo2.png">
            </div>

            <ul class="menu-list has-text-white">
                <li><a style="color: lightsteelblue;margin-bottom: 10px; width: 60px" href="{{ route('admin.utente.index') }}"> <i class="fa-solid fa-users"></i></a>
                </li>
                <li><a style="color: lightsteelblue;margin-bottom: 5px" href="{{ route('categories.index') }}"> <i class="fa-regular fa-rectangle-list"></i>
                    </a></li>
                <li><a style="color: lightsteelblue;margin-top: 5px" href="{{ route('admin.operatore.index') }}"> <i class="fa-solid fa-users-line"></i></a></li>
                <li><a style="color: lightsteelblue;margin-top: 5px" href="#"> <i class="fa-solid fa-chart-line"></i></a></li>
            </ul>
            <ul class="menu-list has-text-white">
                <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-gear"></i></a>
                </li>
                <li><a style="color: lightsteelblue;margin-bottom: 20px"> <i class="fa-solid fa-user-plus"></i>
                    </a></li>
                <li> <a style="color: lightsteelblue;"><i class="fa-solid fa-circle-question"></i></a></li>
            </ul>
        </div>
        </aside>

<!-- chat-->
    <div class="column is-9" style="position: relative">
        <div id="notification" style="width: 50%;" class="notification is-danger  is-light is-hidden">
            Questo ticket è stato chiuso!
        </div>

        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="/img/user-profile.png" alt="Image">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>{{ $ticket->user_id }} Utente: </strong>
                        <br>
                       {{ $ticket->message }}
                        <br>
                        {{$ticket->created_at}}
                    </p>
                </div>

                @foreach($ticket->messages as $message)
                <article class="media">
                    <figure class="media-left">

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
                    </figure>

                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>
                                    @if( $message->user_id == '1')
                                       Amministratore
                                    @elseif($message->user_id == '2')
                                       Operatore
                                    @else
                                       {{ $user->name }}
                                    @endif
                                </strong>
                                <br>
                                {{ $message->body }}
                                <br>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        @endforeach

{{--        <div class="box" style="width: 30%">--}}
{{--            <article class="media">--}}
{{--                <div class="media-left">--}}
{{--                    <figure class="image is-64x64">--}}
{{--                        <img src="/img/user-profile.png" alt="Image">--}}
{{--                    </figure>--}}
{{--                </div>--}}
{{--                <div class="media-content">--}}
{{--                    <div class="content">--}}
{{--                        <p>--}}
{{--                            <strong>Messaggio:</strong>--}}
{{--                            <br>--}}
{{--                            {{ $ticket->message }}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <nav class="level is-mobile">--}}
{{--                        <div class="level-left">--}}

{{--                        </div>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--        </div>--}}

{{--        @foreach($ticket->messages as $message)--}}
{{--            <article style="width: 30%" class="message is-medium is-info">--}}
{{--                <div class="message-header">--}}
{{--                    @if( $message->user_id == '1')--}}
{{--                        <img src="/img/admin2.png" style="width: 65px">--}}
{{--                        <a class=" has-text-black" href=""></a>--}}
{{--                    @elseif($message->user_id == '2')--}}
{{--                        <img src="/img/operatore-blu.png" style="width: 65px">--}}
{{--                        <a class=" has-text-black" href=""> </a>--}}
{{--                    @else--}}
{{--                        <img src="/img/user-profile.png" style="width: 65px">--}}
{{--                        <a class=" has-text-black" href=""> </a>--}}
{{--                    @endif--}}

{{--                </div>--}}
{{--                <div class="message-body">--}}
{{--                    <strong>Messaggio:</strong>--}}
{{--                    <br>--}}
{{--                    {{ $message->body }}--}}
{{--                </div>--}}
{{--            </article>--}}

{{--        @endforeach--}}
        <div style="position: absolute;bottom: 0px;left: 150px; width: 50%"  >
            @if($ticket->status == 'completato')
                <button class="button" title="Disabled button" disabled>Rispondi</button>
            @else
            <button id="open-text" class="button is-link is-light" style="margin-bottom: 10px;">Rispondi</button>
            @endif
            <form id="textarea" method="post" action="{{ route('chat.store')}}">
                @csrf
                        <textarea class="textarea is-hovered textarea is-medium" name="body" placeholder="Contenuto" minlength="5"
                                  maxlength="2000">
                        </textarea>

                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                <div style="margin-top: 10px" class="field">
                    <div class="control">
                        <button type="submit" class="button is-link is-outlined">Pubblica</button>

                    </div>
                </div>
            </form>
        </div>

        <div class="column is-4" style="background-color: lightgrey">
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
            <div class="card" style="margin-top: 20px">
                <header class="card-header">
                    <p class="card-header-title">
                        Richiedente:
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        {{$ticket->user_id}}

                        <br>
                        <time datetime="2016-1-1">{{$ticket->created_at}}</time>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">Save</a>
                    <a href="#" class="card-footer-item">Edit</a>
                    <a href="#" class="card-footer-item">Delete</a>
                </footer>
            </div>
            <a class="button is-link" href="{{ route('admin.home') }}">Torna alla dashboard </a>
        </div>
    </div>
    </div>
</div>
</body>
</html>
@endsection
