<?php

namespace App\Models;

use App\Enums\LaporanStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Filament\Resources\LaporResource;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lapor extends Model
{
    use HasFactory;
    protected $dates = ['tgl_laporan'];
    //enum
    // protected $casts = [
    //     'status' =>  LaporanStatus::class,
    // ];
    protected $fillable = [
        'no_tiket',
        'tgl_laporan',
        'nama_pelapor',
        'opd_id',
        'jenis_laporan',
        'uraian_laporan',
        'file_laporan',
        'status_laporan',
        'keterangan_petugas',
    ];

    //untuk relationship perlu dituliskan
    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class);
    }


    public function getFileLaporanUrlAttribute()
    {
        return Storage::url($this->file_laporan);
    }
}
