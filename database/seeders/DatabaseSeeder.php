<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            PeralatanSeeder::class,
            OperatorSeeder::class,
            KecamatanSeeder::class,
            ShieldSeeder::class, // Harus dijalankan sebelum RoleSeeder untuk membuat permission
            RoleSeeder::class,   // Menggunakan permission yang dibuat oleh ShieldSeeder
            UserSeeder::class,   // Membuat user dengan role yang telah dibuat
        ]);
    }
}