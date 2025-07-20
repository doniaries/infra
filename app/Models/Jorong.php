<?php

namespace App\Models;

use App\Models\Nagari;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Support\Facades\Cache;
use App\Traits\HasModelCache;

class Jorong extends Model
{
    use HasModelCache;
    protected $table = "jorongs";

    protected $fillable = [
        'nagari_id',
        'luas_jorong',
        'nama_jorong',
        'nama_kepala_jorong',
        'kontak_kepala_jorong',
        'jumlah_penduduk_jorong',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'luas_jorong' => 'integer',
        'jumlah_penduduk_jorong' => 'integer',
    ];

    public function nagari(): BelongsTo
    {
        return $this->belongsTo(Nagari::class);
    }

    // Mutator - Mengubah data sebelum disimpan ke database
    public function setNamaJorongAttribute($value)
    {
        $this->attributes['nama_jorong'] = strtoupper($value);
    }

    // Accessor - Mengubah data ketika diambil dari database
    public function getNamaJorongAttribute($value)
    {
        return strtoupper($value);
    }
}
