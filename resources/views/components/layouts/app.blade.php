<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? config('app.name') }}</title>

    <x-head />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    
    @filamentStyles
    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="antialiased">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div id="stars" class="stars"></div>
    </div>

    <x-header />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @livewire('notifications')
    
    @filamentScripts
    @vite('resources/js/app.js')
    <x-scripts />
    @stack('scripts')
</body>

</html>
{{-- @livewire('database-notifications') --}}
