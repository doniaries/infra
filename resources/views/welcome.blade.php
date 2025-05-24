<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Sistem Informasi Infrastruktur - Aplikasi berbasis Laravel dengan Filament Admin Panel">
    <meta name="keywords" content="infrastruktur, sistem informasi, laravel, filament, admin panel">
    <meta name="author" content="Admin Panel">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Lapor Infrastruktur | Aplikasi Manajemen Infrastruktur">
    <meta property="og:description"
        content="Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat. Sistem ini membantu Anda melacak laporan secara real-time.">
    <meta property="og:image" content="{{ asset('front/images/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Lapor Infrastruktur | Aplikasi Manajemen Infrastruktur">
    <meta property="twitter:description"
        content="Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat. Sistem ini membantu Anda melacak laporan secara real-time.">
    <meta property="twitter:image" content="{{ asset('front/images/logo.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/kabupaten-sijunjung.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700|instrument-sans:400,500,600"
        rel="stylesheet" />

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('/front/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/css/style.css') }}">

    <!-- Styles -->
    <style>
        /* Base styles */
        body {
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin: 0;
            padding: 0;
        }

        /* Dark mode styles */
        body.dark {
            background-color: #0f172a;
            color: #f8fafc;
        }

        /* Sky background */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            background-color: #e0f2fe;
            /* Light blue sky for light mode */
            transition: background-color 0.3s ease;
        }

        body.dark .animated-bg {
            background-color: #0c1222;
            /* Dark blue night sky for dark mode */
        }

        /* Stars (visible only in dark mode) */
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        body.dark .stars {
            opacity: 1;
        }

        .star {
            position: absolute;
            background-color: #ffffff;
            border-radius: 50%;
            animation: twinkle 2s infinite alternate;
        }

        @keyframes twinkle {
            0% {
                opacity: 0.2;
            }

            100% {
                opacity: 1;
            }
        }



        /* Header styles */
        .header {
            background-color: transparent;
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        body.dark .header {
            background-color: transparent;
        }

        /* Mobile menu styles */
        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
            z-index: 200;
        }

        .mobile-menu-toggle span {
            display: block;
            height: 3px;
            width: 100%;
            background-color: #2563eb;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        body.dark .mobile-menu-toggle span {
            background-color: #60a5fa;
        }

        .mobile-menu-toggle.active span:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }

        .mobile-menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-toggle.active span:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        /* Mega menu styles */
        .mega-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background-color: rgba(255, 255, 255, 0.95);
            overflow: hidden;
            transition: height 0.3s ease;
            z-index: 150;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        body.dark .mega-menu {
            background-color: rgba(15, 23, 42, 0.95);
        }

        .mega-menu.active {
            height: 100vh;
            padding: 80px 20px 20px;
            overflow-y: auto;
        }

        .mega-menu-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px;
        }

        .mega-menu-section {
            margin-bottom: 20px;
            width: 100%;
            text-align: center;
        }

        .mega-menu-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2563eb;
            margin-bottom: 10px;
        }

        body.dark .mega-menu-title {
            color: #60a5fa;
        }

        .mega-menu-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .mega-menu-link {
            padding: 8px 15px;
            background-color: #f1f5f9;
            border-radius: 5px;
            color: #1e40af;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        body.dark .mega-menu-link {
            background-color: #1e293b;
            color: #93c5fd;
        }

        .mega-menu-link:hover {
            background-color: #e2e8f0;
            transform: translateY(-2px);
        }

        body.dark .mega-menu-link:hover {
            background-color: #334155;
        }

        /* Prevent scrolling when menu is open */
        body.menu-open {
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: flex;
            }

            .header {
                padding: 1rem;
                background-color: rgba(255, 255, 255, 0.9);
            }

            body.dark .header {
                background-color: rgba(15, 23, 42, 0.9);
            }

            .logo {
                height: 40px;
            }

            .app-title {
                font-size: 1.2rem;
            }

            .app-subtitle {
                font-size: 0.75rem;
            }

            .main-content {
                padding-top: 5rem;
            }
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo {
            height: 50px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .app-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2563eb;
            margin: 0;
        }

        body.dark .app-title {
            color: #60a5fa;
        }

        .app-subtitle {
            font-size: 0.875rem;
            color: #64748b;
            margin: 0;
        }

        body.dark .app-subtitle {
            color: #94a3b8;
        }

        /* Theme toggle */
        .theme-toggle {
            cursor: pointer;
            width: 48px;
            height: 24px;
            border-radius: 12px;
            background-color: #e2e8f0;
            position: relative;
            transition: all 0.3s ease;
        }

        .theme-toggle.dark {
            background-color: #1f2937;
        }

        .theme-toggle::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .theme-toggle.dark::after {
            transform: translateX(24px);
            background-color: #f59e0b;
        }

        /* Main content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 7rem 2rem 2rem;
        }

        /* Hero section */
        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 3rem 1rem;
            margin-bottom: 3rem;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        body.dark .hero-title {
            color: #60a5fa;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #64748b;
            max-width: 800px;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.8rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            hero-buttons a {
                padding: 0.5rem 1rem !important;
                font-size: 0.8rem !important;
                border-radius: 0.375rem !important;
                width: 100%;
                max-width: 280px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .hero-buttons a svg {
                width: 1rem;
                height: 1rem;
                margin-right: 0.5rem;
            }

            .register-button,
            .login-button {
                margin-right: 0;
                margin-bottom: 1rem;
                width: 100%;
                text-align: center;
            }

            .desktop-nav {
                display: none;
            }
        }

        body.dark .hero-subtitle {
            color: #94a3b8;
        }

        /* Login button with animation */
        .login-button {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
            text-align: center;
        }

        .login-button:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0%;
            background-color: #1d4ed8;
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            z-index: -1;
        }

        .login-button:hover:before {
            height: 100%;
        }

        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
        }

        body.dark .login-button {
            background-color: #3b82f6;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
        }

        body.dark .login-button:before {
            background-color: #2563eb;
        }

        /* Register button */
        .register-button {
            display: inline-block;
            background-color: #10b981;
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
            margin-right: 1rem;
            text-align: center;
        }

        .register-button:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0%;
            background-color: #059669;
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            z-index: -1;
        }

        .register-button:hover:before {
            height: 100%;
        }

        .register-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        body.dark .register-button {
            background-color: #10b981;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);
        }

        body.dark .register-button:before {
            background-color: #059669;
        }

        /* button warna */

        /* Tambahan efek khusus */
        .btn-laporan {
            background-color: #f59e0b;
            box-shadow: 0 4px 6px rgba(245, 158, 11, 0.2);
        }

        .btn-laporan:before {
            background-color: #d97706;
        }

        .btn-laporan:hover {
            box-shadow: 0 10px 20px rgba(245, 158, 11, 0.3);
        }

        /* Tombol ukuran kecil */
        .btn-small {
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
            border-radius: 0.375rem;
        }

        .btn-bts {
            background-color: #6366f1;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
        }

        .btn-bts:before {
            background-color: #4f46e5;
        }

        .btn-bts:hover {
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }


        body.dark .btn-laporan {
            background-color: #f59e0b;
            box-shadow: 0 4px 6px rgba(245, 158, 11, 0.3);
        }

        body.dark .btn-laporan:before {
            background-color: #d97706;
        }

        body.dark .btn-laporan:hover {
            box-shadow: 0 10px 20px rgba(245, 158, 11, 0.4);
        }

        body.dark .btn-bts {
            background-color: #6366f1;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.3);
        }

        body.dark .btn-bts:before {
            background-color: #4f46e5;
        }

        body.dark .btn-bts:hover {
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }


        /* Table styles */
        .table-responsive {
            margin-top: 2rem;
        }

        .table th {
            background-color: #2f55d4;
            color: white;
        }

        .table td {
            vertical-align: middle;
        }

        .badge {
            padding: 0.5em 1em;
        }

        .bg-danger {
            background-color: #dc3545 !important;
        }

        .bg-warning {
            background-color: #ffc107 !important;
        }

        .bg-primary {
            background-color: #0d6efd !important;
        }

        .bg-secondary {
            background-color: #6c757d !important;
        }

        .bg-info {
            background-color: #0dcaf0 !important;
        }

        .bg-success {
            background-color: #198754 !important;
        }

        /* Card styles for mobile */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 1.5rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .card-title {
                font-size: 1.3rem;
            }

            .card-text {
                font-size: 0.9rem;
            }

            .row {
                margin-left: -10px;
                margin-right: -10px;
            }

            .col-md-4 {
                padding-left: 10px;
                padding-right: 10px;
            }
        }
    </style>

    @livewireStyles
</head>

<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="stars" id="stars"></div>
    </div>

    <!-- Buildings Silhouette -->
    <div class="buildings">
        <div class="building building-1">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-2">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-3">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-4">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-5">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
    </div>

    <!-- Landmarks -->
    <div class="landmark jam-gadang"></div>
    <div class="landmark rumah-gadang"></div>
    <div class="landmark surat"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-container">
            <!-- Logo dan Nama Aplikasi yang bisa diklik -->
            <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90">
                <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung"
                    class="logo">
                <div>
                    <h1 class="app-title">{{ config('app.name') }}</h1>
                    <p class="app-subtitle">Sistem Informasi Infrastruktur</p>
                </div>
            </a>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('login') }}" class="login-button me-3 d-none d-md-inline-block"
                title="Hanya untuk member area">Login</a>
            <div class="theme-toggle me-3" id="theme-toggle"></div>
            <div class="mobile-menu-toggle" id="mobileMenuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <!-- Mega Menu -->
    <div class="mega-menu" id="megaMenu">
        <div class="mega-menu-content">
            <button class="mega-menu-close" id="megaMenuClose" aria-label="Tutup Menu">&times;</button>
            <div class="mega-menu-section">
                <h3 class="mega-menu-title">Menu Utama</h3>
                <div class="mega-menu-links">
                    <a href="{{ asset('/') }}" class="mega-menu-link">Home</a>
                    <a href="list-laporan" class="mega-menu-link">Daftar Laporan</a>
                    <a href="{{ route('list.bts') }}" class="mega-menu-link">Data BTS</a>
                </div>
            </div>
            <div class="mega-menu-section">
                <h3 class="mega-menu-title">Akses Cepat</h3>
                <div class="mega-menu-links">
                    <a href="{{ route('public.laporform') }}" class="mega-menu-link">Buat Laporan</a>
                    <a href="{{ route('login') }}" class="mega-menu-link">Login</a>
                </div>
            </div>
            <div class="mega-menu-section">
                <h3 class="mega-menu-title">Informasi</h3>
                <div class="mega-menu-links">
                    <a href="#tentang" class="mega-menu-link">Tentang Aplikasi</a>
                    <a href="#kontak" class="mega-menu-link">Kontak Kami</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <section class="hero">
            <h2 class="hero-title">Ada Gangguan Jaringan Atau Ada Konsultasi Teknis!</h2>
            <p class="hero-subtitle">Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat.
                Sistem ini membantu Anda melacak laporan secara real-time.</p>
            <div class="hero-buttons">
                <a href="{{ route('public.laporform') }}" class="register-button btn-create-report btn-small">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-2 w-4 h-4 animate-pulse"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Buat Laporan
                </a>
                <a href="{{ url('list-laporan') }}" class="register-button btn-laporan btn-small">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-2 w-4 h-4" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd" />
                    </svg>
                    Daftar Laporan
                </a>
                <a href="{{ route('list.bts') }}" class="register-button btn-bts btn-small">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-2 w-4 h-4" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                    </svg>
                    Data BTS
                </a>
            </div>
        </section>

        {{-- <!-- Navigation Links (Desktop) -->
        <div class="mb-5 text-center desktop-nav">
            {{-- <a href="{{ asset('/') }}" class="mx-2 btn btn-outline-primary">Home</a> --}}
        {{-- <a href="{{ route('public.laporform') }}" class="register-button">Buat Laporan</a>
            <a href="list-laporan" class="mx-2 btn btn-outline-primary">Daftar Laporan</a>
            <a href="{{ route('list.bts') }}" class="mx-2 btn btn-outline-primary">Data BTS</a> --}}
        {{-- </div> --}}

        <!-- Info Cards Section -->
        <div class="mt-5 row">
            <!-- Aplikasi Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/front/images/illustration-1.png') }}" alt="Helpdesk Infrastruktur"
                            class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Tentang Aplikasi</h3>
                        <p class="card-text">Sistem Informasi Infrastruktur adalah aplikasi yang memudahkan pelaporan
                            dan pengelolaan gangguan jaringan serta konsultasi teknis di Kabupaten Sijunjung.</p>
                        <p class="card-text">Aplikasi ini membantu mempercepat penanganan masalah infrastruktur
                            teknologi informasi dengan sistem pelaporan yang terintegrasi.</p>
                    </div>
                </div>
            </div>

            <!-- Dinas Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Dinas"
                            class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Dinas Komunikasi dan Informatika</h3>
                        <p class="card-text">Dinas Kominfo Kabupaten Sijunjung bertanggung jawab dalam pengembangan dan
                            pemeliharaan infrastruktur teknologi informasi di seluruh wilayah kabupaten.</p>
                        <p class="card-text">Alamat: Jl. Prof. M. Yamin, SH, Muaro Sijunjung<br>Telp: (0754)
                            20202<br>Email: diskominfo@sijunjung.go.id</p>
                    </div>
                </div>
            </div>

            <!-- Helpdesk Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/front/images/illustration-2.png') }}" alt="Helpdesk Support"
                            class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Helpdesk Infrastruktur</h3>
                        <p class="card-text">Tim helpdesk kami siap membantu Anda dengan masalah infrastruktur
                            jaringan, perangkat keras, dan konsultasi teknis lainnya.</p>
                        <p class="card-text">Jam Operasional: Senin-Jumat, 08.00-16.00 WIB<br>Hotline:
                            0812-3456-7890<br>WhatsApp: 0812-3456-7890</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional CSS for Cards -->
        <style>
            .mega-menu-content {
                background: rgba(20, 30, 48, 0.98);
                border-radius: 16px;
                padding: 32px 16px 24px 16px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                max-width: 320px;
                margin: 0 auto;
            }

            .mega-menu-close {
                position: absolute;
                top: 12px;
                right: 16px;
                background: none;
                border: none;
                color: #fff;
                font-size: 2rem;
                cursor: pointer;
                z-index: 10;
                transition: color 0.2s;
            }

            .mega-menu-close:hover {
                color: #ff5252;
            }

            .card {
                border-radius: 10px;
                border: 2px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            }

            body.dark .card {
                background-color: #1e293b;
                color: #e2e8f0;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            }

            body.dark .card:hover {
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            }

            body.dark .card-title {
                color: #60a5fa !important;
            }

            .card-title {
                font-weight: 600;
                margin-bottom: 1rem;
            }

            .card-text {
                color: #64748b;
                font-size: 0.95rem;
                line-height: 1.6;
            }

            body.dark .card-text {
                color: #94a3b8;
            }

            /* Bayangan untuk tombol navigasi */
            .btn-outline-primary {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            .btn-outline-primary:hover {
                box-shadow: 0 4px 8px rgba(37, 99, 235, 0.2);
                transform: translateY(-2px);
            }

            body.dark .btn-outline-primary {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            }

            body.dark .btn-outline-primary:hover {
                box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
            }

            /* Bayangan untuk tombol utama */
            .register-button,
            .login-button {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .register-button:hover,
            .login-button:hover {
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            }

            body.dark .register-button,
            body.dark .login-button {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            }

            body.dark .register-button:hover,
            body.dark .login-button:hover {
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
            }
        </style>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/front/js/script.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('mobileMenuToggle');
            const megaMenu = document.getElementById('megaMenu');
            const megaMenuLinks = megaMenu ? megaMenu.querySelectorAll('a') : [];
            const megaMenuClose = document.getElementById('megaMenuClose');

            if (menuToggle && megaMenu) {
                menuToggle.addEventListener('click', function() {
                    megaMenu.classList.toggle('active');
                });
            }

            megaMenuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    megaMenu.classList.remove('active');
                });
            });

            if (megaMenuClose) {
                megaMenuClose.addEventListener('click', function() {
                    megaMenu.classList.remove('active');
                });
            }
        });
    </script>

    <script>
        // Create stars
        function createStars() {
            const stars = document.getElementById('stars');
            const count = 100;

            for (let i = 0; i < count; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.width = `${Math.random() * 3}px`;
                star.style.height = star.style.width;
                star.style.left = `${Math.random() * 100}%`;
                star.style.top = `${Math.random() * 100}%`;
                star.style.animationDelay = `${Math.random() * 2}s`;
                stars.appendChild(star);
            }
        }

        // Theme toggle
        function setupThemeToggle() {
            const toggle = document.getElementById('theme-toggle');
            const body = document.body;
            const theme = localStorage.getItem('theme');

            if (theme === 'dark') {
                body.classList.add('dark');
                toggle.classList.add('dark');
            }

            toggle.addEventListener('click', () => {
                body.classList.toggle('dark');
                toggle.classList.toggle('dark');

                const currentTheme = body.classList.contains('dark') ? 'dark' : 'light';
                localStorage.setItem('theme', currentTheme);
            });
        }

        // Interactive landmarks
        function setupLandmarks() {
            const landmarks = document.querySelectorAll('.landmark');

            landmarks.forEach(landmark => {
                landmark.addEventListener('click', () => {
                    landmark.classList.toggle('clicked');
                    setTimeout(() => {
                        landmark.classList.remove('clicked');
                    }, 1000);
                });
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            createStars();
            setupThemeToggle();
            setupLandmarks();
        });
    </script>

    @livewireScripts
</body>

</html>
/* Tombol Buat Laporan dengan efek khusus */
.btn-create-report {
background-color: #f97316;
box-shadow: 0 4px 6px rgba(249, 115, 22, 0.2);
position: relative;
overflow: hidden;
}

.btn-create-report:before {
background-color: #ea580c;
}

.btn-create-report:hover {
transform: translateY(-3px);
box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
}

.btn-create-report:after {
content: '';
position: absolute;
top: 0;
left: -100%;
width: 100%;
height: 100%;
background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
transition: 0.5s;
}

.btn-create-report:hover:after {
left: 100%;
}

body.dark .btn-create-report {
background-color: #f97316;
box-shadow: 0 4px 6px rgba(249, 115, 22, 0.3);
}

body.dark .btn-create-report:before {
background-color: #ea580c;
}

body.dark .btn-create-report:hover {
box-shadow: 0 10px 20px rgba(249, 115, 22, 0.4);
}

body.dark .btn-bts {
background-color: #6366f1;
box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
}
.btn-bts:before {
background-color: #4f46e5;
}
.btn-bts:hover {
box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
}


body.dark .btn-bts {
background-color: #6366f1;
box-shadow: 0 4px 6px rgba(99, 102, 241, 0.3);
}

body.dark .btn-bts:before {
background-color: #4f46e5;
}

body.dark .btn-bts:hover {
box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
}


/* Table styles */
.table-responsive {
margin-top: 2rem;
}

.table th {
background-color: #2f55d4;
color: white;
}

.table td {
vertical-align: middle;
}

.badge {
padding: 0.5em 1em;
}

.bg-danger { background-color: #dc3545 !important; }
.bg-warning { background-color: #ffc107 !important; }
.bg-primary { background-color: #0d6efd !important; }
.bg-secondary { background-color: #6c757d !important; }
.bg-info { background-color: #0dcaf0 !important; }
.bg-success { background-color: #198754 !important; }

/* Card styles for mobile */
@media (max-width: 768px) {
.card {
margin-bottom: 1.5rem;
}

.card-body {
padding: 1.25rem;
}

.card-title {
font-size: 1.3rem;
}

.card-text {
font-size: 0.9rem;
}

.row {
margin-left: -10px;
margin-right: -10px;
}

.col-md-4 {
padding-left: 10px;
padding-right: 10px;
}
}
</style>

@livewireStyles
</head>

<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="stars" id="stars"></div>
    </div>

    <!-- Buildings Silhouette -->
    <div class="buildings">
        <div class="building building-1">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-2">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-3">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-4">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
        <div class="building building-5">
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
            <div class="window"></div>
        </div>
    </div>

    <!-- Landmarks -->
    <div class="landmark jam-gadang"></div>
    <div class="landmark rumah-gadang"></div>
    <div class="landmark surat"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-container">
            <!-- Logo dan Nama Aplikasi yang bisa diklik -->
            <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90">
                <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung"
                    class="logo">
                <div>
                    <h1 class="app-title">{{ config('app.name') }}</h1>
                    <p class="app-subtitle">Sistem Informasi Infrastruktur</p>
                </div>
            </a>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('login') }}" class="login-button me-3 d-none d-md-inline-block"
                title="Hanya untuk member area">Login</a>
            <div class="theme-toggle me-3" id="theme-toggle"></div>
            <div class="mobile-menu-toggle" id="mobileMenuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <!-- Mega Menu -->
    <div class="mega-menu" id="megaMenu">
        <div class="mega-menu-content">
            <button class="mega-menu-close" id="megaMenuClose" aria-label="Tutup Menu">&times;</button>
            <div class="mega-menu-section">
                <h3 class="mega-menu-title">Menu Utama</h3>
                <div class="mega-menu-links">
                    <a href="{{ asset('/') }}" class="mega-menu-link">Home</a>
                    <a href="list-laporan" class="mega-menu-link">Daftar Laporan</a>
                    <a href="{{ route('list.bts') }}" class="mega-menu-link">Data BTS</a>
                </div>
            </div>
            <div class="mega-menu-section">
                <h3 class="mega-menu-title">Akses Cepat</h3>
                <div class="mega-menu-links">
                    <a href="{{ route('public.laporform') }}" class="mega-menu-link">Buat Laporan</a>
                    <a href="{{ route('login') }}" class="mega-menu-link">Login</a>
                </div>
            </div>
            <div class="mega-menu-section">
                <h3 class="mega-menu-title">Informasi</h3>
                <div class="mega-menu-links">
                    <a href="#tentang" class="mega-menu-link">Tentang Aplikasi</a>
                    <a href="#kontak" class="mega-menu-link">Kontak Kami</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <section class="hero">
            <h2 class="hero-title">Ada Gangguan Jaringan Atau Ada Konsultasi Teknis!</h2>
            <p class="hero-subtitle">Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat.
                Sistem ini membantu Anda melacak laporan secara real-time.</p>
            <div class="hero-buttons">
                <a href="{{ route('public.laporform') }}" class="register-button btn-laporan"
                    style="background-color: #f97316; box-shadow: 0 4px 6px rgba(249, 115, 22, 0.2);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-2 w-5 h-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Buat Laporan
                </a>
                <a href="{{ url('list-laporan') }}" class="register-button btn-laporan">Daftar Laporan</a>
                <a href="{{ route('list.bts') }}" class="register-button btn-bts">Data BTS</a>
            </div>
        </section>

        {{-- <!-- Navigation Links (Desktop) -->
        <div class="mb-5 text-center desktop-nav">
            {{-- <a href="{{ asset('/') }}" class="mx-2 btn btn-outline-primary">Home</a> --}}
        {{-- <a href="{{ route('public.laporform') }}" class="register-button">Buat Laporan</a>
            <a href="list-laporan" class="mx-2 btn btn-outline-primary">Daftar Laporan</a>
            <a href="{{ route('list.bts') }}" class="mx-2 btn btn-outline-primary">Data BTS</a> --}}
        {{-- </div> --}}

        <!-- Info Cards Section -->
        <div class="mt-5 row">
            <!-- Aplikasi Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/front/images/illustration-1.png') }}" alt="Helpdesk Infrastruktur"
                            class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Tentang Aplikasi</h3>
                        <p class="card-text">Sistem Informasi Infrastruktur adalah aplikasi yang memudahkan pelaporan
                            dan pengelolaan gangguan jaringan serta konsultasi teknis di Kabupaten Sijunjung.</p>
                        <p class="card-text">Aplikasi ini membantu mempercepat penanganan masalah infrastruktur
                            teknologi informasi dengan sistem pelaporan yang terintegrasi.</p>
                    </div>
                </div>
            </div>

            <!-- Dinas Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Dinas"
                            class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Dinas Komunikasi dan Informatika</h3>
                        <p class="card-text">Dinas Kominfo Kabupaten Sijunjung bertanggung jawab dalam pengembangan dan
                            pemeliharaan infrastruktur teknologi informasi di seluruh wilayah kabupaten.</p>
                        <p class="card-text">Alamat: Jl. Prof. M. Yamin, SH, Muaro Sijunjung<br>Telp: (0754)
                            20202<br>Email: diskominfo@sijunjung.go.id</p>
                    </div>
                </div>
            </div>

            <!-- Helpdesk Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/front/images/illustration-2.png') }}" alt="Helpdesk Support"
                            class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Helpdesk Infrastruktur</h3>
                        <p class="card-text">Tim helpdesk kami siap membantu Anda dengan masalah infrastruktur
                            jaringan, perangkat keras, dan konsultasi teknis lainnya.</p>
                        <p class="card-text">Jam Operasional: Senin-Jumat, 08.00-16.00 WIB<br>Hotline:
                            0812-3456-7890<br>WhatsApp: 0812-3456-7890</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional CSS for Cards -->
        <style>
            .mega-menu-content {
                background: rgba(20, 30, 48, 0.98);
                border-radius: 16px;
                padding: 32px 16px 24px 16px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                max-width: 320px;
                margin: 0 auto;
            }

            .mega-menu-close {
                position: absolute;
                top: 12px;
                right: 16px;
                background: none;
                border: none;
                color: #fff;
                font-size: 2rem;
                cursor: pointer;
                z-index: 10;
                transition: color 0.2s;
            }

            .mega-menu-close:hover {
                color: #ff5252;
            }

            .card {
                border-radius: 10px;
                border: 2px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            }

            body.dark .card {
                background-color: #1e293b;
                color: #e2e8f0;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            }

            body.dark .card:hover {
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            }

            body.dark .card-title {
                color: #60a5fa !important;
            }

            .card-title {
                font-weight: 600;
                margin-bottom: 1rem;
            }

            .card-text {
                color: #64748b;
                font-size: 0.95rem;
                line-height: 1.6;
            }

            body.dark .card-text {
                color: #94a3b8;
            }

            /* Bayangan untuk tombol navigasi */
            .btn-outline-primary {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            .btn-outline-primary:hover {
                box-shadow: 0 4px 8px rgba(37, 99, 235, 0.2);
                transform: translateY(-2px);
            }

            body.dark .btn-outline-primary {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            }

            body.dark .btn-outline-primary:hover {
                box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
            }

            /* Bayangan untuk tombol utama */
            .register-button,
            .login-button {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .register-button:hover,
            .login-button:hover {
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            }

            body.dark .register-button,
            body.dark .login-button {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            }

            body.dark .register-button:hover,
            body.dark .login-button:hover {
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
            }
        </style>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/front/js/script.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('mobileMenuToggle');
            const megaMenu = document.getElementById('megaMenu');
            const megaMenuLinks = megaMenu ? megaMenu.querySelectorAll('a') : [];
            const megaMenuClose = document.getElementById('megaMenuClose');

            if (menuToggle && megaMenu) {
                menuToggle.addEventListener('click', function() {
                    megaMenu.classList.toggle('active');
                });
            }

            megaMenuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    megaMenu.classList.remove('active');
                });
            });

            if (megaMenuClose) {
                megaMenuClose.addEventListener('click', function() {
                    megaMenu.classList.remove('active');
                });
            }
        });
    </script>

    <script>
        // Create stars
        function createStars() {
            const stars = document.getElementById('stars');
            const count = 100;

            for (let i = 0; i < count; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.width = `${Math.random() * 3}px`;
                star.style.height = star.style.width;
                star.style.left = `${Math.random() * 100}%`;
                star.style.top = `${Math.random() * 100}%`;
                star.style.animationDelay = `${Math.random() * 2}s`;
                stars.appendChild(star);
            }
        }

        // Theme toggle
        function setupThemeToggle() {
            const toggle = document.getElementById('theme-toggle');
            const body = document.body;
            const theme = localStorage.getItem('theme');

            if (theme === 'dark') {
                body.classList.add('dark');
                toggle.classList.add('dark');
            }

            toggle.addEventListener('click', () => {
                body.classList.toggle('dark');
                toggle.classList.toggle('dark');

                const currentTheme = body.classList.contains('dark') ? 'dark' : 'light';
                localStorage.setItem('theme', currentTheme);
            });
        }

        // Interactive landmarks
        function setupLandmarks() {
            const landmarks = document.querySelectorAll('.landmark');

            landmarks.forEach(landmark => {
                landmark.addEventListener('click', () => {
                    landmark.classList.toggle('clicked');
                    setTimeout(() => {
                        landmark.classList.remove('clicked');
                    }, 1000);
                });
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            createStars();
            setupThemeToggle();
            setupLandmarks();
        });
    </script>

    @livewireScripts
</body>

</html>
