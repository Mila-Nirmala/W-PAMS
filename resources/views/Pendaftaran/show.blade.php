<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900">

<h4 class="mt-5 text-center fw-bold mb-5">Detail Pendaftar PKL</h4>
<div class="py-8">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="row g-4">

<!-- DATA SISWA -->
<div class="col-md-6">
<div class="card shadow border-0 h-100">

<div class="card-header bg-success text-white fw-semibold">
<i class="bi bi-person-fill me-2"></i> Data Siswa
</div>

<div class="card-body">

<table class="table table-sm table-hover">

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
<div class="card shadow border-0 h-100">

<div class="card-header bg-success text-white fw-semibold">
<i class="bi bi-calendar-event me-2"></i> Masa PKL
</div>

<div class="card-body">

<table class="table table-sm table-hover">

<tr>
<th style="width:50%">Tanggal Mulai</th>
<td>{{ $masaPkl->tgl_mulai }}</td>
</tr>

<tr>
<th>Tanggal Selesai</th>
<td>{{ $masaPkl->tgl_selesai }}</td>
</tr>

</table>

@if($pendaftaran->status == 'Diterima')

<!-- Card di bawah tanggal -->
<div class="row g-3 mt-2">

<!-- Card Divisi -->
<div class="col-md-6">
<div class="card shadow border-light h-100">
<div class="card-body text-center">

<div class="mb-2">
<i class="bi bi-diagram-3-fill text-warning" style="font-size:2.5rem;"></i>
</div>

<h6 class="fw-bold">Penempatan Divisi</h6>

<p class="text-muted small">
Tentukan divisi tempat siswa menjalani kegiatan PKL
</p>

<a href="{{ route('pendaftaran.divisi.form', $pendaftaran->id) }}" 
class="btn {{ $pendaftaran->divisi_id ? 'btn-success' : 'btn-danger' }} btn-sm w-100">

{{ $pendaftaran->divisi_id ? '✔ Divisi Dipilih' : 'Pilih Divisi' }}

</a>

</div>
</div>
</div>

<!-- Card Sertifikat -->
<div class="col-md-6">
<div class="card shadow border-light h-100">
<div class="card-body text-center">

<div class="mb-2">
<i class="bi bi-file-earmark-arrow-up text-info" style="font-size:2.5rem;"></i>
</div>

<h6 class="fw-bold">Upload Sertifikat</h6>

<p class="text-muted small">
Upload sertifikat PKL setelah siswa menyelesaikan kegiatan
</p>

<a href="{{ route('sertifikat.create', $masaPkl->id) }}" 
class="btn {{ $masaPkl->sertifikat ? 'btn-success' : 'btn-danger' }} btn-sm w-100">

{{ $masaPkl && $masaPkl->sertifikat ? '✔ Sertifikat Sudah Upload' : 'Upload Sertifikat' }}

</a>

</div>
</div>
</div>

</div> <!-- row -->

@endif



</div>
</div>

</div>
</div>
</div>
</div>

</x-app-layout>