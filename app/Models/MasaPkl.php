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

    // ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // ke sertifikat (1 masa PKL = 1 sertifikat)
    public function sertifikat()
    {
        return $this->hasOne(Sertifikat::class, 'masa_pkl_id', 'id');
    }
}