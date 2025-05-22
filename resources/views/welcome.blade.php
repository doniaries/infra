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

    <title>Lapor Infrastruktur</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon.png') }}">

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

        /* Background landmarks */
        .landmark {
            position: absolute;
            bottom: 50px;
            z-index: -2;
            transition: transform 0.5s ease;
            cursor: pointer;
            filter: drop-shadow(0 4px 3px rgba(0, 0, 0, 0.2));
        }
        
        .landmark:hover {
            transform: scale(1.05);
        }
        
        .landmark.clicked {
            transform: translateY(-50px) scale(0.8);
        }
        
        /* Buildings with windows */
        .buildings {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            z-index: -1;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .building {
            position: absolute;
            bottom: 0;
            background-color: #334155;
            transition: background-color 0.3s ease;
        }

        body.dark .building {
            background-color: #1e293b;
        }

        body.dark .cloud {
            opacity: 0.2;
            background-color: #334155;
        }

        body.dark .cloud:before,
        body.dark .cloud:after {
            background-color: #334155;
        }

        @keyframes float {
            0% {
                transform: translateX(-100%) scale(0.6);
            }

            100% {
                transform: translateX(100vw) scale(0.6);
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
                <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="logo">
                <div>
                    <h1 class="app-title">Lapor Infrastruktur</h1>
                    <p class="app-subtitle">Sistem Informasi Infrastruktur</p>
                </div>
            </a>
        </div>
        <div class="theme-toggle" id="theme-toggle"></div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <section class="hero">
            <h2 class="hero-title">Ada Gangguan Jaringan Atau Ada Konsultasi Teknis!</h2>
            <p class="hero-subtitle">Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat. Sistem ini membantu Anda melacak laporan secara real-time.</p>
            <div>
                <a href="{{ route('public.laporform') }}" class="register-button">Buat Laporan</a>
                <a href="{{ route('login') }}" class="login-button">Login</a>
            </div>
        </section>

        <!-- Navigation Links -->
        <div class="mb-5 text-center">
            <a href="{{ asset('/') }}" class="mx-2 btn btn-outline-primary">Home</a>
            <a href="list-laporan" class="mx-2 btn btn-outline-primary">Daftar Laporan</a>
            <a href="{{ route('list.bts') }}" class="mx-2 btn btn-outline-primary">Data BTS</a>
        </div>

        <!-- Info Cards Section -->
        <div class="mt-5 row">
            <!-- Aplikasi Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/front/images/illustration-1.png') }}" alt="Helpdesk Infrastruktur" class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Tentang Aplikasi</h3>
                        <p class="card-text">Sistem Informasi Infrastruktur adalah aplikasi yang memudahkan pelaporan dan pengelolaan gangguan jaringan serta konsultasi teknis di Kabupaten Sijunjung.</p>
                        <p class="card-text">Aplikasi ini membantu mempercepat penanganan masalah infrastruktur teknologi informasi dengan sistem pelaporan yang terintegrasi.</p>
                    </div>
                </div>
            </div>
            
            <!-- Dinas Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Dinas" class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Dinas Komunikasi dan Informatika</h3>
                        <p class="card-text">Dinas Kominfo Kabupaten Sijunjung bertanggung jawab dalam pengembangan dan pemeliharaan infrastruktur teknologi informasi di seluruh wilayah kabupaten.</p>
                        <p class="card-text">Alamat: Jl. Prof. M. Yamin, SH, Muaro Sijunjung<br>Telp: (0754) 20202<br>Email: diskominfo@sijunjung.go.id</p>
                    </div>
                </div>
            </div>
            
            <!-- Helpdesk Info Card -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card h-100">
                    <div class="text-center card-body">
                        <img src="{{ asset('/front/images/illustration-2.png') }}" alt="Helpdesk Support" class="mb-3 img-fluid" style="max-height: 150px;">
                        <h3 class="card-title text-primary">Helpdesk Infrastruktur</h3>
                        <p class="card-text">Tim helpdesk kami siap membantu Anda dengan masalah infrastruktur jaringan, perangkat keras, dan konsultasi teknis lainnya.</p>
                        <p class="card-text">Jam Operasional: Senin-Jumat, 08.00-16.00 WIB<br>Hotline: 0812-3456-7890<br>WhatsApp: 0812-3456-7890</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional CSS for Cards -->
        <style>
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
            .register-button, .login-button {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            
            .register-button:hover, .login-button:hover {
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            }
            
            body.dark .register-button, body.dark .login-button {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            }
            
            body.dark .register-button:hover, body.dark .login-button:hover {
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
            }
        </style>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('/front/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/front/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/front/js/script.js') }}"></script>
    
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
