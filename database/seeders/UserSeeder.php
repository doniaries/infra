<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // Get Team Kominfo


            // Super Admin
            $superAdmin = User::create([
                'name' => 'DON BORLAND',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('@Iamsuperadmin'),
                // 'bidang_id' => $bidangTI->id,
                // 'jabatan_id' => $jabatanStaff->id,
                // 'is_active' => true,
            ]);
            $superAdmin->assignRole('super_admin');

            //     // Admin Kominfo
            //     $adminKominfo = User::create([
            //         'name' => 'Muharis',
            //         'email' => 'adminkominfo@gmail.com',
            //         'password' => bcrypt('password'),
            //         'bidang_id' => $bidangSekretariat->id,
            //         'jabatan_id' => $jabatanbendaharaPengelolaBarang->id,
            //         'nip' => '123453453535',
            //         'is_active' => true,
            //     ]);

            //     $adminKominfo->assignRole('admin_opd');
            //     $adminKominfo->teams()->attach($teamKominfo->id);

            //     // User Bidang TI
            //     $userBidangTI = User::create([
            //         'name' => 'User Bidang TI',
            //         'email' => 'userbidangti@gmail.com',
            //         'password' => bcrypt('password'),
            //         'bidang_id' => $bidangTI->id,
            //         'jabatan_id' => $jabatanStaff->id,
            //         'nip' => '12345634343',
            //         'is_active' => true,
            //     ]);

            //     $userKepalaDinas = User::create([
            //         'name' => 'DAVID RINALDO, SSTP',
            //         'email' => 'userkepaladinas@gmail.com',
            //         'password' => bcrypt('password'),
            //         'bidang_id' => $bidangSekretariat->id,
            //         'jabatan_id' => $jabatanKadis->id,
            //         'nip' => '123424234324',
            //         'is_active' => true,
            //     ]);

            //     $userKepalaDinas->assignRole('user_bidang');
            //     $userKepalaDinas->teams()->attach($teamKominfo->id);

            //     $userBidangTI->assignRole('user_bidang');
            //     $userBidangTI->teams()->attach($teamKominfo->id);

            //     // User Bidang Sekretariat
            //     $userBidangSekretariat = User::create([
            //         'name' => 'User Bidang Sekretariat',
            //         'email' => 'userbidangsekretariat@gmail.com',
            //         'password' => bcrypt('password'),
            //         'bidang_id' => $bidangSekretariat->id,
            //         'jabatan_id' => $jabatanStaff->id,
            //         'is_active' => true,
            //     ]);
            //     $userBidangSekretariat->assignRole('user_bidang');
            //     $userBidangSekretariat->teams()->attach($teamKominfo->id);

            //     // Attach super admin ke semua team
            //     Team::all()->each(fn($team) => $superAdmin->teams()->attach($team->id));
        });
    }
}