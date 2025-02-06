<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bts extends Model
{
    protected $table = 'bts';

    protected $fillable = [
        'operator_id',
        'nagari_id',
        'kecamatan_id',
        'lokasi',
        'latitude',
        'longitude',
        'teknologi',
        'status',
        'tahun_bangun',
        'pemilik',
    ];

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }

    public function nagari()
    {
        return $this->belongsTo(Nagari::class, 'nagari_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function jorong()
    {
        return $this->belongsTo(Jorong::class);
    }
}
