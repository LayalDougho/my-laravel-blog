@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container py-4">
    
    {{-- Header (نستخدم صف عادي بدلاً من x-slot) --}}
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="h2 text-dark border-bottom pb-2">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- لوحة المعلومات الرئيسية --}}
            <div class="card shadow-sm">
                
                {{-- العنوان (Header) --}}
                <div class="card-header bg-primary text-white">
                    {{ __('Welcome!') }}
                </div>
                
                {{-- المحتوى (Body) --}}
                <div class="card-body">
                    <p class="lead mb-0 text-success">
                        {{ __("You're logged in!") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection