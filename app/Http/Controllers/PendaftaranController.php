<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('create', ['type' => 'pendaftaran']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id' => 'required',
            'tgl_pendaftaran' => 'required|date',
            'jurusan' => 'required',
            'surat_rekomendasi' => 'required|file|mimes:pdf,jpg,png',
        ]);

        $file = $request->file('surat_rekomendasi');
        $namaFile = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('surat_rekomendasi', $namaFile, 'public');

        Pendaftaran::create([
            'user_id' => Auth::id(),
            'sekolah_id' => $request->sekolah_id,
            'tgl_pendaftaran' => $request->tgl_pendaftaran,
            'jurusan' => $request->jurusan,
            'surat_rekomendasi' => $namaFile,
            'status' => 'pending',
        ]);

        return redirect()->route('pendaftaran.create')
            ->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
