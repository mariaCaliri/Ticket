@extends('layouts.app')

@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">{{ __('Send Email to all') }}</div>

                    <form action="{{ route('store.allOperator.email') }}" method="POST">
                        @csrf
                        <div class="card-content">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="content">
                                <label for="Greeting">Titolo</label>
                                <input name="greeting" type="text" class="input" placeholder="titolo">
                            </div>
                            <div class="mb-3">
                                <label for="Body" class="form-label">Testo</label>
                                <input name="body" type="text" class="input"
                                       placeholder="testo">
                            </div>
                            <div class="mb-3">
                                <label for="action-text" class="form-label">Action</label>
                                <input name="action-text" type="text" class="input"
                                       placeholder="Action text">
                            </div>
                            <div class="mb-3">
                                <label for="action-url">Action url</label>
                                <input name="action-url" type="text" class="input" placeholder="action-url">
                            </div>
                            <div class="mb-3">
                                <label for="end-text">Fine testo</label>
                                <input name="end-text" type="text" class="input" placeholder="end-text">
                            </div>

                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Invia</button>
                            </div>
                            <div class="control">
                                <a href="{{ route('admin.home') }}" class="button is-link is-light">Annulla</a>
                            </div>
                        </div>

                    </form>
                </div>
    </div>
@endsection
