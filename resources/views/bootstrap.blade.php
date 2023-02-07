<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="full-container">
            <div class=" bg-secondary col-12">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <a class="navbar-brand" href="#">Ticketsystem</a>

                            <div class="d-flex">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       Account
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </nav>
{{--                <nav class="navbar navbar-dark bg-dark">--}}
{{--                    <div class="container-fluid">--}}
{{--                        <span class="navbar-brand mb-0 h1">Ticketystem</span>--}}
{{--                    </div>--}}
{{--                    <form class="d-flex">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Account--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="#">Logout</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                        </ul>--}}
{{--                    </form>--}}
{{--                </nav>--}}
            </div>
            <div class="row">
                <div class="bg-secondary col-md-2 d-none d-md-block vh-100">sidebar</div>
                <div class="bg-light col-md-10 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center"> Id</th>
                                <th style="text-align: center">Titolo</th>
                                <th style="text-align: center">Data di apertura</th>
                                <th style="text-align: center">Categoria</th>
                                <th style="text-align: center">Stato</th>
                                <th style="text-align: center">Priorità</th>
                                <th style="text-align: center">Operatore</th>
                                <th style="text-align: center">Azioni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td style="text-align: center">{{ $ticket->id }}
                                        <div class="hidden" data-id="{{ $ticket->id }}">
                                            <input class="ticket_title" type="hidden"
                                                   value="{{ $ticket->title }}">
                                            <input class="ticket_priority" type="hidden"
                                                   value="{{ $ticket->priority }}">
                                            <input class="ticket_status" type="hidden"
                                                   value="{{ $ticket->status }}">
                                            <input class="ticket_category_id" type="hidden"
                                                   value="{{ $ticket->category->id }}">
                                            <input class="ticket_category" type="hidden"
                                                   value="{{ $ticket->category->name }}">
                                        </div>
                                    </td>
                                    <td style="text-align: center">{{ $ticket->title }}</td>
                                    <td style="text-align: center">{{ $ticket->registered_at }}</td>
                                    <td style="text-align: center">{{ $ticket->category->name }}</td>

                                    <td style="text-align: center">
                                        @if( $ticket->status =='in attesa')
                                            <a class=" has-text-success" href="">In Attesa</a>
                                        @elseif($ticket->status == 'in lavorazione')
                                            <a class=" has-text-warning" href=""> In Lavorazione</a>
                                        @elseif($ticket->status == 'completato')
                                            <a class=" has-text-danger" href=""> Ticket chiuso</a>
                                        @endif
                                    </td>
                                    <td style="text-align: center"> {{ $ticket->priority }}</td>

                                    <td style="text-align: center">

                                        <form method="post">
                                            @method('PUT')
                                            @csrf
                                            <div class="select">
                                                <select name="operator_id" class="operatorSelect" data-id="{{ $ticket->id }}">
                                                    <option>Assegna Operatore</option>
                                                    @foreach($operators as $operator)
                                                        <option value="{{ $operator->id }}">{{$operator->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </td>

                                    <td>
                                        <div style="justify-content: center" class="field is-grouped">
                                            <p class="control">
                                                <a class="button is-info" style="color: black"
                                                   href=" {{route('tickets.show',$ticket->id)  }}"> <i
                                                        class="fa-solid fa-magnifying-glass"></i></a>
                                            </p>
                                            <p class="control">

                                                <button class="js-modal-trigger button is-primary"
                                                        style="color: black" data-target="ticket-modal"
                                                        data-id="{{ $ticket->id }}">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                            </p>
                                            <p class="control">

                                            <form action="{{ route('tickets.destroy',$ticket->id) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="button is-danger" type="submit"><i
                                                        class="fa-solid fa-trash has-text-black"></i></button>
                                            </form>

                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</head>
<body>







































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
