<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $fillable = [
        'masa_pkl_id',
        'no_sertifikat',
        'tanggal_terbit',
        'kepala_kampus'
        'file_path'
    ];
    
    // Relasi ke Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    // Relasi ke Masa PKL
    public function masapkl()
    {
        return $this->belongsTo(MasaPkl::class);
    }
}