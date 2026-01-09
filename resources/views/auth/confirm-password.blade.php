@extends('layouts.guest')

@section('content')
    <div class="alert alert-info small mb-4" role="alert">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

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

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
@endsection