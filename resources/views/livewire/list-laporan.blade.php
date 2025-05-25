{{-- resources/views/livewire/list-laporan.blade.php --}}
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
                    <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung"
                        class="logo">
                    <div>
                        <h1 class="app-title">{{ config('app.name') }}</h1>
                        <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
                    </div>
                </a>
                <!-- Menu Navigasi dan Theme Toggle -->
                <div class="flex flex-wrap gap-2 items-center mt-2 md:gap-4 md:mt-0">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                    <a href="{{ url('/list-laporan') }}" class="nav-link active">Daftar Laporan</a>
                    <a href="{{ url('/list-bts') }}" class="nav-link">Data BTS</a>
                    {{-- <a href="{{ route('public.laporform') }}" class="whitespace-nowrap nav-button">Buat Laporan</a> --}}
                    <div class="theme-toggle" id="theme-toggle"></div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-4 py-8 mx-auto pt-120">
        <div class="mx-auto max-w-6xl">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Laporan</h1>
                    @if($ticket)
                    <div class="mt-2 px-3 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-100 rounded-md inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span>Menampilkan hasil untuk nomor tiket: <strong>{{ $ticket }}</strong></span>
                        <a href="{{ url('/list-laporan') }}" class="ml-2 text-blue-600 dark:text-blue-300 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                    @endif
                </div>
                <a href="{{ route('public.laporform') }}"
                    class="inline-flex items-center px-3 py-1.5 text-lm font-medium text-white rounded-md shadow-sm nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Buat Laporan
                </a>
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

        /* Animasi untuk ikon tombol Buat Laporan */
        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .animate-pulse-slow {
            animation: pulse-slow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Efek tambahan untuk tombol Buat Laporan */
        .create-report-btn {
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .create-report-btn:after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .create-report-btn:hover:after {
            left: 100%;
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


        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            createStars();
            // createClouds(); // Hapus pemanggilan createClouds
            setupThemeToggle();
            setupLandmarks();
        });
    </script>

    @pushOnce('scripts')
        <script>
            function onSubmit(token) {
                document.getElementById("LaporForm").submit();
            }
        </script>
    @endPushOnce
</div>
