<?php

use App\Livewire\Home;
use App\Livewire\ListBts;
use App\Livewire\ListJorong;
use App\Livewire\ListLaporan;
use App\Livewire\ListNagari;
use App\Livewire\PublicLaporForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/', Home::class);

Route::get('/lapor', PublicLaporForm::class)->name('public.laporform');

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// Daftarkan rute-rute penting sebelum fallback
Route::get('/bts-map-data', [\App\Http\Controllers\WelcomeMapController::class, 'index']);
Route::get('/list-laporan', ListLaporan::class)->name('list.laporan');
Route::get('/list-bts', ListBts::class)->name('list.bts');
Route::get('/list-nagari', ListNagari::class)->name('list.nagari');
Route::get('/list-jorong', ListJorong::class)->name('list.jorong');

// Tangkap semua route yang tidak ditemukan (hanya satu fallback)
Route::fallback(function () {
    return redirect('/')->with('error', 'Halaman tidak ditemukan.');
});
