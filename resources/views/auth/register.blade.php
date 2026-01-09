@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- 1. Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input 
                id="name" 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" 
                required 
                autofocus 
                autocomplete="name" 
            />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- 2. Email Address --}}
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" 
                required 
                autocomplete="username" 
            />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- 3. Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input 
                id="password" 
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required 
                autocomplete="new-password" 
            />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- 4. Confirm Password --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input 
                id="password_confirmation" 
                type="password"
                name="password_confirmation" 
                class="form-control @error('password_confirmation') is-invalid @enderror"
                required 
                autocomplete="new-password" 
            />
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end align-items-center mt-4">
            {{-- Already registered? Link --}}
            <a class="text-sm text-secondary text-decoration-underline" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            {{-- Register Button --}}
            <button type="submit" class="btn btn-primary ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection