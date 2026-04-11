<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
        'tlp_sekolah'

    ];
    
    // Relasi ke Sekolah
     public function detailUsers()
    {
        return $this->hasMany(DetailUser::class);
    }

    // Relasi ke Pendaftaran
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}