<div>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Pengaduan</title>

        @filamentStyles
        @vite('resources/css/app.css')

        <style>
            .pt-120 {
    padding-top: 90px;
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

            /* Custom styling */
            .filament-form-component {
                max-width: 100% !important;
            }

            .filament-forms-field-wrapper {
                max-width: 100% !important;
                background-color: #f8fafc !important; /* Warna latar belakang field yang lembut */
                border-radius: 0.5rem;
                padding: 0.5rem;
            }

            body.dark .filament-forms-field-wrapper {
                background-color: #1e293b !important;
            }

            .filament-forms-text-input-component {
                width: 100% !important;
            }

            .filament-forms-textarea-component {
                width: 100% !important;
            }

            /* Custom background dan shadow untuk form container */
            .form-container {
                background-color: #ffffff;
                box-shadow:
                    0 4px 6px -1px rgba(0, 0, 0, 0.1),
                    0 2px 4px -1px rgba(0, 0, 0, 0.06),
                    0 0 0 1px rgba(0, 0, 0, 0.05);
                border-radius: 1rem;
                transition: background-color 0.3s ease, box-shadow 0.3s ease;
            }

            body.dark .form-container {
                background-color: #1e293b;
                box-shadow:
                    0 4px 6px -1px rgba(0, 0, 0, 0.2),
                    0 2px 4px -1px rgba(0, 0, 0, 0.1),
                    0 0 0 1px rgba(0, 0, 0, 0.1);
            }

            /* Styling untuk section form */
            .filament-forms-section-component {
                background-color: #f8fafc !important;
                border: 1px solid #e2e8f0;
                border-radius: 0.75rem;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                transition: background-color 0.3s ease, border-color 0.3s ease;
            }

            body.dark .filament-forms-section-component {
                background-color: #0f172a !important;
                border-color: #334155;
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

            /* Form buttons */
            .form-button {
                transition: all 0.3s ease;
            }

            .form-button-back {
                background-color: #e2e8f0;
                color: #475569;
            }

            .form-button-back:hover {
                background-color: #cbd5e1;
            }

            body.dark .form-button-back {
                background-color: #334155;
                color: #e2e8f0;
            }

            body.dark .form-button-back:hover {
                background-color: #475569;
            }

            .form-button-submit {
                background-color: #2563eb;
                color: white;
            }

            .form-button-submit:hover {
                background-color: #1d4ed8;
            }

            body.dark .form-button-submit {
                background-color: #3b82f6;
            }

            body.dark .form-button-submit:hover {
                background-color: #2563eb;
            }
        </style>
    </head>
    <body class="bg-gray-50"> <!-- Ubah background body -->
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
                            <h1 class="app-title">Lapor Infrastruktur</h1>
                            <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
                        </div>
                    </a>
                    <!-- Menu Navigasi dan Theme Toggle -->
                    <div class="flex flex-wrap gap-2 items-center mt-2 md:gap-4 md:mt-0">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                        <a href="{{ url('/list-laporan') }}" class="nav-link">Daftar Laporan</a>
                        <a href="{{ url('/list-bts') }}" class="nav-link">Data BTS</a>
                        {{-- <a href="{{ route('public.laporform') }}" class="whitespace-nowrap nav-link active">Buat Laporan</a> --}}
                        <div class="theme-toggle" id="theme-toggle"></div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container px-4 py-8 mx-auto pt-120" style="margin-top: 120px; margin-left: 32px;">
            <div class="p-8 mx-auto space-y-8 w-full max-w-5xl form-container">
                <form wire:submit.prevent="submit">
                    {{ $this->form }}

                    <div class="flex gap-4 mt-6">
                        <a href="{{ url('/') }}" class="px-4 py-3 w-full text-center rounded-lg shadow-lg transition-colors duration-200 form-button form-button-back">
                            Kembali
                        </a>
                        <button type="submit" class="px-4 py-3 w-full rounded-lg shadow-lg transition-colors duration-200 form-button form-button-submit">
                            Kirim Laporan
                        </button>
                    </div>
                </form>

                <script>
                    // Menangani event redirect untuk Livewire 3
                    document.addEventListener('livewire:initialized', () => {
                        Livewire.on('redirect', (url) => {
                            window.location.href = url;
                        });
                    });
                    
                    // Menangani event redirect untuk Livewire 2 (fallback)
                    document.addEventListener('DOMContentLoaded', () => {
                        if (typeof window.Livewire !== 'undefined') {
                            window.Livewire.on('redirect', url => {
                                window.location.href = url;
                            });
                        }
                    });
                </script>
            </div>
        </div>

        <style>
            /* Ensure notifications are visible below the header */
            .filament-notifications, .toast, .alert {
                margin-top: 120px !important;
                z-index: 9999 !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
                max-width: 500px !important;
                width: 90% !important;
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

            /* Styling untuk notifikasi */
            .filament-notification {
                text-align: center !important;
                margin: 0 auto !important;
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
            
            // Initialize functions
            document.addEventListener('DOMContentLoaded', function() {
                createStars();
                setupThemeToggle();
            });
          
        </script>

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
    </html>
</div>
