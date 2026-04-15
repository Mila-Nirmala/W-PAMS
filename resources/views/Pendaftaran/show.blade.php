<x-app-layout>

<x-slot name="header">
<h3 class="font-semibold text-xl text-gray-800 leading-tight">
Detail Pendaftar PKL
</h3>
</x-slot>

<div class="container mt-5">

<div class="row g-4">

    <!-- DATA SISWA -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">

            <div class="card-header bg-primary text-white fw-semibold">
                <i class="bi bi-person-fill me-2"></i> Data Siswa
            </div>

            <div class="card-body p-0">

                <table class="table table-hover mb-0">

                    <tr>
                        <th style="width:40%">Nama</th>
                        <td>{{ $detailUser->nama }}</td>
                    </tr>

                    <tr>
                        <th>NIS</th>
                        <td>{{ $detailUser->nis }}</td>
                    </tr>

                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $detailUser->jurusan }}</td>
                    </tr>

                    <tr>
                        <th>No HP</th>
                        <td>{{ $detailUser->no_hp }}</td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td>{{ $detailUser->alamat }}</td>
                    </tr>

                    <tr>
                        <th>Sekolah</th>
                        <td>{{ $detailUser->sekolah->nama_sekolah }}</td>
                    </tr>

                    <tr>
                        <th>Nama Pembimbing</th>
                        <td>{{ $detailUser->nama_pembimbing }}</td>
                    </tr>

                    <tr>
                        <th>No HP Pembimbing</th>
                        <td>{{ $detailUser->no_hp_pembimbing }}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>


    <!-- MASA PKL -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">

            <div class="card-header bg-success text-white fw-semibold">
                <i class="bi bi-calendar-event me-2"></i> Masa PKL
            </div>

            <div class="card-body p-0">

                <table class="table table-hover mb-0">

                    <tr>
                        <th style="width:50%">Tanggal Mulai</th>
                        <td>{{ $masaPkl->tgl_mulai }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Selesai</th>
                        <td>{{ $masaPkl->tgl_selesai }}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>

</div>

<div class="text-center mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary px-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

</div>

</x-app-layout>