{{-- resources/views/livewire/list-laporan.blade.php --}}
<div>
    <x-shared-header activeMenu="laporan" />

    
    <div class="container px-4 py-8 mx-auto pt-120">
        {{-- lebar tabel --}}
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Laporan</h1>
                    @if($ticket)
                    <div class="inline-flex items-center px-3 py-1 mt-2 text-blue-800 bg-blue-100 rounded-md dark:bg-blue-900 dark:text-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span>Menampilkan hasil untuk nomor tiket: <strong>{{ $ticket }}</strong></span>
                        <a href="{{ url('/list-laporan') }}" class="ml-2 text-blue-600 dark:text-blue-300 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                    @endif
                </div>
                <a href="{{ route('public.laporform') }}"
                    class="inline-flex items-center px-3 py-1.5 font-medium text-white rounded-md shadow-sm text-lm nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-4 h-4" viewBox="0 0 20 20"
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



    @pushOnce('scripts')
        <script>
            function onSubmit(token) {
                document.getElementById("LaporForm").submit();
            }
        </script>
    @endPushOnce
</div>
