<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::all();

        return view('dashboard', compact('pendaftaran'));
    }
}
