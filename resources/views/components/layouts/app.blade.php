{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Infrastruktur TI - Kabupaten Sijunjung">
    <meta name="author" content="Dinas Komunikasi dan Informatika Kabupaten Sijunjung">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/kabupaten-sijunjung.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700|instrument-sans:400,500,600"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- CSS Global --}}
    <link rel="stylesheet" href="{{ asset('css/header-styles.css') }}"> {{-- CSS Khusus Header --}}

    @livewireStyles
    @stack('styles') {{-- Slot untuk CSS per halaman --}}
</head>

<body class="antialiased">
    <div class="animated-bg">
        <div class="stars" id="stars"></div>
    </div>

    {{-- Memuat Header --}}
    @include('partials._header')

    <main class="main-content">
        {{ $slot }}
    </main>

    {{-- Memuat Footer dan Script --}}
    @include('partials._footer')

</body>

</html>
