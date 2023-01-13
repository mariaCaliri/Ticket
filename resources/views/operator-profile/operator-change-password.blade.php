@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cambia Password') }}</div>

                    <form action="{{ route('update-password') }}" method="POST">
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
                                <label for="oldPasswordInput" class="form-label">Password Attuale</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                       placeholder="Password Attuale">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Nuova Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                       placeholder="Nuova Password">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Conferma Nuova Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                       placeholder="Conferma Password">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-info" style="color: white;">Conferma</button>
                            <button class="btn btn-danger"><a style="text-decoration:none;color: white;" href="{{ route('operator.home') }}"> Annulla</a></button>
                            <button type="button" class="btn btn-primary"><a style="text-decoration:none;color: white;" href="{{ route('operator.home') }}">Torna alla dashboard</a></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
