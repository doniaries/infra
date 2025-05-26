<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    @include('partials.styles') <!-- Include all CSS -->
    @stack('styles') <!-- For page-specific styles -->
</head>

<body class="{{ session('theme', 'light') }}">
    @include('partials.header') <!-- Header/navigation -->

    <main class="main-content">
        @yield('content') <!-- Content section -->
    </main>

    @include('partials.scripts') <!-- Include all JS -->
    @stack('scripts') <!-- For page-specific scripts -->
</body>

</html>
