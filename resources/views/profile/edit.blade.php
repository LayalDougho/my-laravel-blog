@extends('layouts.app')

@section('title', __('Profile Settings'))

@section('content')
<div class="container py-4">
    
    {{-- Header (نستخدم صف عادي بدلاً من x-slot) --}}
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="h2 text-dark border-bottom pb-2">
                {{ __('Profile Settings') }}
            </h2>
        </div>
    </div>

    {{-- محتوى الإعدادات --}}
    <div class="row justify-content-center">

        {{-- 1. تحديث معلومات الملف الشخصي --}}
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title">{{ __('Profile Information') }}</h5>
                    <p class="card-text text-muted mb-3">{{ __("Update your account's profile information and email address.") }}</p>
                    
                    {{-- تضمين النموذج --}}
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        {{-- 2. تحديث كلمة المرور --}}
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title">{{ __('Update Password') }}</h5>
                    <p class="card-text text-muted mb-3">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

                    {{-- تضمين النموذج --}}
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        {{-- 3. حذف الحساب --}}
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body p-4">
                    <h5 class="card-title text-danger">{{ __('Delete Account') }}</h5>
                    <p class="card-text text-muted mb-3">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>

                    {{-- تضمين النموذج --}}
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</div>
@endsection