<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailUser;
use App\Models\Sekolah;

class DetailUserController extends Controller
{
  public function create()
    {
        return view('create', ['type' => 'detail-user']);
    }

    public function store(Request $request)
    {
        $request->validate([
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
                'sekolah_id' => $request->sekolah_id,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'nama_pembimbing' => $request->nama_pembimbing,
                'no_hp_pembimbing' => $request->no_hp_pembimbing,
                'jenis_kelamin' => $request->jenis_kelamin
            ]
        );

        // Simpan ke database
    DetailUser::create($request->all());

    return redirect()->route('create')->with('success', 'Data berhasil disimpan!');
    }
        
    
}
