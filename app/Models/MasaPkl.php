<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasaPkl extends Model
{
    protected $fillable = [
        'pendaftaran_id',
        'user_id',
        'divisi_id',
        'masa_pkl'

    ];

    // Relasi ke Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    // Relasi ke Detail User
    public function detailuser()
    {
        return $this->belongsTo(DetailUser::class);
    }

    // Relasi ke Divisi
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}