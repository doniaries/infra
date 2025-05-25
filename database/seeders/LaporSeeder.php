<?php

namespace Database\Seeders;

use App\Models\Lapor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Laporan 1: Laporan Gangguan - Belum Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now(),
            'nama_pelapor' => 'Ahmad Fauzi',
            'opd_id' => 12, // Dinas Komunikasi dan Informatika
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Jaringan internet terputus sejak pukul 09.00 WIB. Seluruh komputer di kantor tidak dapat mengakses internet.',
            'status_laporan' => 'Belum Diproses',
        ]);

        // Laporan 2: Koordinasi Teknis - Sedang Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subDays(2),
            'nama_pelapor' => 'Siti Rahma',
            'opd_id' => 18, // Dinas Pendidikan dan Kebudayaan
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Membutuhkan bantuan teknis untuk instalasi jaringan LAN di ruang rapat baru.',
            'status_laporan' => 'Sedang Diproses',
        ]);

        // Laporan 3: Kenaikan Bandwidth - Selesai
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subDays(5),
            'nama_pelapor' => 'Budi Santoso',
            'opd_id' => 2, // BKAD
            'jenis_laporan' => 'Kenaikan Bandwidth',
            'uraian_laporan' => 'Pengajuan kenaikan bandwidth dari 10 Mbps menjadi 20 Mbps untuk mendukung implementasi sistem keuangan baru.',
            'status_laporan' => 'Selesai Diproses',
        ]);

        // Laporan 4: Laporan Gangguan - Selesai
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subDays(7),
            'nama_pelapor' => 'Dewi Lestari',
            'opd_id' => 9, // Dinas Kependudukan dan Pencatatan Sipil
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Server aplikasi e-KTP mengalami down sejak kemarin. Tidak dapat melakukan pelayanan pembuatan KTP elektronik.',
            'status_laporan' => 'Selesai Diproses',
        ]);
    }
}