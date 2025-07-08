<style>
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
        color: #60a5fa;
    }

    body.dark .header nav a:hover {
        color: #93c5fd;
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
</style>


<div class="container px-4 mx-auto">
    <div class="flex flex-wrap gap-2 justify-between items-center">
        <!-- Logo dan Nama Aplikasi yang bisa diklik -->
        <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90 min-w-fit">
            <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="logo">
            <div>
                <h1 class="app-title">{{ config('app.name') }}</h1>
                <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
            </div>
            <!-- Logo Geopark di sebelah kanan judul -->
            <img src="{{ asset('images/logo-geopark.png') }}" alt="Logo Geopark Silokek"
                style="height: 40px; width: auto;">
        </a>
        <!-- Menu Navigasi dan Theme Toggle -->
        <nav class="flex flex-wrap gap-2 items-center mt-2 md:gap-4 md:mt-0">
            <a href="{{ route('public.laporform') }}" class="nav-link {{ $activeMenu === 'lapor' ? 'active' : '' }}">
                <i class="fas fa-plus-circle me-1"></i> Buat Laporan
            </a>
            <a href="{{ route('list.laporan') }}" class="nav-link {{ $activeMenu === 'laporan' ? 'active' : '' }}">
                <i class="fas fa-list me-1"></i> Daftar Laporan
            </a>
            <a href="{{ route('list.bts') }}" class="nav-link {{ $activeMenu === 'bts' ? 'active' : '' }}">
                <i class="fas fa-broadcast-tower me-1"></i> Data BTS
            </a>
        </nav>
        <a href="{{ route('login') }}" class="login-button ms-3 d-none d-md-inline-block">
            Login
        </a>
        <div class="theme-toggle ms-2" id="theme-toggle"></div>
    </div>
</div>
</header>

<style>
    .pt-120 {
        padding-top: 120px;
    }

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
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
        background-color: #e0f2fe;
        transition: background-color 0.3s ease;
    }

    body.dark .animated-bg {
        background-color: #0c1222;
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
        background-color: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        padding: 1rem 2rem;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    body.dark .header {
        background-color: rgba(15, 23, 42, 0.8);
    }

    .logo-container {
        display: flex;
        align-items: center;
        gap: 1.5rem;
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

    /* Navigation links */
    .nav-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        color: #2563eb;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        letter-spacing: 0.01em;
        border-radius: 0.5rem;
        background: none;
        border: none;
        transition: color 0.2s, background 0.2s;
        text-decoration: none;
    }

    .nav-link:hover {
        color: #1e40af;
        background: rgba(37, 99, 235, 0.08);
        text-decoration: none;
    }

    .nav-link.active {
        color: #1e40af;
        background: rgba(37, 99, 235, 0.13);
        font-weight: 700;
    }

    body.dark .nav-link {
        color: #fff !important;
    }

    body.dark .nav-link:hover {
        color: #60a5fa !important;
        background: rgba(96, 165, 250, 0.08);
    }

    body.dark .nav-link.active {
        color: #60a5fa !important;
        background: rgba(96, 165, 250, 0.13);
        font-weight: 700;
    }

    .nav-button:hover {
        background-color: #1d4ed8;
    }

    body.dark .nav-button {
        background-color: #3b82f6;
    }

    body.dark .nav-button:hover {
        background-color: #2563eb;
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

    /* Hero title */
    .hero-title {
        color: #1e40af;
    }

    body.dark .hero-title {
        color: #60a5fa;
    }

    /* Mobile responsive spacing */
    @media (max-width: 640px) {
        .container.px-4.py-8.mx-auto.pt-120 {
            margin-top: 140px !important;
        }

        .filament-notifications,
        .toast,
        .alert {
            margin-top: 140px !important;
        }
    }
</style>

<script>
    // Create stars
    function createStars() {
        const stars = document.getElementById('stars');
        if (!stars) return;

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
        if (!toggle) return;

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

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        createStars();
        setupThemeToggle();
    });
</script>
