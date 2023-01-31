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

        #aside {
            background-color: #212C32;
            height: 94vh;
        }

        #bg-test {
            background-color: #1C272C;
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

        <div id="aside" class="column is-1 is-fullheight has-background-grey-dark" style="position: relative">

            <div class="has-text-centered">
                <img style="width: 45px; margin-bottom: 50px" src="/img/logo2.png">
            </div>

            <div class="menu">
                <ul class="menu-list has-text-white ">
                    <li>
                        <a style="color: lightsteelblue;"href="{{ route('admin.utente.index') }}"><span class="icon"> <i class=" icon fa-solid fa-users fa-xl"></i></span><span class="name ml-4">Utenti</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;" href="{{ route('admin.operatore.index') }}"><span class="icon"><i class="icon fa-solid fa-users-line  fa-xl"></i> </span><span class="name ml-4">Operatori</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;" href="{{ route('categories.index') }}"><span class="icon"> <i class="icon fa-regular fa-rectangle-list  fa-xl"></i></span><span class="name ml-4">Categorie</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-top: 5px" href="#"> <i class="icon fa-solid fa-chart-line"></i> <span class="name ml-4">Report</span></a>
                    </li>

                    <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-gear icon fa-xl"></i><span class="name ml-4">Settings</span></a>
                    </li>
                    <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-user-plus icon fa-xl"></i><span class="name ml-4">Aggiungi</span>
                        </a></li>
                    <li><a style="color: lightsteelblue;"><i class="fa-solid fa-circle-question icon fa-xl"></i><span class="name ml-4">Help</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- chat-->
        <div class="column is-8" style="position: relative">
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
                </div>
            </article>
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
            <div style="position: absolute;bottom: 0px;left: 150px; width: 50%">
                <form id="textarea" method="post" action="{{ route('chat.store')}}">
                    @csrf
                    <textarea class="textarea is-hovered textarea is-medium" name="body" placeholder="Contenuto"
                              minlength="5"
                              maxlength="2000">
                        </textarea>

                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                    <div style="margin-top: 10px" class="field">
                        <div class="control">
                            @if($ticket->status == 'completato')
                            <button type="submit" class="button is-link is-outlined" title="Disabled button" disabled>Pubblica</button>
                            @else
                                <button type="submit" class="button is-link is-outlined" >Pubblica</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <div class="column is-3 has-background-white-ter"  style="position: relative">
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
                </div>
                <a style="position: absolute;bottom: 0px;" class="button is-link" href="{{ route('admin.home') }}">Torna alla dashboard </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection
