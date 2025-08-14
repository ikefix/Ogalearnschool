@extends('layouts.app')

@section('content')
<style>
    /* Only target the login section, leave navbar & body alone */
    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem 0;
    }
    .login-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 2rem;
        width: 100%;
        max-width: 420px;
    }
    .login-card h3 {
        font-weight: bold;
        margin-bottom: 1.5rem;
        text-align: center;
        color: #333;
    }
    .form-control {
        border-radius: 8px;
        padding: 10px 12px;
        border: 1px solid #ccc;
    }
    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.25);
    }
    .btn-custom {
        background: #3b82f6;
        border: none;
        width: 100%;
        padding: 10px;
        font-weight: bold;
        border-radius: 8px;
        color: white;
        transition: 0.3s;
    }
    .btn-custom:hover {
        background: #2563eb;
    }
    a {
        color: #3b82f6;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>

<div class="container login-wrapper">
    <div class="login-card">
        <h3>{{ __('Login to Your Account') }}</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <button type="submit" class="btn btn-custom">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <div class="mt-3 text-center">
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
