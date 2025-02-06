<?php

namespace App\Models;

use App\Models\Jorong;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function location(): Attribute
    {
        return Attribute::make(
            get: fn() => [
                'lat' => $this->latitude,
                'lng' => $this->longitude,
            ],
            set: fn($value) => [
                'latitude' => $value['lat'] ?? null,
                'longitude' => $value['lng'] ?? null,
            ],
        );
    }
}
