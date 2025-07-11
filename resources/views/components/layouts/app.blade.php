<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Sistem Informasi Infrastruktur TI - Aplikasi berbasis Laravel dengan Filament Admin Panel">
    <meta name="keywords" content="infrastruktur, sistem informasi, laravel, filament, admin panel">
    <meta name="author" content="Admin Panel">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="4K5Ik2HmVn7IBgAeytIkqUr-ScWT7BdxcZZ-bKCyfJQ" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    {{-- Scripts --}}
    <script src="https://www.google.com/recaptcha/api.js"></script>

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    {{ $slot }}
    @livewire('notifications')
    {{-- @livewire('database-notifications') --}}

    @filamentScripts
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
