<div>
    <x-shared-header activeMenu="home" />
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col gap-8">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Form Data Nagari</h2>
                    @livewire('public-nagari-form')
                </div>
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Form Data Jorong</h2>
                    @livewire('public-jorong-form')
                </div>
            </div>
        </div>
    </section>
</div>