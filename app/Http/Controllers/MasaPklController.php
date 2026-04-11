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
            'pendaftaran_id' => 'required',
            'user_id' => 'required',
            'divisi_id' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date'
        ]);

        MasaPkl::create($request->all());

        return redirect()->route('masa-pkl.create')
            ->with('success', 'Masa PKL berhasil ditambahkan!');
    }
}
