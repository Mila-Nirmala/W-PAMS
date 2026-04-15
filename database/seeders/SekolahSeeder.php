<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('sekolahs')->insert([
            [
                'nama_sekolah' => 'SMKN 1 TASIKMALAYA',
                'alamat_sekolah' => 'Jl. Mancogeh No.26, Nagarasari, Kec. Cipedes, Kab. Tasikmalaya, Jawa Barat 46132',
                'tlp_sekolah' => '(0265) 331359'
            ],
            [
                'nama_sekolah' => 'SMKN 2 TASIKMALAYA',
                'alamat_sekolah' => 'Jl. Noenoeng Tisnasaputra No.2, Kahuripan, Kec. Tawang, Kab. Tasikmalaya, Jawa Barat 46115',
                'tlp_sekolah' => '(0265) 331839' 
            ],
            [
                'nama_sekolah' => 'SMKN 3 TASIKMALAYA',
                'alamat_sekolah' => 'Jl. Tamansari No.100, Mulyasari, Kec. Tamansari, Kab. Tasikmalaya, Jawa Barat 46196',
                'tlp_sekolah' => '(0265) 323943'
            ],
            [
                'nama_sekolah' => 'SMKN 4 TASIKMALAYA',
                'alamat_sekolah' => 'Jl. Depok, Sukamenak, Kec. Purbaratu, Kab. Tasikmalaya, Jawa Barat 46196',
                'tlp_sekolah' => '(0265) 312059'
            ],
            [
                'nama_sekolah' => 'SMK YAPSIPA',
                'alamat_sekolah' =>'Jl. Perintis Kemerdekaan No.18, Tugujaya, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46126',
                'tlp_sekolah' => '(0265) 333731'
            ],
            [
                'nama_sekolah' => 'SMK MITRABATIK',
                'alamat_sekolah' =>'Jl. R.E. Martadinata No.173, Panyingkiran, Kec. Cipedes, Kab. Tasikmalaya, Jawa Barat 46151',
                'tlp_sekolah' => '(0265) 332277'
            ],
            [
                'nama_sekolah' => 'SMK STM MANANGGA PRATAMA',
                'alamat_sekolah' =>'Jl. Bojong Tengah No.2 D, Cipedes, Kec. Cipedes, Kab. Tasikmalaya, Jawa Barat 46133',
                'tlp_sekolah' => '(0265) 338194'
            ],
            [
                'nama_sekolah' => 'SMK BINA LESTARI',
                'alamat_sekolah' =>'Jl. Cinehel No.18, Nagarasari, Kec. Cipedes, Kab. Tasikmalaya, Jawa Barat 46132',
                'tlp_sekolah' => '(0265) 333393'
            ],
            [
                'nama_sekolah' => 'SMK BHAKTI KENCANA',
                'alamat_sekolah' =>'Jl. Ir. H. Juanda No.2, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151',
                'tlp_sekolah' => '(0265) 342572'
            ],
            [
                'nama_sekolah' => 'SMK PUTERA BINA NUSANTARA',
                'alamat_sekolah' =>'Jl. Sukarindik No.63A, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151',
                'tlp_sekolah' => '0821-3010-1001'
            ],
            [
                'nama_sekolah' => 'SMK ANGKASA TASIKMALAYA',
                'alamat_sekolah' =>'Jl. Garuda No.26, Cikalang, Kec. Tawang, Kab. Tasikmalaya, Jawa Barat 46114',
                'tlp_sekolah' => '(0265) 334843'
            ],
            [
                'nama_sekolah' => 'SMK DUTA PRATAMA INDONESIA',
                'alamat_sekolah' =>'Jl. Garut-Tasikmalaya No.24, batas Cikunir, Jalan Galunggung, Cipawitra,, Mangkubumi, Cipawitra, Mangkubumi, Cipawitra, Tasikmalaya, Kab. Tasikmalaya, Jawa Barat 46181',
                'tlp_sekolah' => '(0265) 7540125'
            ],
            [
                'nama_sekolah' => 'SMK NU KOTA TASIKMALAYA',
                'alamat_sekolah' =>'Jl. Argasari No.31, Argasari, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46122',
                'tlp_sekolah' => '0822-1445-0808'
            ],
            [
                'nama_sekolah' => 'SMK YAYASAN ISLAM TASIKMALAYA',
                'alamat_sekolah' =>'Jl. H.Mamun Sodik No.50, Panglayungan, Kec. Cipedes, Kab. Tasikmalaya, Jawa Barat 46133',
                'tlp_sekolah' => '(0265) 337903'
            ],
            [
                'nama_sekolah' => 'SMK GALUNGGUNG',
                'alamat_sekolah' =>'Jl. KH. Lukmanul Hakim No.17, Tugujaya, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46126',
                'tlp_sekolah' => '(0265) 333776'
            ],
            [
                'nama_sekolah' => 'SMK AL-KHOERIYAH KOTA TASIKMALAYA',
                'alamat_sekolah' =>'Jl. KH. Khoer Affandi No.100, Ciherang, Kec. Cibeureum, Kab. Tasikmalaya, Jawa Barat 46196',
                'tlp_sekolah' => '(0265) 7521239'
            ],
            [
                'nama_sekolah' => 'SMK MANONJAYA',
                'alamat_sekolah' =>'Jl. Gn. Tj. No.KM.2, RW.5, Cibeber, Kec. Manonjaya, Kabupaten Tasikmalaya, Jawa Barat 46197',
                'tlp_sekolah' => '(0265) 381767'
            ],
            [
                'nama_sekolah' => 'SMK SUKAPURA KOTA TASIKMALAYA',
                'alamat_sekolah' =>'Jl. R.E. Martadinata No.272 D, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151',
                'tlp_sekolah' => '0812-2429-1395'
            ],
            [
                'nama_sekolah' => 'SMK YPC TASIKMALAYA',
                'alamat_sekolah' =>'Jl. Garut - Tasikmalaya, Cikunten, Kec. Singaparna, Kabupaten Tasikmalaya, Jawa Barat 46414',
                'tlp_sekolah' => '(0265) 546717'
            ]
            
        ]);
    }
}
