<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailUser;
use App\Models\MasaPkl;
use App\Models\Pendaftaran;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

    // 🔥 KALAU ADMIN
    if ($user->role == 'admin') {

        $pendaftaran = Pendaftaran::all();

        return view('dashboard', compact('pendaftaran'));
    }

    // 👤 KALAU USER
    $detailUser = DetailUser::where('user_id', $user->id)->first();
    $masaPkl = MasaPkl::where('user_id', $user->id)->first();
    $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();

    return view('dashboard', compact(
        'detailUser',
        'masaPkl',
        'pendaftaran'
    ));
    }
}