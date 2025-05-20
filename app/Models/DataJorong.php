<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataJorong extends Model
{
    protected $table = 'data_jorongs';

    protected $fillable = [
        'nagari_id',
        'jorong_id',
        'nama_kepala_jorong',
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

    // Relasi ke DataNagari
    public function dataNagari(): BelongsTo
    {
        return $this->belongsTo(DataNagari::class, 'nagari_id', 'id');
    }

    // Relasi ke Jorong
    public function jorong(): BelongsTo
    {
        return $this->belongsTo(Jorong::class);
    }

    // Eager loading default
    protected $with = ['dataNagari', 'jorong'];

    // Mutator untuk nama_kepala_jorong
    public function setNamaKepalaJorongAttribute($value)
    {
        $this->attributes['nama_kepala_jorong'] = strtoupper($value);
    }

    // Accessor untuk nama_kepala_jorong
    public function getNamaKepalaJorongAttribute($value)
    {
        return strtoupper($value);
    }
}
