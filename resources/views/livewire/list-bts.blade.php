{{-- resources/views/livewire/list-bts.blade.php --}}
<div>
    <x-shared-header activeMenu="bts" />

    <div class="container px-4 py-8 mx-auto pt-120">
        {{-- lebar tabel --}}
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold hero-title">Data BTS</h1>
            </div>
            <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                {{ $this->table }}
            </div>
        </div>
    </div>




</div>
