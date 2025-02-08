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
        </style>
    </head>
    <body class="bg-gray-50"> <!-- Ubah background body -->
        <div class="flex justify-center items-center py-12 min-h-screen">
            <div class="p-8 mx-auto space-y-8 w-full max-w-5xl form-container">
                <form wire:submit="submit">
                    {{ $this->form }}

                    <div class="mt-6">
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
