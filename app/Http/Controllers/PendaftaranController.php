<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Sekolah;
use App\Models\Divisi;
use App\Models\MasaPkl;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create()
    {
                $sekolahs = Sekolah::all();

            return view('create', [
                'type' => 'pendaftaran',
                'sekolahs' => $sekolahs
            ]);
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
            'status' => 'Menunggu',
        ]);

        return redirect()->route('pendaftaran.create')
            ->with('success', 'Pendaftaran berhasil dikirim!');
    }

        public function show($id)
{
    $pendaftaran = Pendaftaran::with([
        'user.detailUser',
        'sekolah',
    ])->findOrFail($id);

    $detailUser = $pendaftaran->user->detailUser;

    // 🔥 ambil masa PKL yang benar berdasarkan pendaftaran
   $masaPkl = MasaPkl::with('sertifikat')
    ->where('user_id', $pendaftaran->user_id)
    ->latest('id') // 🔥 pastikan ambil yang terbaru
    ->first();

    $divisis = Divisi::all();

    return view('pendaftaran.show', compact(
        'pendaftaran',
        'detailUser',
        'masaPkl',
        'divisis'
    ));
}

   public function terima($id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status = 'Diterima';
    $pendaftaran->save();

    // 🔥 BUAT MASA PKL OTOMATIS
    \App\Models\MasaPkl::create([
        'user_id' => $pendaftaran->user_id,
        'tgl_mulai' => now(),
        'tgl_selesai' => null
    ]);

    return redirect()->back();
}

    public function tolak($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status = 'Ditolak';
        $pendaftaran->save();

        return redirect()->back();
    }

    public function formDivisi($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $divisis = Divisi::all();

        return view('pendaftaran.divisi', compact('pendaftaran', 'divisis'));
    }

    public function setDivisi(Request $request, $id)
    {
        $request->validate([
            'divisi_id' => 'required|exists:divisis,id'
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->divisi_id = $request->divisi_id;
        $pendaftaran->save();

        return redirect()->route('pendaftaran.show', $id)
            ->with('success', 'Divisi berhasil dipilih');
    }
}
