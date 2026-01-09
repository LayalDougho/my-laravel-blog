@extends('layouts.guest')

@section('content')
    
    {{-- رسالة الترحيب والطلب الأساسي --}}
    <div class="alert alert-info small mb-4" role="alert">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    {{-- رسالة تأكيد إرسال الرابط الجديد --}}
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4 small" role="alert">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-4">
        
        {{-- نموذج إعادة إرسال رابط التحقق --}}
        <form method="POST" action="{{ route('verification.send') }}" class="m-0">
            @csrf
            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        {{-- نموذج تسجيل الخروج --}}
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf

            <button type="submit" class="btn btn-link text-secondary text-decoration-underline p-0 border-0">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
@endsection