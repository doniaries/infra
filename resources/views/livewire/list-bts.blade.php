{{-- resources/views/livewire/list-bts.blade.php --}}
<div>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div id="stars" class="stars"></div>
       
    </div>

    

    <!-- Header -->
    <header class="header">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap gap-2 justify-between items-center">
                <!-- Logo dan Nama Aplikasi yang bisa diklik -->
                <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90 min-w-fit">
                    <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="logo">
                    <div>
                        <h1 class="app-title">{{ config('app.name') }}</h1>
                        <p class="app-subtitle">Sistem Informasi Infrastruktur</p>
                    </div>
                </a>
                <!-- Menu Navigasi dan Theme Toggle -->
                <div class="flex flex-wrap gap-2 items-center mt-2 md:gap-4 md:mt-0">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                    <a href="{{ url('/list-laporan') }}" class="nav-link">Daftar Laporan</a>
                    <a href="{{ url('/list-bts') }}" class="nav-link active">Data BTS</a>
                    <a href="{{ route('public.laporform') }}" class="whitespace-nowrap nav-button">Buat Laporan</a>
                    <div class="theme-toggle" id="theme-toggle"></div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-4 py-8 mx-auto pt-120">
        <div class="mx-auto max-w-4xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold hero-title">Data BTS</h1>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                {{ $this->table }}
            </div>
        </div>
    </div>

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

       

        /* Hapus @keyframes float */
        /* @keyframes float {
            0% {
                transform: translateX(-200px);
            }
            100% {
                transform: translateX(calc(100vw + 200px));
            }
        } */

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
            padding: 0.5rem 0.75rem;
            color: #2563eb;
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: #1e40af;
            text-decoration: underline;
        }

        .nav-link.active {
            font-weight: 500;
            color: #1e40af;
            border-bottom: 2px solid #2563eb;
        }

        body.dark .nav-link {
            color: #60a5fa;
        }

        body.dark .nav-link:hover {
            color: #93c5fd;
        }

        body.dark .nav-link.active {
            color: #93c5fd;
            border-bottom: 2px solid #60a5fa;
        }

        .nav-button {
            padding: 0.5rem 1rem;
            background-color: #2563eb;
            color: white;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
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
                .filament-notifications, .toast, .alert {
                    margin-top: 140px !important;
                }
            }
    </style>

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
        
        // Create clouds
        /* function createClouds() {
            const cloudsContainer = document.querySelector('.clouds');
            const count = 5; // Jumlah awan
            
            for (let i = 0; i < count; i++) {
                const cloud = document.createElement('div');
                cloud.className = 'cloud';
                cloud.style.bottom = `${Math.random() * 100 + 20}px`; // Posisi vertikal acak
                cloud.style.animationDuration = `${15 + Math.random() * 10}s`; // Durasi animasi acak
                cloud.style.animationDelay = `${Math.random() * 5}s`; // Delay animasi acak
                cloud.style.transform = `scale(${0.5 + Math.random() * 0.5})`; // Ukuran acak
                cloudsContainer.appendChild(cloud);
            }
        } */
        
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
            // createClouds(); // Hapus pemanggilan createClouds
            setupThemeToggle();
            setupLandmarks();
        });
    </script>
</div>
