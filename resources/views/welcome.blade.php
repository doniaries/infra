<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('images/kabupaten-sijunjung.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700|instrument-sans:400,500,600" rel="stylesheet" />

<!-- CSS Plugins -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
{{-- <link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/fontawesome.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/brands.css') }}">
<link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/solid.css') }}">
<link rel="stylesheet" href="{{ asset('/front/css/style.css') }}">

<!-- Styles -->
<style>
    /* Typewriter cursor animation */
    .caret {
        display: inline-block;
        width: 2px;
        background-color: currentColor;
        margin-left: 2px;
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {

        from,
        to {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

    /* Typewriter container */
    .type-hero {
        min-height: 1.5em;
        display: inline-block;
        text-align: center;
    }

    /* Base styles */
    body {
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s ease, color 0.3s ease;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        position: relative;
    }

    /* Dark mode styles */
    body.dark {
        background-color: #0f172a;
        color: #f8fafc;
    }

    /* Responsive button sizes */
    @media (min-width: 992px) {
        .register-button {
            padding: 0.4rem 1rem !important;
            font-size: 0.9rem !important;
        }

        .register-button svg {
            width: 14px !important;
            height: 14px !important;
            margin-right: 0.4rem !important;
        }
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
        background-color: #eef2f5;
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
        transition: all 0.3s ease;
    }

    .header nav a {
        color: #1e40af;
        font-weight: 500;
        transition: all 0.2s ease;
        padding: 0.5rem 0;
        position: relative;
    }

    .header nav a:hover {
        color: #1e3a8a;
    }

    .header nav a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #1e40af;
        transition: width 0.3s ease;
    }

    .header nav a:hover::after {
        width: 100%;
    }

    body.dark .header nav a {
        color: #fff !important;
    }

    body.dark .header nav a:hover,
    body.dark .header nav a.active {
        color: #60a5fa !important;
    }

    body.dark .header nav a::after {
        background-color: #60a5fa;
    }

    .header.scrolled {
        background-color: rgba(255, 255, 255, 0.95);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    body.dark .header.scrolled {
        background-color: rgba(15, 23, 42, 0.95);
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
        color: #12130f;
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
        color: #181b15;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    body.dark .hero-title {
        color: #a5fa60;
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

    .btn-nagari {
        background-color: #10b981;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
    }

    .btn-nagari:before {
        background-color: #059669;
    }

    .btn-nagari:hover {
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    .btn-jorong {
        background-color: #8b5cf6;
        box-shadow: 0 4px 6px rgba(139, 92, 246, 0.2);
    }

    .btn-jorong:before {
        background-color: #7c3aed;
    }

    .btn-jorong:hover {
        box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);
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

    body.dark .btn-nagari {
        background-color: #10b981;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);
    }

    body.dark .btn-nagari:before {
        background-color: #059669;
    }

    body.dark .btn-nagari:hover {
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
    }

    body.dark .btn-jorong {
        background-color: #8b5cf6;
        box-shadow: 0 4px 6px rgba(139, 92, 246, 0.3);
    }

    body.dark .btn-jorong:before {
        background-color: #7c3aed;
    }

    body.dark .btn-jorong:hover {
        box-shadow: 0 10px 20px rgba(139, 92, 246, 0.4);
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

    /* Ticket Search Styles */
    .ticket-search-container {
        margin-top: 2rem;
        width: 100%;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .ticket-search-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 1rem;
        text-align: center;
    }

    body.dark .ticket-search-title {
        color: #60a5fa;
    }

    .ticket-search-form {
        width: 100%;
    }

    .ticket-search-input-group {
        display: flex;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .ticket-search-input-group:focus-within {
        box-shadow: 0 10px 15px rgba(37, 99, 235, 0.2);
        transform: translateY(-2px);
    }

    body.dark .ticket-search-input-group {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    body.dark .ticket-search-input-group:focus-within {
        box-shadow: 0 10px 15px rgba(59, 130, 246, 0.3);
    }

    /* Search input styles */
    .ticket-search-input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-right: none;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease;
        background-color: white;
        color: #1e293b;
    }

    body.dark .ticket-search-input {
        background-color: #1e293b;
        border-color: #334155;
        color: #e2e8f0;
    }

    .ticket-search-input:focus {
        border-color: #3b82f6;
    }

    body.dark .ticket-search-input:focus {
        border-color: #60a5fa;
    }

    .ticket-search-button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        background-color: #3b82f6;
        color: white;
        font-weight: 600;
        border: none;
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .ticket-search-button:hover {
        background-color: #2563eb;
    }

    body.dark .ticket-search-button {
        background-color: #60a5fa;
    }

    body.dark .ticket-search-button:hover {
        background-color: #3b82f6;
    }

    .ticket-search-icon {
        width: 1.25rem;
        height: 1.25rem;
        margin-right: 0.5rem;
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

        .ticket-search-container {
            padding: 0 1rem;
        }

        .ticket-search-title {
            font-size: 1.1rem;
        }

        .ticket-search-input {
            padding: 0.6rem 0.8rem;
            font-size: 0.9rem;
        }

        .ticket-search-button {
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }

        .ticket-search-icon {
            width: 1rem;
            height: 1rem;
            margin-right: 0.3rem;
        }
    }
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
</head>

<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="stars" id="stars"></div>
    </div>


    <!-- Header -->
    <header class="header">
        <div class="logo-container">
            <!-- Logo dan Nama Aplikasi yang bisa diklik -->
            <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90">
                <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="logo">
                <div>
                    <h1 class="app-title">{{ config('app.name') }}</h1>
                    <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
                </div>
                <!-- Logo Geopark di sebelah kanan judul -->
                <img src="{{ asset('images/logo-geopark.png') }}" alt="Logo Geopark Silokek"
                    style="height: 40px; width: auto;">
            </a>
        </div>
        <div class="d-flex align-items-center">
            <!-- Desktop Navigation -->
            <nav class="d-none d-md-flex align-items-center me-4">
                <a href="{{ route('public.laporform') }}" class="me-4 text-decoration-none text-dark">
                    <i class="fas fa-plus-circle me-1"></i> Buat Laporan
                </a>
                <a href="{{ route('list.laporan') }}" class="me-4 text-decoration-none text-dark">
                    <i class="fas fa-list me-1"></i> Daftar Laporan
                </a>
                <a href="{{ route('list.bts') }}" class="me-4 text-decoration-none text-dark">
                    <i class="fas fa-broadcast-tower me-1"></i> Data BTS
                </a>
                <a href="{{ route('list.nagari') }}" class="me-4 text-decoration-none text-dark">
                    <i class="fas fa-map-marker-alt me-1"></i> Data Nagari
                </a>
                <a href="{{ route('list.jorong') }}" class="me-4 text-decoration-none text-dark">
                    <i class="fas fa-map me-1"></i> Data Jorong
                </a>
            </nav>

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
                    <a href="{{ route('list.nagari') }}" class="mega-menu-link">Data Nagari</a>
                    <a href="{{ route('list.jorong') }}" class="mega-menu-link">Data Jorong</a>
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
            <div class="w-full flex justify-center">
                <h2 class="hero-title text-center text-4xl font-bold text-yellow-400 type-hero"></h2>
            </div>
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
                <a href="{{ route('list.nagari') }}" class="register-button btn-nagari btn-small">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-2 w-4 h-4" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                    Data Nagari
                </a>
                <a href="{{ route('list.jorong') }}" class="register-button btn-jorong btn-small">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-2 w-4 h-4" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>
                    Data Jorong
                </a>
            </div>

            <!-- Pencarian Nomor Tiket -->
            <div class="mt-4 ticket-search-container">
                <h3 class="ticket-search-title">Cek Status Laporan Anda</h3>
                <form action="{{ url('list-laporan') }}" method="GET" class="ticket-search-form">
                    <div class="ticket-search-input-group">
                        <input type="text" name="ticket" id="ticket" placeholder="Masukkan Nomor Tiket"
                            class="ticket-search-input" required>
                        <button type="submit" class="ticket-search-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ticket-search-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </section>


        <!-- Section: Peta BTS -->
        <h2 class="mb-3 text-center text-primary" style="margin-top:6rem;">
            <span class="bg-white px-3 py-2 rounded shadow-md d-inline-block bts-map-title-bg">Peta Sebaran BTS
                Kabupaten Sijunjung</span>
        </h2>
        <div class="container my-5 bg-white">
            <div id="bts-map" style="width:100%;height:400px;border-radius:16px;overflow:hidden;"></div>
        </div>


        <!-- Info Cards Section -->
        <div class="mt-5 row">
            <!-- Aplikasi Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/front/images/illustration-1.png') }}" alt="Helpdesk Infrastruktur"
                            class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Tentang Aplikasi</h3>
                        <p class="card-text">Sistem Informasi Infrastruktur TI adalah aplikasi yang memudahkan
                            pelaporan
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
                        <div class="w-100 d-flex justify-content-center">
                            <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Dinas"
                                class="mb-3 img-fluid" style="max-height: 150px;">
                        </div>
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



        <!-- LeafletJS CDN -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi peta
                var map = L.map('bts-map').setView([-0.693, 100.987], 10); // Default center Sijunjung
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                // Ambil data marker dari endpoint Laravel
                fetch('/bts-map-data')
                    .then(res => res.json())
                    .then(data => {
                        // Custom icon tower
                        var towerIcon = L.icon({
                            iconUrl: "{{ asset('images/tower-marker.png') }}", // Ganti ke SVG jika ada
                            iconSize: [32, 40],
                            iconAnchor: [16, 40],
                            popupAnchor: [0, -36]
                        });
                        data.forEach(function(bts) {
                            if (bts.lat && bts.lng) {
                                var marker = L.marker([bts.lat, bts.lng], {
                                    icon: towerIcon
                                }).addTo(map);
                                var popup = `<b>${bts.pemilik || '-'}</b><br>${bts.alamat || '-'}<br>` +
                                    `Teknologi: <b>${bts.teknologi}</b><br>Status: <b>${bts.status}</b><br>` +
                                    `Tahun Bangun: <b>${bts.tahun_bangun}</b>`;
                                marker.bindPopup(popup);
                            }
                        });
                    });
            });
        </script>

        <!-- Map and Card Styles -->
        <style>
            /* Map container */
            .leaflet-container {
                z-index: 1;
                height: 400px;
                width: 100%;
                border-radius: 0.5rem;
                margin: 1rem 0;
            }

            /* Card styling */
            .card {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
                border: none;
                border-radius: 0.5rem;
                overflow: hidden;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }

            .card-body {
                padding: 1.5rem;
            }

            .card-title {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 0.75rem;
                color: #1e40af;
            }

            .card-text {
                color: #4b5563;
                margin-bottom: 1rem;
                line-height: 1.6;
            }

            /* Center images in cards */
            .card-body img {}

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

    <!-- Scroll Handler -->
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Initialize header state on page load
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            }
        });
    </script>

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
    <!-- Typewriter effect is now handled by Tailwind CSS plugin -->
</body>

</html>
