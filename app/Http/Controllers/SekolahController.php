<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    // Tampil form tambah sekolah
    public function create()
    {
        $sekolahs = Sekolah::all();

        return view('create', [
            'type' => 'sekolah',
            'sekolahs' => $sekolahs
        ]);
    }

    // Simpan data sekolah baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string',
            'tlp_sekolah' => 'required|string|max:20',
        ]);

        // Simpan ke database
        Sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'tlp_sekolah' => $request->tlp_sekolah,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('sekolah.create')->with('success', 'Sekolah berhasil ditambahkan!');
    }
}