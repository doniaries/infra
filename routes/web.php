<?php

use App\Livewire\ListLaporan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', Listlaporan::class);

Route::get('/laporform.php', ListLaporan::class);

// Route::get('/', function () {
//     return redirect('/admin/login');
// });

// Tangkap semua route yang tidak ditemukan
Route::fallback(function () {
    return redirect('/admin/login')->with('error', 'Akses ditolak! Silakan login terlebih dahulu.');
});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');