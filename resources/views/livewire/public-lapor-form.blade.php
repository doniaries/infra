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
                background-color: #f8fafc !important; /* Warna latar belakang field yang lembut */
                border-radius: 0.5rem;
                padding: 0.5rem;
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
            }

            /* Styling untuk section form */
            .filament-forms-section-component {
                background-color: #f8fafc !important;
                border: 1px solid #e2e8f0;
                border-radius: 0.75rem;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            }

            /* Header styling */
            .header {
                background-color: #ebf5ff; /* Light blue background */
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                padding: 1rem 0;
            }

            .logo-container {
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .logo {
                height: 4rem;
                width: auto;
            }

            .app-title {
                font-size: 1.25rem;
                font-weight: 700;
                color: #2563eb; /* Blue text color */
                margin: 0;
            }

            .app-subtitle {
                font-size: 0.875rem;
                color: #6b7280;
                margin: 0;
            }
        </style>
    </head>
    <body class="bg-gray-50"> <!-- Ubah background body -->
        <!-- Header -->
        <header class="header">
            <div class="container px-4 mx-auto">
                <div class="flex justify-between items-center">
                    <div class="logo-container">
                        <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="logo">
                        <div>
                            <h1 class="app-title">Lapor Infrastruktur</h1>
                            <p class="app-subtitle">Sistem Informasi Infrastruktur</p>
                        </div>
                    </div>
                    <a href="{{ url('/') }}" class="flex gap-2 items-center px-4 py-2 text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        Kembali ke Home
                    </a>
                </div>
            </div>
        </header>

        <div class="flex justify-center items-center py-6 min-h-screen">
            <div class="p-8 mx-auto space-y-8 w-full max-w-5xl form-container">
                <form wire:submit="submit">
                    {{ $this->form }}

                    <div class="flex gap-4 mt-6">
                        <a href="{{ url('/') }}" class="px-4 py-3 w-full text-center text-gray-700 bg-gray-200 rounded-lg shadow-lg transition-colors duration-200 hover:bg-gray-300 hover:shadow-xl">
                            Kembali
                        </a>
                        <button type="submit" class="px-4 py-3 w-full text-white rounded-lg shadow-lg transition-colors duration-200 bg-primary-600 hover:bg-primary-500 hover:shadow-xl">
                            Kirim Laporan
                        </button>
                    </div>
                </form>

                <script>
                    document.addEventListener('livewire:initialized', () => {
                        Livewire.on('redirect', (url) => {
                            window.location.href = url;
                        });
                    });
                </script>
            </div>
        </div>

        @filamentScripts
        @vite('resources/js/app.js')
        @livewireScripts
    </body>
    </html>
</div>
