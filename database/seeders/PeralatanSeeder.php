<?php

namespace Database\Seeders;

use App\Models\Peralatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peralatan = [
            [
                'id' => 1,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB1100Dx4',
            ],
            [
                'id' => 2,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB2011UiAS-2HnD',
            ],
            [
                'id' => 3,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB951Ui-2HnD',
            ],

            [
                'id' => 4,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB4011iGS+',
            ],
            [
                'id' => 5,
                'jenis_peralatan' => 'Hub',
                'nama' => 'TP Link',
            ],
            [
                'id' => 6,
                'jenis_peralatan' => 'Hub',
                'nama' => 'Netis',
            ],
            [
                'id' => 7,
                'jenis_peralatan' => 'Akses Point',
                'nama' => 'Ruijie AP720L',
            ],
            [
                'id' => 8,
                'jenis_peralatan' => 'Akses Point',
                'nama' => 'Ruijie Outdor RG-EAP602',
            ],
            [
                'id' => 9,
                'jenis_peralatan' => 'Akses Point',
                'nama' => 'Unifie',

            ]
        ];

        foreach ($peralatan as $peralatan) {
            Peralatan::create($peralatan);
        }
    }
}
