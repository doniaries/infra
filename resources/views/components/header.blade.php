<!-- Header -->
<header class="header">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <!-- Logo dan Nama Aplikasi yang bisa diklik -->
            <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90 min-w-fit">
                <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung"
                    class="logo">
                <div>
                    <h1 class="app-title">{{ config('app.name') }}</h1>
                    <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
                </div>
            </a>
            <!-- Menu Navigasi dan Theme Toggle -->
            <div class="flex flex-wrap gap-2 items-center mt-2 md:gap-4 md:mt-0">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/list-laporan') }}" class="nav-link {{ request()->is('list-laporan') ? 'active' : '' }}">Daftar Laporan</a>
                <a href="{{ url('/list-bts') }}" class="nav-link {{ request()->is('list-bts') ? 'active' : '' }}">Data BTS</a>
                <div class="theme-toggle" id="theme-toggle"></div>
            </div>
        </div>
    </div>
</header>