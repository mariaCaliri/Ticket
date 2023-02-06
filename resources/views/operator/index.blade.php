@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Pagina operatori</title>
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
            padding: 20px;
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let operatorInputName = document.querySelector('#operator-name');
            let operatorId = document.querySelector('#operator-id');
            let operatorInputEmail = document.querySelector('#operator-email');
            let operatorInputPassword = document.querySelector('#operator-password');


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

                <!--imposto i dati degli operatori nella modale-->
                $trigger.addEventListener('click', () => {
                    let id = $trigger.dataset.id;
                    let operatorDiv = document.querySelector('div[data-id="' + id + '"]');
                    let operatorName = operatorDiv.querySelector('.operator_name').value;
                    let operatorEmail = operatorDiv.querySelector('.operator_email').value;
                    let operatorPassword = operatorDiv.querySelector('.operator_password').value;
                    operatorInputName.value = operatorName;
                    operatorInputEmail.value = operatorEmail;
                    operatorInputPassword.value = operatorPassword;
                    operatorId.value = id;

                    openModal($target);
                });
            });

            $('body').on('click', '#button-save', function (e){
                $.ajax({
                   type: 'PUT',
                    url: '/admin/operatore/' + operatorId.value,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:
                        {
                        'name':  operatorInputName.value ,
                        'email': operatorInputEmail.value,
                        'password': operatorInputPassword.value
                         },
                    success: function (res){
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

<div class="container is-fluid" style="padding: 0">
    <div class="columns">
        <div id="aside" class="column is-2 has-background-grey-dark" style="position: relative">

            <div class="has-text-centered">
                <img style="width: 75px; margin-bottom: 50px" src="/img/admin2.png">
            </div>

            <div class="menu">
                <ul class="menu-list has-text-white ">
                    <li style="color: lightsteelblue"><a style="color: lightsteelblue;margin-top: 20px"
                                                         class="has-text-white" href="{{ route('admin.home') }}">
                            <span style="color: lightsteelblue"><i class="fa-solid fa-house-user fa-xl"></i></span style="color: lightsteelblue">
                            Home</a></li>

                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px"href="{{ route('admin.utente.index') }}"><span class="icon"> <i class=" icon fa-solid fa-users fa-xl"></i></span><span class="name ml-4">Utenti</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px" href="{{ route('admin.operatore.index') }}"><span class="icon"><i class="icon fa-solid fa-users-line  fa-xl"></i> </span><span class="name ml-4">Operatori</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px" href="{{ route('categories.index') }}"><span class="icon"> <i class="icon fa-regular fa-rectangle-list  fa-xl"></i></span><span class="name ml-4">Categorie</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px" href="{{ route('reports') }}"> <i class="icon fa-solid fa-chart-line fa-xl"></i> <span class="name ml-4">Report</span></a>
                    </li>



                    <li><a style="color: lightsteelblue;margin-top: 20px"> <i class="fa-solid fa-gear icon fa-xl"></i><span class="name ml-4">Settings</span></a>
                    </li>
                    <li><a style="color: lightsteelblue;margin-top: 20px"> <i class="fa-solid fa-user-plus icon fa-xl"></i><span class="name ml-4">Aggiungi</span>
                        </a></li>
                    <li><a style="color: lightsteelblue;margin-top: 20px"><i class="fa-solid fa-circle-question icon fa-xl"></i><span class="name ml-4">Help</span></a>
                    </li>
                    <li> <button id="openFilters" class="button">Filtri</button></li>
                </ul>
            </div>
        </div>

        <div class="column" id="main">
                <div >
                    <!-- Main container -->
                    <div class="card events-card">
                        <header class="card-header">
                            <p class="card-header-title  has-background-grey-lighter ">
                                Operatori
                            </p>
                        </header>
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center"> Id </i>
                                            </th>
                                            <th style="text-align: center">Nome </i>
                                            </th>
                                            <th style="text-align: center">Email </i>
                                            </th>
                                            <th style="text-align: center">Actions </i>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($operators as $operator)
                                            <tr>
                                                <td style="text-align: center">
                                                    {{ $operator->id }}
                                                    <div class="hidden"  data-id="{{ $operator->id }}">
                                                        <input class="operator_name" type="hidden"value="{{ $operator->name }}">
                                                        <input  class="operator_email" type="hidden"  value="{{ $operator->email }}">
                                                        <input class="operator_password" type="hidden" value="{{ $operator->password }}">
                                                    </div>
                                                </td>
                                                <td style="text-align: center">{{ $operator->name }}</td>
                                                <td style="text-align: center">{{ $operator->email }}</td>
                                                <td>
                                                    <div style="justify-content: center" class="field is-grouped">
                                                        <p class="control">
                                                            <button class="js-modal-trigger button is-primary" style="color: black"  data-target="modal-edit-operator" data-id="{{ $operator->id }}">
                                                                <i class="fa-solid fa-pencil"></i>
                                                            </button>
                                                        </p>
                                                        <p class="control">
                                                             <a class="button is-info" style="color: black"  href="{{ route('admin.operatore.show',$operator->id) }}"> <i class="fa-solid fa-magnifying-glass"></i></a>
                                                        </p>
                                                        <p class="control">
                                                            <a class="button is-warning" style="color: black"   href="{{ route('send.email.view',$operator->id) }}"><i class="fa-regular fa-envelope"></i></a>
                                                        </p>
                                                        <p class="control">
                                                            <form action="{{ route('admin.operatore.destroy',$operator->id) }}" method="Post">
                                                                @csrf
                                                                @method('DELETE')
                                                                  <button class="button is-danger" type="submit" >  <i class="fa-solid fa-trash has-text-black "></i></button>
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
                </div>
        </div>
        <div id="filters" class="has-background-white-ter">
            <nav class="panel">
                <p class="panel-heading">
                     <span id="closeBtn" style=" right: 25px;">
                 <i class="fa-solid fa-xmark"></i>
                </span>
                </p>
                <div class="panel-block">
                    <p class="control has-icons-left">
                        <input class="input" type="text" placeholder="Cerca Operatore">
                        <span class="icon is-left">
                            <i class="fas fa-search" aria-hidden="true"></i>
                          </span>
                    </p>
                </div>

                <a class="panel-block is-active">
                    <span class="panel-icon">
                      <i class="fas fa-book" aria-hidden="true"></i>
                    </span>
                    Tutti
                </a>
                <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-book" aria-hidden="true"></i>
                </span>
                    Attivi
                </a>
                <a class="panel-block" href="{{ route('admin.operatore.create') }}">
                       <span class="panel-icon">
                         <i class="fa-solid fa-plus"></i>
                       </span>
                    Aggiungi Operatore
                </a>


                <a class="panel-block"  href="{{ route(('send.email.all.view')) }}"a class="panel-block">
                    <span class="panel-icon">
                      <i class="fa-solid fa-envelopes-bulk"></i>
                    </span>
                     </span> Invia email a tutti gli operatori</a>


                <label class="panel-block">
                    <input type="checkbox">
                    Ricorda Filtri
                </label>
                <div class="panel-block">
                    <button class="button is-link is-outlined is-fullwidth">
                        Azzera filtri
                    </button>
                </div>
            </nav>
    </div>
    <!--Modale-->
    <div id="modal-edit-operator" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modifica Operatore</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <form id="editCategory" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nome Operatore:</strong>
                                <input class="input" type="text" name="name"  class="form-control"
                                       placeholder="nome" id="operator-name">
                                <input type="hidden" id="operator-id">
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <strong>Email:</strong>
                                <input class="input" type="text" name="email"  class="form-control"
                                       placeholder="email" id="operator-email">
                                <strong>Password:</strong>
                                <input class="input" type="text" name="password"  class="form-control"
                                       placeholder="password" id="operator-password">
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
</div>

</body>
</html>
@endsection
