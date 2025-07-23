@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Your School') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.school') }}">
                        @csrf

                        {{-- School Name --}}
                        <div class="form-group mb-3">
                            <label for="school_name" class="form-label">School Name</label>
                            <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror"
                                name="school_name" value="{{ old('school_name') }}" required autofocus>
                            @error('school_name')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Contact Person Name --}}
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Contact Person Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">School Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Phone Number --}}
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input id="phone_number" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone_number" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">School Address</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required>
                            @error('address')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required>
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group mb-4">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>

                        {{-- Submit --}}
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Register School') }}
                            </button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        Already have an account? <a href="{{ route('login') }}">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
