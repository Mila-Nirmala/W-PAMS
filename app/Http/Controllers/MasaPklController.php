<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasaPkl;
use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\Divisi;

class MasaPklController extends Controller
{
    public function create()
    {
        return view('create', ['type' => 'masa-pkl']);
    }

    public function store(Request $request)
{
    $request->validate([
        'tgl_mulai' => 'required|date',
        'tgl_selesai' => 'required|date'
    ]);

    MasaPkl::updateOrCreate(
        ['user_id' => auth()->id()],
        [
            'user_id' => auth()->id(),
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai
        ]
    );

    return redirect()->route('dashboard')
        ->with('success', 'Data masa PKL berhasil disimpan!');
}
}
