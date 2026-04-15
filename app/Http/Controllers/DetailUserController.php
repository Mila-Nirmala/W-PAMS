<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailUser;
use App\Models\Sekolah;

class DetailUserController extends Controller
{
  public function create()
    {
        $sekolahs = Sekolah::all();

        return view('create', [
            'type' => 'detail-user',
            'sekolahs' => $sekolahs
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nis' => 'required',
        'jurusan' => 'required',
        'sekolah_id' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'nama_pembimbing' => 'required',
        'no_hp_pembimbing' => 'required',
        'jenis_kelamin' => 'required'
    ]);

    DetailUser::updateOrCreate(
        ['user_id' => auth()->id()],
        [
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'sekolah_id' => $request->sekolah_id,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'nama_pembimbing' => $request->nama_pembimbing,
            'no_hp_pembimbing' => $request->no_hp_pembimbing,
            'jenis_kelamin' => $request->jenis_kelamin
        ]
    );

    return redirect()->route('dashboard')
        ->with('success', 'Data berhasil disimpan!');
}
        
    
}
