@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina Categorie</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--jquery-->
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
            let categoryInputName = document.querySelector('#category-name');
            let btnSave = document.querySelector('#btn-save');
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
                    let categoryName = document.querySelector('input[data-id="' + id + '"]');
                    categoryInputName.value = categoryName.value;
                    categoryId.value = id;
                    openModal($target);
                });

            });

            $('body').on('click', '#btn-save', function (e) {

                $.ajax({
                    type: 'PUT',
                    url: '/categories/' + categoryId.value,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:
                        {'name': categoryInputName.value},
                    success: function (res) {
                        location.reload();
                    }
                })
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


        })

    </script>
    <script>

    </script>
</head>
<body>
<div class="container is-fluid" style="padding: 0">
    <div class="columns">
        <div id="aside" class="column is-2 is-fullheight has-background-grey-dark" style="position: relative">

            <div class="has-text-centered">
                <img style="width: 75px; margin-bottom: 50px" src="/img/admin2.png">
            </div>

            <div class="menu">
                <ul class="menu-list has-text-white ">
                    <li style="color: lightsteelblue;margin-top: 20px"><a style="color: lightsteelblue;margin-top: 5px"
                                                         class="has-text-white" href="{{ route('admin.home') }}">
                            <span style="color: lightsteelblue"><i class="fa-solid fa-house-user fa-xl"></i></span>
                            Home</a></li>

                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px" href="{{ route('admin.utente.index') }}"><span
                                class="icon"> <i class=" icon fa-solid fa-users fa-xl"></i></span><span
                                class="name ml-4">Utenti</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px" href="{{ route('admin.operatore.index') }}"><span
                                class="icon"><i class="icon fa-solid fa-users-line  fa-xl"></i> </span><span
                                class="name ml-4">Operatori</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px" href="{{ route('categories.index') }}"><span class="icon"> <i
                                    class="icon fa-regular fa-rectangle-list  fa-xl"></i></span><span class="name ml-4">Categorie</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-top: 20px" href="{{ route('reports') }}"> <i
                                class="icon fa-solid fa-chart-line fa-xl"></i> <span class="name ml-4">Report</span></a>
                    </li>


                    <li><a style="color: lightsteelblue;margin-top: 20px"> <i class="fa-solid fa-gear icon fa-xl"></i><span
                                class="name ml-4">Settings</span></a>
                    </li>
                    <li><a style="color: lightsteelblue;margin-top: 20px"> <i class="fa-solid fa-user-plus icon fa-xl"></i><span
                                class="name ml-4">Aggiungi</span>
                        </a></li>
                    <li><a style="color: lightsteelblue;margin-top: 20px"><i class="fa-solid fa-circle-question icon fa-xl"></i><span
                                class="name ml-4">Help</span></a>
                    </li>
                    <li> <button id="openFilters" class="button">Filtri</button></li>

                </ul>
            </div>
        </div>

        <div class="column" id="main">
            <div>
                <!-- Main container -->
                <div class="card events-card">
                    <header class="card-header">
                        <p class="card-header-title  has-background-grey-lighter ">
                            Categorie
                        </p>

                    </header>
                    <div class="table-container">
                        <div class="card-table">
                            <div class="content">
                                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center"> Id
                                        </th>
                                        <th style="text-align: center">Categoria
                                        </th>
                                        <th style="text-align: center">Actions
                                        </th>
{{--                                        <th style="text-align: center">Operatori</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td style="text-align: center">{{ $category->id }}</td>
                                            <td style="text-align: center">{{ $category->name }} <input type="hidden" data-id="{{ $category->id }}"
                                                                             value="{{ $category->name }}"></td>

                                            <td>
                                                <div style="justify-content: center" class="field is-grouped">
                                                    <p class="control">
                                                        <a class="button is-info" style="color: black"
                                                           href="{{ route('categories.show', $category->id) }}"> <i
                                                                class="fa-solid fa-magnifying-glass"></i></a>
                                                    </p>
                                                    <p class="control">
                                                        <button class="js-modal-trigger button is-primary"
                                                                style="color: black" data-target="modal-js-example"
                                                                data-id="{{ $category->id }}"><i
                                                                class="fa-solid fa-pencil"></i></button>
                                                    </p>
                                                    <p class="control">
                                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                                          method="Post">
                                                        {{--                                                        <a class="button is-primary" style="color: black"  href="{{ route('categories.edit', $category->id) }}"></a>--}}
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="button is-danger" type="submit"><i
                                                                class="fa-solid fa-trash has-text-black "></i></button>
                                                    </form>
                                                    </p>
                                                </div>
                                            </td>
{{--                                               @foreach($category->operator as $operator)--}}
{{--                                            <td>{{ $operator->id }}</td>--}}
{{--                                    @endforeach--}}
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

            <div id="filters" class=" has-background-white-ter">
                <nav class="panel">
                    <p class="panel-heading">
                        <span id="closeBtn" style=" right: 25px;">
                 <i class="fa-solid fa-xmark"></i>
                </span>
                    </p>
                    <div class="panel-block">
                        <p class="control has-icons-left">
                            <input class="input" type="text" placeholder="Cerca Categoria">
                            <span class="icon is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
                        </p>
                    </div>
                    <a class="panel-block is-active">
                        <span class="panel-icon">
                          <i class="fas fa-book" aria-hidden="true"></i>
                        </span>
                        Tutte
                    </a>
                    <a class="panel-block">
                    <span class="panel-icon">
                      <i class="fas fa-book" aria-hidden="true"></i>
                    </span>
                        Eliminate
                    </a>
                    <a class="panel-block" >
                        <span class="panel-icon" href="{{ route('categories.create') }}">
                          <i class="fa-solid fa-plus"></i>
                        </span>
                        Aggiungi Categoria
                    </a>

                    <label class="panel-block">
                        <input type="checkbox">
                        Ricorda filtri
                    </label>
                    <div class="panel-block">
                        <button class="button is-link is-outlined is-fullwidth">
                            Resetta filtri
                        </button>
                    </div>
                </nav>

            </div>
    </div>
</div>
<!--Modale-->
<div id="modal-js-example" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Modifica Categoria</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <!-- Content ... -->
            <form id="editCategory" name="editCategory" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nome Categoria:</strong>
                            <input class="input" type="text" name="name" class="form-control"
                                   placeholder="nome" id="category-name">
                            <input type="hidden" id="category-id">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <footer class="modal-card-foot">
            <button id="btn-save" class="button is-link">Salva</button>
            <button id="btn-close" class="button">Annulla</button>
        </footer>
    </div>
</div>


</body>
</html>
@endsection
