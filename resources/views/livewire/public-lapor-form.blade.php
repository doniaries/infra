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
            /* Custom styling */
            .filament-form-component {
                max-width: 100% !important;
            }

            .filament-forms-field-wrapper {
                max-width: 100% !important;
                background-color: #f8fafc !important;
                border-radius: 0.5rem;
                padding: 0.5rem;
            }

            body.dark .filament-forms-field-wrapper {
                background-color: #1e293b !important;
            }

            .filament-forms-text-input-component,
            .filament-forms-textarea-component {
                width: 100% !important;
            }

            /* Form container styling */
            .form-container {
                background-color: #ffffff;
                border-radius: 0.75rem;
                border: 1px solid #e2e8f0;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }

            body.dark .form-container {
                background-color: #1f2937;
                border-color: #374151;
            }

            /* Form section styling */
            .filament-forms-section-component {
                background-color: transparent !important;
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
            }

            /* Form buttons */
            .form-button {
                transition: all 0.2s ease-in-out;
                font-weight: 500;
                border-radius: 0.5rem;
                padding: 0.75rem 1.5rem;
            }

            .form-button-back {
                background-color: #e5e7eb;
                color: #374151;
            }

            .form-button-back:hover {
                background-color: #d1d5db;
            }

            .form-button-submit {
                background-color: #2563eb;
                color: white;
            }

            .form-button-submit:hover {
                background-color: #1d4ed8;
            }

            body.dark .form-button-back {
                background-color: #374151;
                color: #e5e7eb;
            }

            body.dark .form-button-back:hover {
                background-color: #4b5563;
            }

            body.dark .form-button-submit {
                background-color: #3b82f6;
            }

            body.dark .form-button-submit:hover {
                background-color: #2563eb;
            }
        </style>
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
        <x-shared-header activeMenu="" />
        
        <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
            <div class="container px-4 mx-auto">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 mb-6">
                    <h1 class="text-2xl text-center font-bold text-gray-800 dark:text-white">Form Laporan Infrastruktur</h1>
                </div>
                
                <div class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6 form-container">
                    <form wire:submit.prevent="submit" class="space-y-6">
                        {{ $this->form }}

                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <a href="{{ url('/') }}" class="px-6 py-3 text-center rounded-lg form-button form-button-back">
                                Kembali
                            </a>
                            <button type="submit" class="px-6 py-3 rounded-lg form-button form-button-submit">
                                Kirim Laporan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>

        <style>
            /* Notification styling */
            .filament-notifications,
            .toast,
            .alert {
                top: 120px !important;
                z-index: 9999 !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
                max-width: 500px !important;
                width: 90% !important;
                margin: 0 !important;
            }

            .filament-notification {
                text-align: center !important;
                margin: 0 auto !important;
                border-radius: 0.5rem !important;
            }

            /* Mobile responsive spacing */
            @media (max-width: 640px) {
                .filament-notifications,
                .toast,
                .alert {
                    top: 100px !important;
                }
                
                .form-button {
                    width: 100%;
                }
            }
        </style>

        <script>
            // Handle Livewire redirect events
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('redirect', (url) => {
                    window.location.href = url;
                });
            });
            
            // Fallback for Livewire 2
            document.addEventListener('DOMContentLoaded', () => {
                if (typeof window.Livewire !== 'undefined') {
                    window.Livewire.on('redirect', url => {
                        window.location.href = url;
                    });
                }
            });
            
            

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
