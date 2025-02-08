<?php

use App\Livewire\ListBts;
use App\Livewire\ListLaporan;
use App\Livewire\PublicLaporForm;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/lapor', PublicLaporForm::class)->name('public.laporform');

// Tangkap semua route yang tidak ditemukan
Route::fallback(function () {
    return redirect('/admin/login')->with('error', 'Akses ditolak! Silakan login terlebih dahulu.');
});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');


Route::get('/list-laporan', ListLaporan::class)->name('list.laporan');
Route::get('/list-bts', ListBts::class)->name('list.bts');
