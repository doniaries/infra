<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Jorong;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Facades\Cache;
use App\Traits\HasModelCache;

class Nagari extends Model
{
    use HasModelCache;
    protected $table = "nagaris";

    protected $fillable = [
        'kecamatan_id',
        'luas_nagari',
        'nama_nagari',
        'nama_wali_nagari',
        'alamat_kantor',
        'kontak_wali_nagari',
        'jumlah_penduduk',
        'jumlah_jorong',
        'latitude',
        'longitude',

    ];

    protected $casts = [
        'luas_nagari' => 'integer',
        'jumlah_penduduk' => 'integer',
        'jumlah_jorong' => 'integer',
    ];

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function jorongs(): HasMany
    {
        return $this->hasMany(Jorong::class);
    }

    // Mutator - Mengubah data sebelum disimpan ke database
    public function setNamaNagariAttribute($value)
    {
        $this->attributes['nama_nagari'] = strtoupper($value);
    }

    // Accessor - Mengubah data ketika diambil dari database
    public function getNamaNagariAttribute($value)
    {
        return strtoupper($value);
    }
}
