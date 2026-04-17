<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(auth()->user()->role === 'admin')
                    <h4 class="mt-5 text-center fw-bold mb-5">Statistik Pendaftaran PKL</h4>
                    <div class="row mb-5">
                    <div class="col-md-3">
                    <div class="card shadow border-0">
                    <div class="card-body text-center">
                    <h6 class="text-muted">Total Pendaftar</h6>
                    <h3 class="fw-bold text-primary">{{ $pendaftaran->count() }}</h3>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="card shadow border-0">
                    <div class="card-body text-center">
                    <h6 class="text-muted">Menunggu</h6>
                    <h3 class="fw-bold text-warning">
                    {{ $pendaftaran->where('status','Menunggu')->count() }}
                    </h3>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="card shadow border-0">
                    <div class="card-body text-center">
                    <h6 class="text-muted">Diterima</h6>
                    <h3 class="fw-bold text-success">
                    {{ $pendaftaran->where('status','Diterima')->count() }}
                    </h3>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="card shadow border-0">
                    <div class="card-body text-center">
                    <h6 class="text-muted">Ditolak</h6>
                    <h3 class="fw-bold text-danger">
                    {{ $pendaftaran->where('status','Ditolak')->count() }}
                    </h3>
                    </div>
                    </div>
                    </div>

                    </div>
                    <h4 class="mb-4">
                    Data Pendaftar PKL 
                    <span class="badge bg-primary">{{ $pendaftaran->count() }}</span>
                    </h4>

                    <div class="card shadow">
                    <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                    <!-- Total -->
                    <div>
                    <strong>Total Pendaftar:</strong>
                    <span class="badge bg-success">{{ $pendaftaran->count() }}</span>
                    </div>

                    <!-- Search -->
                    <div style="width:250px;">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari sekolah...">
                    </div>

                    </div>

                    <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center table-sm" id="tablePendaftaran">

                    <thead class="table-dark">
                    <tr>
                    <th>No</th>
                    <th>Sekolah</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Surat Rekomendasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($pendaftaran as $p)

                    <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td class="text-start">
                    {{ $p->sekolah->nama_sekolah }}
                    </td>

                    <td>
                    {{ \Carbon\Carbon::parse($p->tgl_pendaftaran)->format('d-m-Y') }}
                    </td>

                    <td>
                    <a href="{{ asset('storage/surat_rekomendasi/'.$p->surat_rekomendasi) }}"
                    target="_blank"
                    class="btn btn-secondary btn-sm">
                    <i class="bi bi-file-earmark-text"></i> Lihat
                    </a>
                    </td>

                    <td>
                    @if($p->status == 'Menunggu')
                    <span class="btn btn-warning btn-sm px-3">Menunggu</span>
                    @elseif($p->status == 'Diterima')
                    <span class="btn btn-success btn-sm px-3">Diterima</span>
                    @else
                    <span class="btn btn-danger btn-sm px-3">Ditolak</span>
                    @endif
                    </td>

                    <td>
                    <div class="d-flex justify-content-center gap-2">

                    <a href="{{ route('pendaftaran.show',$p->id) }}" 
                    class="btn btn-primary btn-sm">
                    Detail
                    </a>

                    <a href="{{ route('pendaftaran.terima',$p->id) }}" 
                    class="btn btn-success btn-sm">
                    ✔
                    </a>

                    <a href="{{ route('pendaftaran.tolak',$p->id) }}" 
                    class="btn btn-danger btn-sm">
                    ✖
                    </a>

                    </div>
                    </td>

                    </tr>

                    @endforeach

                    <!-- Jika search tidak menemukan data -->
                    <tr id="noDataRow" style="display:none;">
                    <td colspan="6" class="text-center text-muted">
                    Data tidak ditemukan
                    </td>
                    </tr>

                    <script>

                    const searchInput = document.getElementById("searchInput");
                    const rows = document.querySelectorAll("#tablePendaftaran tbody tr:not(#noDataRow)");
                    const noDataRow = document.getElementById("noDataRow");

                    searchInput.addEventListener("keyup", function(){

                    let filter = this.value.toLowerCase();
                    let found = false;

                    rows.forEach(function(row){

                    let text = row.textContent.toLowerCase();

                    if(text.includes(filter)){
                    row.style.display = "";
                    found = true;
                    }else{
                    row.style.display = "none";
                    }

                    });

                    noDataRow.style.display = found ? "none" : "";

                    });

                    </script>

                    </tbody>

                    </table>
                    </div>
                    </div>
                    </div>

                    @else
                       <div class="row g-4">
                        <div class="row g-4">
                        <!-- Detail User -->
                        <div class="col-md-4">
                            <div class="card shadow border-light h-100">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="bi bi-person-circle text-primary" style="font-size:3rem;"></i>
                                    </div>
                                    <h5 class="fw-bold">Detail User</h5>
                                    <p class="text-muted">
                                        Lengkapi data diri sebelum melakukan pendaftaran PKL
                                    </p>
                                    <a href="{{ route('detail-user.create') }}" 
                                       class="btn {{ $detailUser ? 'btn-success' : 'btn-danger' }} w-100">
                                       {{ $detailUser ? '✔ Sudah Diisi' : 'Isi Detail User' }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Masa PKL -->
                        <div class="col-md-4">
                            <div class="card shadow border-light h-100">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="bi bi-briefcase-fill text-success" style="font-size:3rem;"></i>
                                    </div>
                                    <h5 class="fw-bold">Masa PKL</h5>
                                    <p class="text-muted">
                                        Tentukan tanggal mulai dan selesai kegiatan PKL
                                    </p>
                                    <a href="{{ route('masa-pkl.create') }}" 
                                       class="btn {{ $masaPkl ? 'btn-success' : 'btn-danger' }} w-100">
                                       {{ $masaPkl ? '✔ Sudah Diisi' : 'Isi Masa PKL' }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Pendaftaran -->
                        <div class="col-md-4">
                            <div class="card shadow border-light h-100">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="bi bi-file-earmark-text text-warning" style="font-size:3rem;"></i>
                                    </div>
                                    <h5 class="fw-bold">Pendaftaran</h5>
                                    <p class="text-muted">
                                        Setelah data lengkap, lakukan pendaftaran PKL
                                    </p>
                                    <a href="{{ route('pendaftaran.create') }}" 
                                       class="btn {{ $pendaftaran ? 'btn-success' : 'btn-danger' }} w-100">
                                       {{ $pendaftaran ? '✔ Sudah Daftar' : 'Daftar PKL' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-app-layout>