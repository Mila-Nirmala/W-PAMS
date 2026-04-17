<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'user_id',
        'sekolah_id',
        'tgl_pendaftaran',
        'status',
        'jurusan',
        'surat_rekomendasi',
        'divisi_id'
    ];

    // Relasi ke DetailUser
    public function detailuser()
    {
        return $this->belongsTo(DetailUser::class);
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Sekolah
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    // Relasi ke Masa PKL
    public function masapkl()
    {
        return $this->belongsTo(MasaPkl::class);
    }

    // Relasi ke Sertifikat
    public function sertifikat()
    {
        return $this->hasOne(Sertifikat::class);
    }

    // Relasi ke Nilai PKL
    public function nilaiPkl()
    {
        return $this->hasOne(NilaiPkl::class);
    }

    // Relasi ke Divisi
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}