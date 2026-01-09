<section class="card mb-4 shadow-sm">
    <div class="card-body p-4">
        <header class="mb-4">
            <h2 class="card-title text-lg font-weight-bold text-dark">
                {{ __('Profile Information') }}
            </h2>

            <p class="card-text text-muted mt-1 small">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        {{-- نموذج إرسال طلب التحقق من البريد الإلكتروني --}}
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        {{-- نموذج تحديث الاسم والبريد الإلكتروني --}}
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            {{-- حقل الاسم --}}
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name', $user->name) }}" 
                    required 
                    autofocus 
                    autocomplete="name" 
                />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- حقل البريد الإلكتروني --}}
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email', $user->email) }}" 
                    required 
                    autocomplete="username" 
                />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                {{-- تنبيه التحقق من البريد الإلكتروني --}}
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning mt-2 small p-2">
                        <p class="mb-0 text-dark">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="btn btn-link btn-sm p-0 border-0 align-baseline text-decoration-underline">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-weight-bold text-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            {{-- زر الحفظ ورسالة الحالة --}}
            <div class="d-flex align-items-center gap-3 mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                @if (session('status') === 'profile-updated')
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