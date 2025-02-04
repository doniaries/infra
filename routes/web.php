<?php

use App\Livewire\ListLaporan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', Listlaporan::class);

Route::get('/laporform.php', ListLaporan::class);
