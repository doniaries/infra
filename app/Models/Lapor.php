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
use Filament\Notifications\Notification;

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
        'foto_laporan',
        'status_laporan',
        // Hapus 'keterangan_petugas' dari sini
    ];



    //untuk relationship perlu dituliskan
    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }

    public function tindakLanjuts()
    {
        return $this->hasMany(TindakLanjut::class);
    }


    public function getFileLaporanUrlAttribute()
    {
        return Storage::url($this->file_laporan);
    }

    protected static function booted()
    {
        static::updating(function ($lapor) {
            // Jika keterangan petugas diubah dan status masih Belum Diproses
            if ($lapor->isDirty('keterangan_petugas') && $lapor->getOriginal('status_laporan') === 'Belum Diproses') {
                $lapor->status_laporan = 'Sedang Diproses';
            }
        });
    }
}
