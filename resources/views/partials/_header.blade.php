{{-- File: resources/views/partials/_header.blade.php --}}
<header class="header">
    <div class="logo-container">
        <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90">
            <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="logo">
            <div>
                <h1 class="app-title">{{ config('app.name') }}</h1>
                <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
            </div>
            <img src="{{ asset('images/logo-geopark.png') }}" alt="Logo Geopark Silokek"
                style="height: 40px; width: auto;">
        </a>
    </div>
    <div class="d-flex align-items-center">
        <nav class="desktop-nav d-none d-md-flex align-items-center me-4">
            <a href="{{ route('public.laporform') }}" class="nav-link"><i class="fas fa-plus-circle me-1"></i> Buat
                Laporan</a>
            <a href="{{ route('list.laporan') }}" class="nav-link"><i class="fas fa-list me-1"></i> Daftar Laporan</a>
            <a href="{{ route('list.bts') }}" class="nav-link"><i class="fas fa-broadcast-tower me-1"></i> Data BTS</a>
            <a href="{{ route('public.peta') }}" class="nav-link"><i class="fas fa-map me-1"></i> Peta</a>
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

<div class="mega-menu" id="megaMenu">
    <div class="mega-menu-content">
        <button class="mega-menu-close" id="megaMenuClose" aria-label="Tutup Menu">&times;</button>
        <div class="mega-menu-section">
            <h3 class="mega-menu-title">Menu Utama</h3>
            <div class="mega-menu-links">
                <a href="{{ url('/') }}" class="mega-menu-link">Home</a>
                <a href="{{ route('list.laporan') }}" class="mega-menu-link">Daftar Laporan</a>
                <a href="{{ route('list.bts') }}" class="mega-menu-link">Data BTS</a>
                <a href="{{ route('public.peta') }}" class="mega-menu-link">Peta Infrastruktur</a>
            </div>
        </div>
        <div class="mega-menu-section">
            <h3 class="mega-menu-title">Akses Cepat</h3>
            <div class="mega-menu-links">
                <a href="{{ route('public.laporform') }}" class="mega-menu-link">Buat Laporan Baru</a>
                <a href="{{ route('login') }}" class="mega-menu-link">Login</a>
            </div>
        </div>
    </div>
</div>
