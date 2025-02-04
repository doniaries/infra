<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{

    protected $table = "kecamatans";


    protected $fillable = [
        'nama',
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function nagari()
    {
        return $this->hasMany(Nagari::class);
    }

    public function jorong()
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