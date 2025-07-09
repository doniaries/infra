<div>
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 mb-4 gap-4">
                <h1 class="text-2xl text-center font-bold text-gray-800 dark:text-white">Daftar Laporan Infrastruktur
                </h1>
                <a href="{{ route('public.laporform') }}"
                    class="inline-block px-5 py-2 rounded-md bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">+
                    Tambah Laporan</a>
            </div>
            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-blue-600 dark:bg-blue-800">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-white">No Tiket</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-white">Tgl Laporan</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-white">Nama OPD</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-white">Nama Pelapor</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-white">Uraian Laporan</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-white">Status Laporan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($laporans as $lapor)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $lapor->no_tiket }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $lapor->tgl_laporan }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $lapor->opd->nama ?? '-' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $lapor->nama_pelapor }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $lapor->uraian_laporan }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    <span
                                        class="inline-block px-2 py-1 rounded {{ $lapor->status_laporan == 'Belum Diproses' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $lapor->status_laporan }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">Belum
                                    ada data laporan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
</div>
</section>

</div>
