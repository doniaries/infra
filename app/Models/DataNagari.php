<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataNagari extends Model
{
    protected $table = 'data_nagaris';

    protected $fillable = [
        'kecamatan_id',
        'nagari_id',
        'nama_wali_nagari',
        'alamat',
        'kontak',
        'jumlah_penduduk',
        'jumlah_jorong',
        'mata_pencaharian',
        'penghasilan_rata_rata',
        'sarana_kesehatan',
        'sarana_pasar',
        'usia_produktif',
        'kegiatan_ekonomi',
    ];

    // Relasi ke Kecamatan
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    // Relasi ke Nagari
    public function nagari(): BelongsTo
    {
        return $this->belongsTo(Nagari::class);
    }

    // Relasi ke DataJorong
    public function dataJorongs(): HasMany
    {
        return $this->hasMany(DataJorong::class, 'nagari_id', 'id');
    }

    // Mutator untuk nama_wali_nagari
    public function setNamaWaliNagariAttribute($value)
    {
        $this->attributes['nama_wali_nagari'] = strtoupper($value);
    }

    // Accessor untuk nama_wali_nagari
    public function getNamaWaliNagariAttribute($value)
    {
        return strtoupper($value);
    }
}
