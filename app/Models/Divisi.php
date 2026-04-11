<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable = [
        'nama_divisi',
        'nama_pendamping'
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}