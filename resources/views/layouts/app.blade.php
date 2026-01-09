<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel Blog'))</title>

    {{-- ربط ملفات CSS و JS عبر Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>
    <div id="app">
      
        @include('partials.navigation') 

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
        
     
        @include('partials.footer') 

    </div>

    @stack('scripts')
</body>
</html>