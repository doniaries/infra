<!-- Animated Background -->
<div class="animated-bg">
    <div class="stars" id="stars"></div>
</div>

<style>
    /* Animated Background */
    .animated-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        overflow: hidden;
        background: linear-gradient(to bottom, #f0f9ff, #e0f2fe);
        transition: background 0.3s ease;
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
    
    /* Logo and title styles */
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
    
    /* Mega menu styles */
    .mega-menu {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 0;
        background-color: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        overflow-y: auto;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 150;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 80px;
        opacity: 0;
        visibility: hidden;
    }
    
    .mega-menu-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        max-width: 500px;
        padding: 1.5rem;
    }
    
    .mega-menu-section {
        margin-bottom: 2rem;
        width: 100%;
        text-align: center;
    }

    .mega-menu.active {
        height: 100vh;
        opacity: 1;
        visibility: visible;
        padding: 80px 20px 20px;
    }

    body.dark .mega-menu {
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

    @media (max-width: 767px) {
        .mobile-menu-toggle {
            display: flex;
        }
    }
    
    body.dark .animated-bg,
    .dark-mode .animated-bg {
        background: linear-gradient(to bottom, #1a1a2e, #16213e);
    }
    
    .stars {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .star {
        position: absolute;
        background-color: #fff;
        border-radius: 50%;
        animation: twinkle 3s infinite;
    }
    
    @keyframes twinkle {
        0% { opacity: 0.2; }
        50% { opacity: 1; }
        100% { opacity: 0.2; }
    }
    
    /* Active link styles */
     .text-decoration-none.active,
     .mega-menu-link.active {
         color: #007bff !important;
         font-weight: bold;
     }
     
     .mega-menu-dropdown.active > .mega-menu-dropdown-toggle {
         color: #007bff;
         font-weight: bold;
     }
     
     body.dark .text-decoration-none.active,
     body.dark .mega-menu-link.active,
     .dark-mode .text-decoration-none.active,
     .dark-mode .mega-menu-link.active {
         color: #00d2ff !important;
     }
     
     body.dark .mega-menu-dropdown.active > .mega-menu-dropdown-toggle,
     .dark-mode .mega-menu-dropdown.active > .mega-menu-dropdown-toggle {
         color: #00d2ff;
     }
</style>

<!-- Header -->
@props(['activeMenu' => ''])
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
            <a href="{{ asset('/') }}" class="me-4 text-decoration-none text-dark {{ $activeMenu == 'home' ? 'active' : '' }}">
                <i class="fas fa-home me-1"></i> Home
            </a>
            <a href="{{ route('public.laporform') }}" class="me-4 text-decoration-none text-dark {{ $activeMenu == 'lapor' ? 'active' : '' }}">
                <i class="fas fa-plus-circle me-1"></i> Buat Laporan
            </a>
            <a href="{{ route('list.laporan') }}" class="me-4 text-decoration-none text-dark {{ $activeMenu == 'laporan' ? 'active' : '' }}">
                <i class="fas fa-list me-1"></i> Daftar Laporan
            </a>
            <div class="dropdown me-4">
                <a href="#" class="text-decoration-none text-dark dropdown-toggle {{ $activeMenu == 'nagari' || $activeMenu == 'jorong' ? 'active' : '' }}" id="nagariDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-map-marker-alt me-1"></i> Nagari
                </a>
                <ul class="dropdown-menu" aria-labelledby="nagariDropdown">
                    <li><a class="dropdown-item" href="{{ route('public.nagariform') }}"><i class="fas fa-plus-circle me-1"></i> Input Nagari</a></li>
                    <li><a class="dropdown-item" href="{{ route('list.nagari') }}"><i class="fas fa-list me-1"></i> Daftar Nagari</a></li>
                    <li><a class="dropdown-item" href="{{ route('public.jorongform') }}"><i class="fas fa-plus-circle me-1"></i> Input Jorong</a></li>
                    <li><a class="dropdown-item" href="{{ route('list.jorong') }}"><i class="fas fa-list me-1"></i> Daftar Jorong</a></li>
                </ul>
            </div>
            <a href="{{ route('list.bts') }}" class="me-4 text-decoration-none text-dark {{ $activeMenu == 'bts' ? 'active' : '' }}">
                <i class="fas fa-broadcast-tower me-1"></i> Data BTS
            </a>
            <a href="{{ route('public.peta') }}" class="me-4 text-decoration-none text-dark {{ $activeMenu == 'peta' ? 'active' : '' }}">
                <i class="fas fa-map me-1"></i> Peta Infrastruktur
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
                <a href="{{ asset('/') }}" class="mega-menu-link {{ $activeMenu == 'home' ? 'active' : '' }}">Home</a>
                <a href="{{ route('list.laporan') }}" class="mega-menu-link {{ $activeMenu == 'laporan' ? 'active' : '' }}">Daftar Laporan</a>
                <div class="mega-menu-dropdown {{ $activeMenu == 'nagari' || $activeMenu == 'jorong' ? 'active' : '' }}">
                    <span class="mega-menu-link mega-menu-dropdown-toggle">Nagari</span>
                    <div class="mega-menu-dropdown-content">
                        <a href="{{ route('public.nagariform') }}" class="mega-menu-link mega-menu-dropdown-item">Input Nagari</a>
                        <a href="{{ route('list.nagari') }}" class="mega-menu-link mega-menu-dropdown-item">Daftar Nagari</a>
                        <a href="{{ route('public.jorongform') }}" class="mega-menu-link mega-menu-dropdown-item">Input Jorong</a>
                        <a href="{{ route('list.jorong') }}" class="mega-menu-link mega-menu-dropdown-item">Daftar Jorong</a>
                    </div>
                </div>
                <a href="{{ route('list.bts') }}" class="mega-menu-link {{ $activeMenu == 'bts' ? 'active' : '' }}">Data BTS</a>
                <a href="{{ route('public.peta') }}" class="mega-menu-link {{ $activeMenu == 'peta' ? 'active' : '' }}">Peta Infrastruktur</a>
            </div>
        </div>
        <div class="mega-menu-section">
            <h3 class="mega-menu-title">Akses Cepat</h3>
            <div class="mega-menu-links">
                <a href="{{ route('public.laporform') }}" class="mega-menu-link {{ $activeMenu == 'lapor' ? 'active' : '' }}">Buat Laporan</a>
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

<!-- Include the JavaScript for the header functionality -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const megaMenu = document.getElementById('megaMenu');
        const megaMenuClose = document.getElementById('megaMenuClose');
        

        
        if (mobileMenuToggle && megaMenu) {
            mobileMenuToggle.addEventListener('click', function() {
                megaMenu.classList.toggle('active');
                mobileMenuToggle.classList.toggle('active');
                document.body.classList.toggle('menu-open');
            });
            
            // Close mega menu when clicking on links
            if (megaMenu) {
                const megaMenuLinks = megaMenu.querySelectorAll('a');
                megaMenuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        megaMenu.classList.remove('active');
                        mobileMenuToggle.classList.remove('active');
                        document.body.classList.remove('menu-open');
                    });
                });
            }
        }
        
        // Close mega menu with close button
        if (megaMenuClose) {
            megaMenuClose.addEventListener('click', function() {
                if (megaMenu) megaMenu.classList.remove('active');
                if (mobileMenuToggle) mobileMenuToggle.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        }
        
        // Bootstrap dropdown initialization
        try {
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
        } catch (e) {
            console.log('Bootstrap dropdown initialization error:', e);
        }
        
        // Mobile mega menu dropdown toggle
        const megaMenuDropdowns = document.querySelectorAll('.mega-menu-dropdown-toggle');
        megaMenuDropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function() {
                const parent = this.closest('.mega-menu-dropdown');
                if (parent) {
                    parent.classList.toggle('active');
                }
            });
        });
        
        // Mega menu dropdown content styles
        const style = document.createElement('style');
        style.textContent = `
            .mega-menu-dropdown-content {
                display: none;
                padding-left: 1rem;
            }

            .mega-menu-dropdown.active .mega-menu-dropdown-content {
                display: block;
            }
            
            .mega-menu-close {
                position: absolute;
                top: 20px;
                right: 20px;
                font-size: 30px;
                background: none;
                border: none;
                color: #2563eb;
                cursor: pointer;
                z-index: 160;
            }
            
            body.dark .mega-menu-close {
                color: #60a5fa;
            }
        `;
        document.head.appendChild(style);
        
        // Create stars for the background
        createStars();
    });
 
    // Close mega menu when clicking outside
    document.addEventListener('click', function(event) {
        const megaMenu = document.getElementById('megaMenu');
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        if (megaMenu && mobileMenuToggle && 
            megaMenu.classList.contains('active') && 
            !megaMenu.contains(event.target) && 
            !mobileMenuToggle.contains(event.target)) {
            megaMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            document.body.classList.remove('menu-open');
        }
    });

    // Theme toggle functionality
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
        const currentTheme = localStorage.getItem('theme') || (prefersDarkScheme.matches ? 'dark' : 'light');

        // Set the initial theme
        if (currentTheme === 'dark') {
            document.body.classList.add('dark');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
            document.body.classList.remove('dark');
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        }

        // Toggle theme when clicking the theme toggle
        themeToggle.addEventListener('click', () => {
            const isDark = document.body.classList.toggle('dark');
            if (isDark) {
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                localStorage.setItem('theme', 'light');
            }
        });
    }

    // Create stars for the background
    function createStars() {
        const starsContainer = document.getElementById('stars');
        if (!starsContainer) return;
        
        // Clear existing stars
        starsContainer.innerHTML = '';
        
        // Create stars
        const starsCount = 100;
        const width = window.innerWidth;
        const height = window.innerHeight;
        
        for (let i = 0; i < starsCount; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            
            // Random position
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            
            // Random size between 1px and 3px
            const size = Math.random() * 2 + 1;
            
            // Random animation duration and delay
            const duration = Math.random() * 3 + 2;
            const delay = Math.random() * 2;
            
            star.style.left = posX + '%';
            star.style.top = posY + '%';
            star.style.width = size + 'px';
            star.style.height = size + 'px';
            star.style.animationDuration = duration + 's';
            star.style.animationDelay = delay + 's';
            star.style.opacity = Math.random() * 0.5 + 0.3;
            
            starsContainer.appendChild(star);
        }
    }

    // Initialize stars on page load
    document.addEventListener('DOMContentLoaded', createStars);
    
    // Recreate stars on window resize
    window.addEventListener('resize', createStars);

    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        if (header) {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
    });
</script>
@endpush
