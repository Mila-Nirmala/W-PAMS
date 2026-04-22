<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\MasaPkl;
use App\Models\Pendaftaran; // 🔥 jangan lupa ini

class SertifikatController extends Controller
{
    public function create($id)
    {
        $masaPkl = MasaPkl::findOrFail($id);

        // 🔥 ambil pendaftaran dari user
        $pendaftaran = Pendaftaran::where('user_id', $masaPkl->user_id)
            ->latest()
            ->first();

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

        // 🔥 ambil sertifikat lama (kalau ada)
        $sertifikat = Sertifikat::where('masa_pkl_id', $request->masa_pkl_id)->first();

        // 🔥 upload file
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path')->store('sertifikat', 'public');
        } else {
            $file = $sertifikat->file_path ?? null;
        }

        // 🔥 simpan / update
        Sertifikat::updateOrCreate(
            ['masa_pkl_id' => $request->masa_pkl_id],
            [
                'no_sertifikat' => 'SRT-' . date('YmdHis') . rand(100,999),
                'tanggal_terbit' => $request->tanggal_terbit,
                'kepala_kampus' => $request->kepala_kampus,
                'file_path' => $file
            ]
        );

        // 🔥 ambil pendaftaran (INI YANG TADI KURANG)
        $pendaftaran = Pendaftaran::where('user_id', $masaPkl->user_id)
            ->latest()
            ->first();

        // 🔥 kalau gak ada, jangan error
        if (!$pendaftaran) {
            return redirect()->back()->with('error', 'Pendaftaran tidak ditemukan');
        }

        // 🔥 redirect aman
        return redirect()->route('pendaftaran.show', $pendaftaran->id)
            ->with('success', 'Sertifikat berhasil disimpan');
    }
}