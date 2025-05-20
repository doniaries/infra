<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Jorong;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nagari extends Model
{
    protected $table = "nagaris";

    protected $fillable = [
        'nama',
        'kecamatan_id',

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
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = strtoupper($value);
    }

    // Accessor - Mengubah data ketika diambil dari database
    public function getNamaAttribute($value)
    {
        return strtoupper($value);
    }
}
