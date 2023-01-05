@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Send Email') }}</div>

                    <form action="{{ route('store.operator.email', $data->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="Greeting">Greeting</label>
                                <input name="greeting" type="text" class="form-control" placeholder="Greeting">
                            </div>
                            <div class="mb-3">
                                <label for="Body" class="form-label">Body</label>
                                <input name="body" type="text" class="form-control"
                                       placeholder="body">
                            </div>
                            <div class="mb-3">
                                <label for="action-text" class="form-label">Action</label>
                                <input name="action-text" type="text" class="form-control"
                                       placeholder="Action text">
                            </div>
                                <div class="mb-3">
                                    <label for="action-url">Action url</label>
                                    <input name="action-url" type="text" class="form-control" placeholder="action-url">
                                </div>
                                <div class="mb-3">
                                    <label for="end-text">End text</label>
                                    <input name="end-text" type="text" class="form-control" placeholder="end-text">
                                </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Invia</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
