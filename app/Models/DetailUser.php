<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'nis',
        'jurusan',
        'sekolah_id',
        'no_hp',
        'alamat',
        'nama_pembimbing',
        'no_hp_pembimbing',
        'jenis_kelamin'

    ];

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
    
    // Relasi ke Pendaftaran
    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class);
    }
}