<div>
    <x-shared-header activeMenu="bts" />
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 mb-4 gap-4">
                <h1 class="text-2xl text-center font-bold text-gray-800 dark:text-white">Data BTS</h1>
            </div>
            <div class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6">
                {{ $this->table }}
            </div>
        </div>
    </section>
</div>
