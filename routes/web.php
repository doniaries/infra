<?php

use App\Livewire\PublicLaporForm;
use App\Livewire\ListLaporan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporform', PublicLaporForm::class)->name('public.laporform');

// Tangkap semua route yang tidak ditemukan
Route::fallback(function () {
    return redirect('/admin/login')->with('error', 'Akses ditolak! Silakan login terlebih dahulu.');
});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');
