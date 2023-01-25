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

        #bg-test {
            background-color: #1C272C;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let operatorInputName = document.querySelector('#operator-name');
            let btnSave = document.querySelector('#button-save');
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
                    data: {
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
        });
    </script>
</head>
<body>

<div class="container is-fluid">
    <div class="columns">
        <div id="aside" class=" box column is-2  ">
            <aside class="menu is-hidden-mobile">
                <img style="width: 50px" src="/img/logo2.png">
                <span style="color: lightsteelblue;"> Benvenuto<strong
                        style="color: lightsteelblue;"> Admin </strong></span>

                <p id="bg-test" class="menu-label has-text-white">
                    AMMINISTRAZIONE
                </p>
                <ul class="menu-list has-text-white">

                    <li><a style="color: lightsteelblue;margin-bottom: 10px" href="{{ route('admin.utente.index') }}">
                            <i class="fa-regular fa-user"></i>Tutti gli Utenti</a>
                    </li>


                    <li><a style="color: lightsteelblue;margin-bottom: 5px" href="{{ route('categories.index') }}"> <i
                                class="fa-regular fa-rectangle-list"></i>
                            Categorie</a></li>

                    <p id="bg-test"> GESTIONE OPERATORI</p>

                    <ul class="menu-list has-text-white">
                        <li><a style="color: lightsteelblue;margin-top: 5px"
                               href="{{ route('admin.operatore.index') }}"> <i class="fa-solid fa-users-line"></i> Tutti
                                gli Operatori</a></li>
                        <li style="color: lightsteelblue"><a style="color: lightsteelblue;margin-top: 5px" class="has-text-white" href="{{ route('admin.home') }}">
                                <span style="color: lightsteelblue"><i class="fa-solid fa-house-user"></i></span>
                                Torna alla dashboard</a> </li>

                    </ul>


                </ul>

            </aside>
        </div>
        <div class="column is-10">
            <div class="columns">
                <div class="column is-12">
                    <!-- Main container -->
                    <nav class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <div class="field has-addons">
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Cerca un operatore">
                                    </p>
                                    <p class="control ">
                                        <button class="button is-info">
                                            Cerca
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Right side -->
                        <div class="level-right">
                            <p class="level-item"><a class="button is-info" href="{{ route('admin.operatore.create') }}"> <span style="margin-right: 2px"><i class="fa-solid fa-plus"></i></span> Aggiungi Operatore</a></p>
                            <p class="level-item"><a class="button is-link" href="{{ route(('send.email.all.view')) }}"><span class="mr-2"> <i class="fa-solid fa-envelopes-bulk"></i> </span> Invia email a tutti gli operatori</a></p>
                        </div>

                    </nav>
                    <div class="card events-card">
                        <header class="card-header">
                            <p class="card-header-title  has-background-grey-lighter ">
                                Operatori
                            </p>

                        </header>
                        <div class="table-container">
                            <div class="card-table">
                                <div class="content">
                                    <table class="table is-fullwidth is-striped">
                                        <thead>
                                        <tr>
                                            <th> Id <i class="fa-solid fa-right-left"></i>
                                            </th>
                                            <th>Nome <i class="fa-solid fa-right-left"></i>
                                            </th>
                                            <th>Email <i class="fa-solid fa-right-left"></i>
                                            </th>
                                            <th>Actions <i class="fa-solid fa-right-left"></i>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($operators as $operator)
                                            <tr>
                                                <td>
                                                    {{ $operator->id }}
                                                    <div class="hidden"  data-id="{{ $operator->id }}">
                                                        <input class="operator_name" type="hidden"value="{{ $operator->name }}">
                                                        <input  class="operator_email" type="hidden"  value="{{ $operator->email }}">
                                                        <input class="operator_password" type="hidden" value="{{ $operator->password }}">
                                                    </div>
                                                </td>
                                                <td>{{ $operator->name }}</td>
                                                <td>{{ $operator->email }}</td>
                                                <td>
                                                    <div class="field is-grouped">
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
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">View All</a>
                        </footer>
                    </div>
                </div>

            </div>
        </div>
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
                                <input type="text" name="name"  class="form-control"
                                       placeholder="nome" id="operator-name">
                                <input type="hidden" id="operator-id">
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <strong>Email:</strong>
                                <input type="text" name="email"  class="form-control"
                                       placeholder="email" id="operator-email">
                                <strong>Password:</strong>
                                <input type="text" name="password"  class="form-control"
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
