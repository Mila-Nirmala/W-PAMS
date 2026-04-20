<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900">

<div class="container">

<div class="py-5">
<div class="max-w-4xl mx-auto">

<h4 class="text-center mb-4 fw-bold text-dark">
    Upload Sertifikat PKL
</h4>

<div class="container">

<!-- STATUS -->
@if(isset($sertifikat))
<div class="alert alert-success text-center fw-semibold">
    ✔ Sertifikat sudah diupload
</div>
@endif

<!-- WRAPPER -->
<div class="sertifikat-wrapper {{ isset($sertifikat) ? 'active' : '' }}">

<div class="card shadow-sm border-0 rounded-4">
<div class="card-body p-4">

<form action="{{ route('sertifikat.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input type="hidden" name="masa_pkl_id" value="{{ $masaPkl->id }}">

<div class="row g-3">

<!-- No Sertifikat -->
<div class="col-md-6">
<label class="form-label fw-semibold">No Sertifikat</label>
<input type="text" name="no_sertifikat" 
class="form-control {{ isset($sertifikat) ? 'border-success' : '' }}"
value="{{ old('no_sertifikat', $sertifikat->no_sertifikat ?? '') }}">
</div>

<!-- Tanggal -->
<div class="col-md-6">
<label class="form-label fw-semibold">Tanggal Terbit</label>
<input type="date" name="tanggal_terbit" 
class="form-control {{ isset($sertifikat) ? 'border-success' : '' }}"
value="{{ old('tanggal_terbit', $sertifikat->tanggal_terbit ?? '') }}">
</div>

<!-- Kepala Kampus -->
<div class="col-12">
<label class="form-label fw-semibold">Kepala Kampus</label>
<input type="text" name="kepala_kampus" 
class="form-control {{ isset($sertifikat) ? 'border-success' : '' }}"
value="{{ old('kepala_kampus', $sertifikat->kepala_kampus ?? '') }}">
</div>

<!-- File -->
<div class="col-12">
<label class="form-label fw-semibold">Upload File Sertifikat</label>
<input type="file" name="file_path" class="form-control">

@if(isset($sertifikat) && $sertifikat->file_path)
    <small class="text-success d-block mt-2">
        ✔ File sudah diupload - 
        <a href="{{ asset('storage/'.$sertifikat->file_path) }}" target="_blank">
            Lihat Sertifikat
        </a>
    </small>
@endif
</div>

<!-- BUTTON -->
<div class="col-12 text-center mt-4">

@if(isset($sertifikat))
    <button class="btn btn-success px-4 rounded-pill">
        ✔ Update Sertifikat
    </button>
@else
    <button class="btn btn-primary px-4 rounded-pill">
        Simpan Sertifikat
    </button>
@endif

<a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" 
class="btn btn-outline-secondary px-4 rounded-pill ms-2">
    Kembali
</a>

</div>

</div>

</form>

</div>
</div>

</div> <!-- wrapper -->
</div>

</div>
</div>

<style>
.sertifikat-wrapper {
    transition: all 0.3s ease;
    padding: 10px;
    border-radius: 16px;
}

.sertifikat-wrapper.active {
    border: 2px solid #198754;
    background: #f0fff4;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
</style>
</div>

</div>
</div>
</div>
</div>
</x-app-layout>