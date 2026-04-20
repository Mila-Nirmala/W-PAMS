<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\MasaPkl;

class SertifikatController extends Controller
{
    public function create($id)
    {
        $masaPkl = MasaPkl::findOrFail($id);

        // 🔥 ambil pendaftaran dari relasi
        $pendaftaran = $masaPkl->pendaftaran;

        // 🔥 ambil sertifikat kalau sudah ada
        $sertifikat = Sertifikat::where('masa_pkl_id', $id)->first();

        return view('pendaftaran.sertifikat', compact('masaPkl','pendaftaran','sertifikat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'masa_pkl_id' => 'required',
            'no_sertifikat' => 'required',
            'tanggal_terbit' => 'required',
            'kepala_kampus' => 'required',
            'file_path' => 'nullable|file|mimes:pdf,jpg,png|max:2048'
        ]);

        $masaPkl = MasaPkl::findOrFail($request->masa_pkl_id);

        // 🔥 cek apakah sudah ada sertifikat
        $sertifikat = Sertifikat::where('masa_pkl_id', $request->masa_pkl_id)->first();

        // 🔥 handle upload file
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path')->store('sertifikat', 'public');
        } else {
            $file = $sertifikat->file_path ?? null;
        }

        // 🔥 update atau create
        Sertifikat::updateOrCreate(
            ['masa_pkl_id' => $request->masa_pkl_id],
            [
                'no_sertifikat' => $request->no_sertifikat,
                'tanggal_terbit' => $request->tanggal_terbit,
                'kepala_kampus' => $request->kepala_kampus,
                'file_path' => $file
            ]
        );

        // 🔥 balik ke halaman detail
        return redirect()->route('pendaftaran.show', $masaPkl->pendaftaran_id)
            ->with('success', 'Sertifikat berhasil disimpan');
    }
}