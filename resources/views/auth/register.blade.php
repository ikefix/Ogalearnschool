@extends('layouts.app')

@section('content')
<style>
    .register-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 2rem 0;
    }
    .register-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 2rem;
        width: 100%;
        max-width: 600px;
    }
    .register-card h3 {
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
        padding: 10px 20px;
        font-weight: bold;
        border-radius: 8px;
        color: white;
        transition: 0.3s;
    }
    .btn-custom:hover {
        background: #2563eb;
    }
    .invalid-feedback {
        display: block;
    }
</style>

<div class="container register-wrapper">
    <div class="register-card">
        <h3>{{ __('Student Register') }}</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- NAME --}}
            <div class="mb-3">
                <label for="name">{{ __('Full Name') }}</label>
                <input id="name" type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="mb-3">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            {{-- GENDER --}}
            <div class="mb-3">
                <label for="gender">{{ __('Gender') }}</label>
                <select name="gender" id="gender"
                    class="form-control @error('gender') is-invalid @enderror" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            {{-- SCHOOL --}}
            <div class="mb-3"  style="display:none;">
                <label>{{ __('School Name') }}</label>
                <input type="text" class="form-control" value="{{ $school->school_name }}" readonly >
                <input type="hidden" name="school_id" value="{{ $school->id }}">
            </div>


            {{-- PASSWORD --}}
            <div class="mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password" required>
                @error('password')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="mb-3">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password"
                    class="form-control" name="password_confirmation" required>
            </div>

            {{-- SUBMIT --}}
            <div class="text-end">
                <button type="submit" class="btn btn-custom">
                    {{ __('Register as Student') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


