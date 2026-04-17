<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Divisi::create([
        'nama_divisi' => 'IT',
        'nama_pendamping' => 'Pak Asep'
    ]);

    Divisi::create([
        'nama_divisi' => 'Keuangan',
        'nama_pendamping' => 'Pak Roni'
    ]);

    Divisi::create([
        'nama_divisi' => 'Marketing',
        'nama_pendamping' => 'Pak Asdan'
    ]);

     Divisi::create([
        'nama_divisi' => 'Pendidikan',
        'nama_pendamping' => 'Pak Arifin'
    ]);
    }
}
