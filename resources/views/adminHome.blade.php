@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TicketSystem</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <style>
        #aside {
            background-color: #212C32;
            height: 94vh;
            width: 65;
        }

        #bg-test {
            background-color: #1C272C;
        }

        .icon {
            margin-bottom: 30px;
        }
    </style>
    <title>Admin-dashboard </title>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let ticketId = document.querySelector('#ticket-id');
            let ticketInputTitle = document.querySelector('#titolo');
            let ticketInputPriority = document.querySelector('#priority');
            let ticketInputStatus = document.querySelector('#status');
            let ticketInputCategory = document.querySelector('#category');
            let categoryId = document.querySelector('#category-id');


            // Functions to open and close a modal
            function openModal($el) {
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            // Add a click event on buttons to open a specific modal
            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    let id = $trigger.dataset.id;
                    let ticketDiv = document.querySelector('div[data-id="' + id + '"]');
                    let TicketTitle = ticketDiv.querySelector('.ticket_title').value;
                    let TicketPriority = ticketDiv.querySelector('.ticket_priority').value;
                    let TicketStatus = ticketDiv.querySelector('.ticket_status').value;
                    let TicketCategory = ticketDiv.querySelector('.ticket_category').value;
                    let CategoryId = ticketDiv.querySelector('.ticket_category_id').value;
                    ticketInputTitle.value = TicketTitle;
                    ticketInputPriority.value = TicketPriority;
                    ticketInputStatus.value = TicketStatus;
                    ticketInputCategory.value = TicketCategory;
                    categoryId.value = CategoryId;
                    ticketId.value = id;
                    console.log(TicketCategory);
                    console.log(ticketId);

                    openModal($target);
                });
            });

            $('body').on('click', '#button-save', function (e) {

                $.ajax({
                    type: 'PUT',
                    url: '/tickets/' + ticketId.value,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:
                        {
                            'title': ticketInputTitle.value,
                            'priority': ticketInputPriority.value,
                            'status': ticketInputStatus.value,
                            'category_id': categoryId.value
                        },
                    success: function (res) {
                        location.reload();
                    }

                });
            });

            // Add a click event on various child elements to close the parent modal
            (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            // Add a keyboard event to close all modals
            document.addEventListener('keydown', (event) => {
                const e = event || window.event;

                if (e.keyCode === 27) { // Escape key
                    closeAllModals();
                }
            });
        });

    </script>
</head>
<body>
<div class="container is-fluid ">
    <div class="columns">
        <!--barra di navigazione laterale-->

        <div id="aside" class="column is-1" style="position: relative">
            <aside>
                <div class="menu is-hidden-mobile">
                    <img style="width: 45px; margin-bottom: 50px" src="/img/logo2.png">
                </div>

                <ul class="menu-list has-text-white">
                    <li><a style="color: lightsteelblue;margin-bottom: 10px; width: 60px"
                           href="{{ route('admin.utente.index') }}"> <i class=" icon fa-solid fa-users fa-xl"></i> </a>
                    </li>
                    <li><a style="color: lightsteelblue;margin-bottom: 5px" href="{{ route('categories.index') }}"> <i
                                class="icon fa-regular fa-rectangle-list  fa-xl"></i>
                        </a></li>
                    <li><a style="color: lightsteelblue;margin-top: 5px" href="{{ route('admin.operatore.index') }}"> <i
                                class="icon fa-solid fa-users-line  fa-xl"></i></a></li>
                    <li><a style="color: lightsteelblue;margin-top: 5px" href="#"> <i
                                class="icon fa-solid fa-chart-line"></i></a></li>
                </ul>
                <div style="position: absolute;bottom: 0px;margin-bottom: 20px">
                    <ul class="menu-list has-text-white">
                        <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-gear icon fa-xl"></i></a>
                        </li>
                        <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-user-plus icon fa-xl"></i>
                            </a></li>
                        <li><a style="color: lightsteelblue;"><i class="fa-solid fa-circle-question icon fa-xl"></i></a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>

        <div class="column is-10">
            <div>
                <!-- Main container -->
                <nav class="level">
                    <!-- Left side -->
                    <div class="level-left">
                        <div class="level-item">
                            <p class="subtitle is-5">
                                <strong>10 </strong>Tickets
                            </p>
                        </div>
                        <div class="level-item">

                        </div>
                    </div>

                    <!-- Right side -->
                    <div class="level-right ">
                        <label class="radio">
                            <input type="radio" name="answer">
                            Tutti
                        </label>
                        <label class="radio">
                            <input type="radio" name="answer">
                            Aperti
                        </label>
                        <label class="radio">
                            <input type="radio" name="answer">
                            Chiusi
                        </label>
                        {{--                            <p class="level-item"><a class="button is-success">New</a></p>--}}
                    </div>
                </nav>
                <div class="card events-card">
                    <header class="card-header">
                        <p class="card-header-title  has-background-grey-lighter ">
                            Tickets
                        </p>
                    </header>
                    <div class="table-container">
                        <div class="card-table">
                            <div class="content">
                                <table class="table is-fullwidth is-striped">
                                    <thead>
                                    <tr>
                                        <th> Id</th>
                                        <th>Titolo</th>
                                        <th>Data di apertura</th>
                                        <th>Categoria</th>
                                        <th>Stato</th>
                                        <th>Priorità</th>
                                        <th>Assegna</th>
                                        <th>Azioni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->id }}
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
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->registered_at }}</td>
                                            <td>{{ $ticket->category->name }}</td>

                                            <td>
                                                @if( $ticket->status =='in attesa')
                                                    <a class=" has-text-success" href="">In Attesa</a>
                                                @elseif($ticket->status == 'in lavorazione')
                                                    <a class=" has-text-warning" href=""> In Lavorazione</a>
                                                @elseif($ticket->status == 'completato')
                                                    <a class=" has-text-danger" href=""> Ticket chiuso</a>
                                                @endif
                                            </td>
                                            <td> {{ $ticket->priority }}</td>
                                            <td><i class="fa-solid fa-user-plus"></i></td>

                                            <td>
                                                <div class="field is-grouped">
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
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">View All</a>
                </footer>
            </div>
            <nav class="pagination" role="navigation" aria-label="pagination">
                <a class="pagination-previous">Previous</a>
                <a class="pagination-next">Next page</a>
                <ul class="pagination-list">
                    <li>
                        <a class="pagination-link" aria-label="Goto page 1">1</a>
                    </li>
                    <li>
                        <span class="pagination-ellipsis">&hellip;</span>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 45">45</a>
                    </li>
                    <li>
                        <a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 47">47</a>
                    </li>
                    <li>
                        <span class="pagination-ellipsis">&hellip;</span>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 86">86</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- seconda colonna -->
        <div class="column is-1 has-background-grey-lighter">
            <div class="field has-addons">
                <p class="control">
                    <input class="input" type="text" placeholder="Trova un ticket">
                </p>
                <p class="control ">
                    <button class="button is-info">
                        Cerca
                    </button>
                </p>
            </div>
            <aside class="menu">
                <p style="color: #0a58ca" class="menu-label">
                    Tutti i ticket
                </p>
                <ul class="menu-list">
                    <li><a> Tickets da gestire <span style=" border-radius:50%;background-color: white">10</span> </a></li>
                    <li><a>Miei ticket <span style=" border-radius:50%;background-color: white">10</span></a> </li>
                </ul>
                <p class="menu-label">
                    La mia vista
                </p>
                <ul class="menu-list">
                    <li><a>Tickets gestiti negli ultimi 7 giorni</a></li>

                </ul>
                <p class="menu-label">
                    Status
                </p>
                <ul class="menu-list">
                    <li><a>Aperti</a></li>
                    <li><a>In attesa</a></li>
                    <li><a>Chiusi</a></li>
                </ul>
            </aside>
        </div>
    </div>
</div>
<div id="ticket-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Modifica Ticket</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <!-- Content ... -->
            <form id="editTicket" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Titolo:</strong>
                            <input type="text" name="title" class="form-control"
                                   placeholder="titolo" id="titolo">

                            <input type="hidden" id="ticket-id">

                            <div class="select is-multiple ">
                                <strong>Priorità:</strong>
                                <select name="priority" id="priority">
                                    <option>{{ $ticket->priority}} </option>
                                    <option value="urgente">urgente</option>
                                    <option value="mediamente urgente">mediamente urgente</option>
                                    <option value="non urgente">non urgente</option>
                                </select>
                            </div>

                            <div class="select is-multiple ">
                                <strong>Status:</strong>
                                <select name="status" id="status">
                                    <option>{{ $ticket->status}} </option>
                                    <option value="in lavorazione">in lavorazione</option>
                                    <option value="completato">completato</option>
                                    <option value="in attesa">in attesa</option>
                                </select>
                            </div>

                            <div class="select is-multiple">
                                <strong>categoria</strong>
                                <select name="category" id="category">
                                    <option>{{ $ticket->category->name }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                    <input type="hidden" id="category-id">
                                </select>
                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </section>
        <footer class="modal-card-foot">
            <button id="button-save" class="button is-success">Salva</button>
            <button class="button">Annulla</button>
        </footer>
    </div>
</div>

<script src=" {{ asset('js/nav.js') }}"></script>
{{--<script src="{{ asset('js/modal.js') }}"></script>--}}
</body>
</html>
@endsection
