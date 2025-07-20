<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasModelCache;

class Opd extends Model
{
    use HasModelCache;
    use HasFactory;


    protected $table = "opds";

    protected $fillable = [
        'nama',
    ];



    // Mutator - Mengubah data sebelum disimpan ke database
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    // Accessor - Mengubah data ketika diambil dari database
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }
}
