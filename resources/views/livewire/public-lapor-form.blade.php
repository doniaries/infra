<div class="p-6 mx-auto max-w-4xl">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold">Form Pengaduan</h1>
        <p class="text-gray-600">Silakan isi form pengaduan di bawah ini</p>
    </div>

    <div class="p-6 bg-white rounded-lg shadow-lg">
        <form wire:submit="submit">
            {{ $this->form }}

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 w-full text-white rounded-lg bg-primary-600 hover:bg-primary-700">
                    Kirim Laporan
                </button>
            </div>
        </form>
    </div>
</div>
