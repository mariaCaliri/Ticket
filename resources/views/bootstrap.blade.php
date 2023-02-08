<!doctype html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <div class="full-container">
        <div class=" bg-secondary col-12">
            <!-- navbar-->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand text-light" href="#">Ticketsystem</a>
                    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-sm-block d-md-none">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Utenti</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Operatori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Categorie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>

                    </ul>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="bg-secondary col-md-2 d-none d-sm-block" style=" height: 100vh">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Utenti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Operatori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light">Categorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light">Settings</a>
                    </li>
                </ul>
            </div>
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
                                        <!-- select display large-->
                                            <select name="operator_id" class="form-select form-select-sm d-none d-md-block" data-id="{{ $ticket->id }}">
                                                <option selected>Assegna Operatore</option>
                                                @foreach($operators as $operator)
                                                    <option value="{{ $operator->id }}">{{$operator->name}}</option>
                                                @endforeach
                                            </select>
                                        <!-- select display small-->
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle d-sm-block d-md-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-user-plus"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach($operators as $operator)
                                                <li><a class="dropdown-item" href="#">{{$operator->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </form>
                                </td>

                                <td>
                                    <div  class="btn-group" role="group">
                                        <p class="control">
                                            <a class="btn btn-primary" style="color: black;margin-right: 5px"
                                               href=" {{route('tickets.show',$ticket->id)  }}"> <i
                                                    class="fa-solid fa-magnifying-glass"></i></a>
                                        </p>
                                        <p class="control">

                                            <button class="btn btn-success"
                                                    style="color: black;margin-right: 5px" data-target="ticket-modal"
                                                    data-id="{{ $ticket->id }}">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button>
                                        </p>
                                        <p class="control">

                                        <form action="{{ route('tickets.destroy',$ticket->id) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
