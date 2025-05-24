<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakLanjut extends Model
{
    protected $fillable = [
        'lapor_id',
        'petugas_id',
        'keterangan',
        'status',
        'tanggal',
    ];

    public function lapor()
    {
        return $this->belongsTo(Lapor::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
