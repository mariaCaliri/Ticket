@extends('layouts.app')

@section('content')
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Registrati</h3>
                    <hr class="login-hr">
                    <p class="subtitle has-text-black">Effettua la registrazione.</p>
                    <div class="box">
                        <figure class="avatar">
                            <img src="img/user-profile.png" style="width: 150px" alt="logo">
                        </figure>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field">
                                <div class="control">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input class="input is-large" type="text" placeholder=" Nome" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="field">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="email" class="input is-large @error('email') is-invalid"
                                       placeholder=" Email" name="email" value="{{ old('email') }}" required
                                       autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label for="password">{{ __('Password') }}</label>
                            <input class="input is-large" type="password" placeholder="Password" name="password"
                                   required autocomplete="current-password" autofocus>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="input is-large"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit"
                            class="button is-block is-info is-large is-fullwidth">{{ __('Register') }}</button>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
