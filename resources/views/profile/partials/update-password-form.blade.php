<section class="card mb-4 shadow-sm">
    <div class="card-body p-4">
        <header class="mb-4">
            <h2 class="card-title text-lg font-weight-bold text-dark">
                {{ __('Update Password') }}
            </h2>

            <p class="card-text text-muted mt-1 small">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            {{-- 1. كلمة المرور الحالية --}}
            <div class="mb-3">
                <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                <input 
                    id="update_password_current_password" 
                    name="current_password" 
                    type="password" 
                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                    autocomplete="current-password" 
                />
                @error('current_password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- 2. كلمة المرور الجديدة --}}
            <div class="mb-3">
                <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                <input 
                    id="update_password_password" 
                    name="password" 
                    type="password" 
                    class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                    autocomplete="new-password" 
                />
                @error('password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- 3. تأكيد كلمة المرور --}}
            <div class="mb-3">
                <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input 
                    id="update_password_password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                    autocomplete="new-password" 
                />
                @error('password_confirmation', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- زر الحفظ ورسالة الحالة --}}
            <div class="d-flex align-items-center gap-3 mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-success mb-0 small"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</section>