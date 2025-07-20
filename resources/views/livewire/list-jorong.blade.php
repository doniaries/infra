<div>
    <x-shared-header activeMenu="jorong" />
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 mb-4 gap-4">
                <h1 class="text-2xl text-center font-bold text-gray-800 dark:text-white">Data Jorong</h1>
                <a href="{{ route('public.jorongform') }}"
                    class="inline-block px-5 py-2 rounded-md bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">+
                    Tambah Jorong</a>
            </div>
            
            <script>
            document.addEventListener('livewire:initialized', () => {
                @this.on('notify', ({ type, message }) => {
                    window.$notify({
                        title: type === 'success' ? 'Berhasil!' : 'Perhatian!',
                        description: message,
                        icon: type === 'success' ? 'check-circle' : 'exclamation-circle',
                        iconColor: type === 'success' ? 'text-green-500' : 'text-red-500',
                        timeout: 3000,
                    });
                });
            });
            </script>
            
            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6">
                {{ $this->table }}
            </div>
        </div>
    </section>
</div>