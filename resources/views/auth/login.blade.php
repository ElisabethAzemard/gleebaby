@extends('layouts.navless')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center h3 my-3">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</h1>
                @isset($url)
                <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                @else
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @endisset
                @csrf
                <div class="form-group row justify-content-md-center mb-2">
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Adresse E-mail" aria-label="Adresse e-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-md-center">
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe" aria-label="Mot de passe">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row my-2 justify-content-md-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Connexion') }}
                        </button>
                    </div>
                </div>
                @if (Route::has('password.request'))
                <div class="form-group row mb-0 justify-content-md-center">
                    <div class="col-md-8">
                        <a class="btn btn-link w-100" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    </div>
                </div>
                @endif
                <div class="form-group row mb-0 justify-content-md-center">
                    <div class="col-md-8">
                    @isset($url)
                    <a class="nav-link text-center" href="{{ url("register/$url") }}">Pas encore inscrit ?</a>
                    @else
                    <a class="nav-link text-center" href="{{ route('register') }}">Pas encore inscrit ?</a>
                    @endisset
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
