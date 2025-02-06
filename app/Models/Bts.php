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

    // Accessor untuk location
    public function getLocationAttribute(): ?array
    {
        if ($this->latitude && $this->longitude) {
            return [
                'lat' => (float) $this->latitude,
                'lng' => (float) $this->longitude,
            ];
        }
        return null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->lokasi && $model->latitude && $model->longitude) {
                $model->lokasi = $model->latitude . ', ' . $model->longitude;
            }
        });
    }
}
