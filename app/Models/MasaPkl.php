<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasaPkl extends Model
{
    protected $fillable = [
        'user_id',
        'tgl_mulai',
        'tgl_selesai'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sertifikat()
    {
    return $this->hasOne(\App\Models\Sertifikat::class, 'masa_pkl_id');
    }

    public function pendaftaran()
    {
    return $this->belongsTo(\App\Models\Pendaftaran::class);
    }
}
