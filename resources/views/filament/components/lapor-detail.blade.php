<div class="space-y-4">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <h3 class="text-sm font-medium text-gray-500">No Tiket</h3>
            <p class="mt-1 text-sm text-gray-900">{{ $lapor->no_tiket }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500">Tanggal Laporan</h3>
            <p class="mt-1 text-sm text-gray-900">{{ $lapor->tgl_laporan->format('d M Y H:i') }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500">Nama Pelapor</h3>
            <p class="mt-1 text-sm text-gray-900">{{ $lapor->nama_pelapor }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500">OPD</h3>
            <p class="mt-1 text-sm text-gray-900">{{ $lapor->opd->nama }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500">Jenis Laporan</h3>
            <p class="mt-1 text-sm text-gray-900">{{ $lapor->jenis_laporan }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500">Status Laporan</h3>
            <p class="mt-1 text-sm text-gray-900">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $lapor->status_laporan === 'Belum Diproses' ? 'bg-red-100 text-red-800' : ($lapor->status_laporan === 'Sedang Diproses' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                    {{ $lapor->status_laporan }}
                </span>
            </p>
        </div>
    </div>
    
    <div>
        <h3 class="text-sm font-medium text-gray-500">Uraian Laporan</h3>
        <p class="mt-1 text-sm text-gray-900">{{ $lapor->uraian_laporan }}</p>
    </div>
    
    @if($lapor->file_laporan)
    <div>
        <h3 class="text-sm font-medium text-gray-500">File Laporan</h3>
        <a href="{{ Storage::url($lapor->file_laporan) }}" target="_blank" class="mt-1 text-sm text-blue-600 hover:text-blue-800">Lihat File</a>
    </div>
    @endif
</div>