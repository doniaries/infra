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
        <x-shared-header activeMenu="" />

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
