<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Blog') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    
    {{-- الهيكل المركزي لصفحات المصادقة --}}
    <div class="d-flex flex-column align-items-center pt-5 min-vh-100">
        
        {{-- الشعار أو اسم الموقع --}}
        <div>
            <a href="/">
                {{-- 💡 سنستبدل Blade Component (x-application-logo) بـ نص أو صورة عادية --}}
                <h1 class="h3 text-primary">{{ config('app.name', 'My Blog') }}</h1>
            </a>
        </div>

        {{-- حاوية النموذج (تسجيل الدخول/التسجيل/إلخ) --}}
        <div class="card shadow-sm w-100" style="max-width: 400px; margin-top: 1.5rem;">
             {{-- محتوى الصفحة (الذي سيتم ملؤه من ملفات مثل login.blade.php) --}}
            <div class="card-body p-4">
               @yield('content')
            </div>
        </div>
    </div>
    
    {{-- لإبقاء مكان لـ Alpine.js إذا كنت تستخدمه في النماذج --}}
    @stack('scripts')
</body>
</html>