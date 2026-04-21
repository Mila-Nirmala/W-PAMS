<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900">

<div class="container">

    <h4 class="mb-2">Pilih Divisi</h4>
    <p class="text-muted mb-4">Tentukan divisi tempat siswa menjalani PKL</p>

    {{-- 🔥 INFO DIVISI YANG SUDAH DIPILIH --}}
    @if($pendaftaran->divisi)
        <div class="alert alert-success">
            Divisi saat ini: 
            <b>{{ $pendaftaran->divisi->nama_divisi }}</b> 
            ({{ $pendaftaran->divisi->nama_pendamping }})
        </div>
    @endif

    <form action="{{ route('admin.pkl.setDivisi', $pendaftaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            @foreach($divisis as $divisi)
            <div class="col-md-4 mb-3">
                <label class="divisi-wrapper w-100">

                    {{-- 🔥 INI YANG BIKIN TETAP KEPILIH --}}
                    <input 
                        type="radio" 
                        name="divisi_id" 
                        value="{{ $divisi->id }}" 
                        hidden
                        {{ $pendaftaran->divisi_id == $divisi->id ? 'checked' : '' }}
                    >

                    <div class="card divisi-card text-center p-3">
                        <h5 class="fw-bold mb-1">{{ $divisi->nama_divisi }}</h5>
                        <p class="text-muted mb-0">{{ $divisi->nama_pendamping }}</p>
                    </div>

                </label>
            </div>
            @endforeach
        </div>

        <!-- BUTTON -->
<div class="col-12 text-center mt-4">

@if($pendaftaran->divisi_id)
    <button class="btn btn-success px-4 rounded-pill">
        ✔ Update Divisi
    </button>
@else
    <button class="btn btn-primary px-4 rounded-pill">
        Simpan Divisi
    </button>
@endif

<a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" 
class="btn btn-outline-secondary px-4 rounded-pill ms-2">
    Kembali
</a>

</div>

    </form>
</div>

<style>
.container {
    max-width: 900px;
}

.row {
    justify-content: center;
}

.divisi-card {
    border: 2px solid #ddd;
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #fafafa;
}

.divisi-card:hover {
    border-color: #198754;
    background: #f0fff4;
    transform: translateY(-5px);
}

.divisi-card:active {
    transform: scale(0.98);
}

.divisi-wrapper input[type="radio"]:checked + .divisi-card {
    border-color: #198754;
    background-color: #e9f7ef;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

h4 {
    font-weight: bold;
}
</style>

</div>
</div>
</div>
</div>
</div>
</x-app-layout>