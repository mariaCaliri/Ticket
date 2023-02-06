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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>

        #container{

            margin-right: 0px;
            margin-left: 0px;
        }

        #aside {

        height: 94vh;
        }
        #filters{
            height: 100%; /* 100% Full-height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0;
            right: 0;
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
        }
        #openFilters{
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }
        #main {
            transition: margin-right .5s; /* If you want a transition effect */
            padding: 20px;
        }

        #closeBtn{
            display: flex;
            justify-content: flex-end;
        }

        #bg-test {
            background-color: #1C272C;
        }

    </style>
    <title>Admin-dashboard </title>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const chart = Highcharts.chart('container-chart', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Ticket Risolti'
                },
                xAxis: {
                    categories: ['Aperti', 'Chiusi', 'In attesa']
                },
                yAxis: {
                    title: {
                        text: 'Ultimo mese'
                    }
                },
                series: [{
                    name: 'In attesa',
                    data: [1, 0, 4]
                }, {
                    name: 'Risolti',
                    data: [5, 7, 3]
                }]
            });


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

            $('.operatorSelect').on('change', function (e){

              let id = ($(this).val());
               let ticket_id = $(this).attr('data-id');

                $.ajax({
                    url: 'tickets/operator/edit/' +ticket_id ,
                    type : 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:
                        {
                            'operator_id': id
                        },
                    error: function(result) {
                        console.log('error ' + result);
                    },

                })
            });

            let openBtn = document.querySelector('#openFilters');
            let filters = document.querySelector('#filters');
            let closBtn = document.querySelector('#closeBtn');
            let main = document.querySelector('#main');
            openBtn.addEventListener('click', function() {
                filters.style.width = "250px";
                main.style.marginRight = "250px";
            });

            closBtn.addEventListener('click', function(){
                filters.style.width = "0%";
                main.style.marginRight = "0%";
            });


        });


    </script>
</head>
<body>
<div style="padding: 0" id="container" class="container is-fluid">
    <div class="columns">
        <!--barra di navigazione laterale-->
            <div id="aside" class="column is-2 has-background-grey-dark">

                    <div class="has-text-centered mt-2">
                        <img style="width: 75px; margin-bottom: 50px" src="/img/admin2.png">
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
                            <a style="color: lightsteelblue;margin-top: 5px" href="{{ route('reports') }}"> <i class="icon fa-solid fa-chart-line fa-xl"></i> <span class="name ml-4">Report</span></a>
                        </li>



                        <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-gear icon fa-xl"></i><span class="name ml-4">Settings</span></a>
                        </li>
                        <li><a style="color: lightsteelblue;"> <i class="fa-solid fa-user-plus icon fa-xl"></i><span class="name ml-4">Aggiungi</span>
                            </a></li>
                        <li><a style="color: lightsteelblue;"><i class="fa-solid fa-circle-question icon fa-xl"></i><span class="name ml-4">Help</span></a>
                        </li>
                        <li> <button id="openFilters" class="button">Filtri</button></li>
                    </ul>
                </div>
            </div>

        <div id="main" class="column ">
            <div class="mb-5">
                <!-- Main container -->
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">4</p>
                                <p class="subtitle">Aperti</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">3</p>
                                <p class="subtitle">In Attesa</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">3</p>
                                <p class="subtitle">Chiusi</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">5</p>
                                <p class="subtitle">Utenti</p>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card events-card" style="margin-bottom: 50px">
                <header class="card-header">
                    <p class="card-header-title  has-background-grey-lighter ">
                        Tickets
                    </p>
                </header>
                <div>
                    <div class="card-content">
                        <div class="content">
                            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
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
            <!-- diagramma-->

            <div class="mt-5" id="container-chart" style="width:100%; height:400px;"></div>
        </div>

        <!-- seconda colonna -->
        <div id="filters" class="column has-background-white-ter">
            <p class="panel-heading">
                <span id="closeBtn" style=" right: 25px;">
                 <i class="fa-solid fa-xmark"></i>
                </span>
            </p>
            <nav class="panel">
                <div class="panel-block">
                    <p class="control has-icons-left">
                        <input class="input" type="text" placeholder="Cerca un ticket">
                        <span class="icon is-left">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>

                <a class="panel-block is-active ">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                    Tutti
                </a>
                <a class="panel-block">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                   Aperti
                </a>
                <a class="panel-block">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                    Chiusi
                </a>
                <a class="panel-block">
                    <span class="panel-icon">
                      <i class="fa-solid fa-ticket"></i>
                    </span>
                    Pendenti
                </a>

                <label class="panel-block">
                    <input type="checkbox">
                    Ricorda
                </label>
                <div class="panel-block">
                    <button class="button is-link is-outlined is-fullwidth">
                        Resetta Filtri
                    </button>
                </div>
            </nav>

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
                            <input type="text" name="title" class="input"
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

