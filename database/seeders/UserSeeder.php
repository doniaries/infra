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
            // Super Admin
            $superAdmin = User::create([
                'name' => 'DON BORLAND',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('@Iamsuperadmin'),
                // 'is_active' => true,
            ]);
            $superAdmin->assignRole('super_admin');
            
            // Admin IT
            $adminIT = User::create([
                'name' => 'Admin IT',
                'email' => 'adminit@gmail.com',
                'password' => bcrypt('@Adminit123'),
                // 'is_active' => true,
            ]);
            $adminIT->assignRole('adminit');
            
            // Pengguna
            $pengguna = User::create([
                'name' => 'Pengguna',
                'email' => 'pengguna@gmail.com',
                'password' => bcrypt('@Pengguna123'),
                // 'is_active' => true,
            ]);
            $pengguna->assignRole('pengguna');
        });
    }
}