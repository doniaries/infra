<?php

namespace App\Models;

use App\Models\Nagari;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jorong extends Model
{
    protected $table = "jorongs";

    protected $fillable = [
        'nagari_id',
        'nama',

    ];

    public function nagari(): BelongsTo
    {
        return $this->belongsTo(Nagari::class);
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
