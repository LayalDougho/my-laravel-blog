@extends('layouts.guest')

@section('content')
    {{-- رسالة حالة الجلسة (Session Status) --}}
    @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- 1. Email Address --}}
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username" 
            />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- 2. Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input 
                id="password" 
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required 
                autocomplete="current-password" 
            />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- 3. Remember Me --}}
        <div class="mb-3 form-check">
            <input 
                id="remember_me" 
                type="checkbox" 
                class="form-check-input" 
                name="remember"
            >
            <label class="form-check-label" for="remember_me">
                {{ __('Remember me') }}
            </label>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            
            {{-- Forgot Password Link --}}
            @if (Route::has('password.request'))
                <a class="text-sm text-secondary text-decoration-underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            {{-- Login Button --}}
            <button type="submit" class="btn btn-primary ms-3">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
@endsection