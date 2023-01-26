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
                   success: function (res){
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
        })

    </script>
    <script>

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
                                        <input class="input" type="text" placeholder="Cerca una categoria">
                                    </p>
                                    <p class="control">
                                        <button class="button">
                                            Cerca
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                            <p class="level-item"><a class="button is-info" href="{{ route('categories.create') }}"> <span style="margin-right: 2px"><i class="fa-solid fa-plus"></i></span> Aggiungi Categoria</a></p>
                        </div>
                    </nav>
                    <div class="card events-card">
                        <header class="card-header">
                            <p class="card-header-title  has-background-grey-lighter ">
                                Categorie
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
                                            <th>Categoria <i class="fa-solid fa-right-left"></i>
                                            </th>
                                            <th>Actions <i class="fa-solid fa-right-left"></i>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }} <input type="hidden" data-id="{{ $category->id }}" value="{{ $category->name }}"></td>

                                                <td>
                                                    <div class="field is-grouped">
                                                        <p class="control">
                                                        <a class="button is-info" style="color: black" href="{{ route('categories.show', $category->id) }}"> <i class="fa-solid fa-magnifying-glass"></i></a>
                                                        </p>
                                                        <p class="control">
                                                        <button class="js-modal-trigger button is-primary"  style="color: black"  data-target="modal-js-example" data-id ="{{ $category->id }}"><i class="fa-solid fa-pencil"></i></button>
                                                        </p>
                                                        <p class="control">
                                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                                              method="Post">
                                                            {{--                                                        <a class="button is-primary" style="color: black"  href="{{ route('categories.edit', $category->id) }}"></a>--}}
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="button is-danger" type="submit"><i class="fa-solid fa-trash has-text-black "></i></button>
                                                        </form>
                                                        </p>
                                                    </div>
                                                </td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
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
            <form id="editCategory" name="editCategory" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nome Categoria:</strong>
                            <input type="text" name="name"  class="form-control"
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
            <button id="btn-save" class="button is-link">Salva </button>
            <button id="btn-close" class="button">Annulla</button>
        </footer>
    </div>
</div>


</body>
</html>
@endsection
