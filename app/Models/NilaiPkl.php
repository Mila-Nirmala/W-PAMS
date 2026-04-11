<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiPkl extends Model
{
    protected $fillable = [
        'sertifikat_id',
        'disiplin',
        'kehadiran',
        'kinerja',
        'sikap',
        'kerjasama',
        'nilai_akhir',
        'grade'
    ];

    // Relasi ke Sertifikat
    public function sertifikat()
    {
        return $this->belongsTo(Sertifikat::class);
    }

    // Relasi ke Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}