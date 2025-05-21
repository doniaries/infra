{{-- resources/views/livewire/list-laporan.blade.php --}}
<div>
    <!-- Header -->
    <header class="py-4 bg-blue-50 shadow-md">
        <div class="container px-4 mx-auto">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="w-auto h-16">
                    <div>
                        <h1 class="text-xl font-bold text-blue-600">Lapor Infrastruktur</h1>
                        <p class="text-sm text-gray-600">Sistem Informasi Infrastruktur</p>
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

    <div class="container px-4 py-8 mx-auto">
        <div class="mx-auto max-w-4xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Formulir Laporan</h1>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                {{ $this->table }}
            </div>
        </div>
    </div>

    @pushOnce('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("LaporForm").submit();
        }
    </script>
    @endPushOnce
</div>
