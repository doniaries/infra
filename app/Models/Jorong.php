<?php

namespace App\Models;

use App\Models\Nagari;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Support\Facades\Cache;

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

    // Static cache for frequently accessed Jorong by ID
    public static function getCachedById($id)
    {
        return Cache::rememberForever('jorong_' . $id, function () use ($id) {
            return self::find($id);
        });
    }
}