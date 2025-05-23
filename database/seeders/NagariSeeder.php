<?php

namespace Database\Seeders;

use App\Models\Nagari;
use Illuminate\Database\Seeder;

class NagariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nagaris = [
            ['id' => 1, 'kecamatan_id' => 3, 'nama' => 'Palangki'],
            ['id' => 2, 'kecamatan_id' => 3, 'nama' => 'Koto Baru'],
            ['id' => 3, 'kecamatan_id' => 3, 'nama' => 'Muaro Bodi'],
            ['id' => 4, 'kecamatan_id' => 3, 'nama' => 'Mundam Sakti'],
            ['id' => 5, 'kecamatan_id' => 3, 'nama' => 'Koto Tuo'],
            ['id' => 6, 'kecamatan_id' => 8, 'nama' => 'Sungai Lansek'],
            ['id' => 7, 'kecamatan_id' => 8, 'nama' => 'Kamang'],
            ['id' => 8, 'kecamatan_id' => 8, 'nama' => 'Muaro Takuang'],
            ['id' => 9, 'kecamatan_id' => 8, 'nama' => 'Aia Amo'],
            ['id' => 10, 'kecamatan_id' => 8, 'nama' => 'Sungai Batuang'],
            ['id' => 11, 'kecamatan_id' => 8, 'nama' => 'Kunangan Parit Rantang'],
            ['id' => 12, 'kecamatan_id' => 8, 'nama' => 'Tanjuang Kaliang'],
            ['id' => 13, 'kecamatan_id' => 8, 'nama' => 'Padang Tarok'],
            ['id' => 14, 'kecamatan_id' => 8, 'nama' => 'Siaur'],
            ['id' => 15, 'kecamatan_id' => 8, 'nama' => 'Lubuk Tarantang'],
            ['id' => 16, 'kecamatan_id' => 8, 'nama' => 'Maloro'],
            ['id' => 17, 'kecamatan_id' => 2, 'nama' => 'Limo Koto'],
            ['id' => 18, 'kecamatan_id' => 2, 'nama' => 'Palaluar'],
            ['id' => 19, 'kecamatan_id' => 2, 'nama' => 'Guguk'],
            ['id' => 20, 'kecamatan_id' => 2, 'nama' => 'Padang Laweh'],
            ['id' => 21, 'kecamatan_id' => 2, 'nama' => 'Tanjung'],
            ['id' => 22, 'kecamatan_id' => 2, 'nama' => 'Bukit Bual'],
            ['id' => 23, 'kecamatan_id' => 2, 'nama' => 'Padang Laweh Selatan'],
            ['id' => 24, 'kecamatan_id' => 2, 'nama' => 'Batu Manjulur'],
            ['id' => 25, 'kecamatan_id' => 2, 'nama' => 'Pamuatan'],
            ['id' => 26, 'kecamatan_id' => 2, 'nama' => 'Padang Sibusuk'],
            ['id' => 27, 'kecamatan_id' => 2, 'nama' => 'Desa Kampung Baru'],
            ['id' => 28, 'kecamatan_id' => 6, 'nama' => 'Lubuk Tarok'],
            ['id' => 29, 'kecamatan_id' => 6, 'nama' => 'Lalan'],
            ['id' => 30, 'kecamatan_id' => 6, 'nama' => 'Buluh Kasok'],
            ['id' => 31, 'kecamatan_id' => 6, 'nama' => 'Kampung Dalam'],
            ['id' => 32, 'kecamatan_id' => 6, 'nama' => 'Latang'],
            ['id' => 33, 'kecamatan_id' => 6, 'nama' => 'Silongo'],
            ['id' => 34, 'kecamatan_id' => 1, 'nama' => 'Muaro'],
            ['id' => 35, 'kecamatan_id' => 1, 'nama' => 'Kandang Baru'],
            ['id' => 36, 'kecamatan_id' => 1, 'nama' => 'Silokek'],
            ['id' => 37, 'kecamatan_id' => 1, 'nama' => 'Pematang Panjang'],
            ['id' => 38, 'kecamatan_id' => 1, 'nama' => 'Solok Ambah'],
            ['id' => 39, 'kecamatan_id' => 1, 'nama' => 'Paru'],
            ['id' => 40, 'kecamatan_id' => 1, 'nama' => 'Durian Gadang'],
            ['id' => 41, 'kecamatan_id' => 1, 'nama' => 'Aie Angek'],
            ['id' => 42, 'kecamatan_id' => 1, 'nama' => 'Sijunjung'],
            ['id' => 43, 'kecamatan_id' => 4, 'nama' => 'Silantai'],
            ['id' => 44, 'kecamatan_id' => 4, 'nama' => 'Sisawah'],
            ['id' => 45, 'kecamatan_id' => 4, 'nama' => 'Unggan'],
            ['id' => 46, 'kecamatan_id' => 4, 'nama' => 'Tanjung Bonai Aur'],
            ['id' => 47, 'kecamatan_id' => 4, 'nama' => 'Sumpur Kudus'],
            ['id' => 48, 'kecamatan_id' => 4, 'nama' => 'Tamparungo'],
            ['id' => 49, 'kecamatan_id' => 4, 'nama' => 'Kumanis'],
            ['id' => 50, 'kecamatan_id' => 4, 'nama' => 'Mangganti'],
            ['id' => 51, 'kecamatan_id' => 4, 'nama' => 'Sumpur Kudus Selatan'],
            ['id' => 52, 'kecamatan_id' => 4, 'nama' => 'Tanjung Labuh'],
            ['id' => 53, 'kecamatan_id' => 4, 'nama' => 'Tanjung Bonai Aur Selatan'],
            ['id' => 54, 'kecamatan_id' => 7, 'nama' => 'Timbulun'],
            ['id' => 55, 'kecamatan_id' => 7, 'nama' => 'Tanjung Gadang'],
            ['id' => 56, 'kecamatan_id' => 7, 'nama' => 'Taratak Baru'],
            ['id' => 57, 'kecamatan_id' => 7, 'nama' => 'Pulasan'],
            ['id' => 58, 'kecamatan_id' => 7, 'nama' => 'Langki'],
            ['id' => 59, 'kecamatan_id' => 7, 'nama' => 'Sibakur'],
            ['id' => 60, 'kecamatan_id' => 7, 'nama' => 'Tanjung Lolo'],
            ['id' => 61, 'kecamatan_id' => 7, 'nama' => 'Taratak Baru Utara'],
            ['id' => 62, 'kecamatan_id' => 7, 'nama' => 'Sinyamu'],
        ];

        foreach ($nagaris as $nagari) {
            Nagari::create($nagari);
        }
    }
}