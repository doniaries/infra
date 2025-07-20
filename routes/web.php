<?php

use App\Livewire\Home;
use App\Livewire\ListBts;
use App\Livewire\ListLaporan;
use App\Livewire\ListNagari;
use App\Livewire\ListJorong;
use App\Livewire\PublicLaporForm;
use App\Livewire\PublicNagariForm;
use App\Livewire\PublicJorongForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/', Home::class);

Route::get('/lapor', PublicLaporForm::class)->name('public.laporform');
Route::get('/nagari', PublicNagariForm::class)->name('public.nagariform');
Route::get('/nagari/edit/{id}', PublicNagariForm::class)->name('public.nagariform.edit');
Route::get('/jorong', PublicJorongForm::class)->name('public.jorongform');
Route::get('/jorong/edit/{id}', PublicJorongForm::class)->name('public.jorongform.edit');

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// Daftarkan rute-rute penting sebelum fallback
Route::get('/bts-map-data', [\App\Http\Controllers\WelcomeMapController::class, 'index']);
Route::get('/peta-infrastruktur', [\App\Http\Controllers\WelcomeMapController::class, 'showMap'])->name('public.peta');
Route::get('/list-laporan', ListLaporan::class)->name('list.laporan');
Route::get('/list-bts', ListBts::class)->name('list.bts');
Route::get('/list-nagari', ListNagari::class)->name('list.nagari');
Route::get('/list-jorong', ListJorong::class)->name('list.jorong');


// Tangkap semua route yang tidak ditemukan (hanya satu fallback)
Route::fallback(function () {
    return redirect('/')->with('error', 'Halaman tidak ditemukan.');
});
