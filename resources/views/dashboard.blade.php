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
                         <h4 class="mb-3">Data Pendaftar PKL</h4>
                            <div class="card shadow">
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle text-center">
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
                            <span class="badge bg-success">Diterima</span>
                            @else
                            <span class="badge bg-danger">Ditolak</span>
                            @endif
                            </td>
                            <td>
                            <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('pendaftaran.show',$p->id) }}" 
                            class="btn btn-primary btn-sm px-3">
                            Detail
                            </a>

                            <a href="{{ route('pendaftaran.terima',$p->id) }}" 
                            class="btn btn-success btn-sm px-3">
                            ✔ Terima
                            </a>

                            <a href="{{ route('pendaftaran.tolak',$p->id) }}" 
                            class="btn btn-danger btn-sm px-3">
                            ✖ Tolak
                            </a>
                            </div>
                            </td>
                            </tr>
                            @endforeach
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
                                    class="btn btn-primary w-100">
                                    Isi Detail User
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
                                    class="btn btn-success w-100">
                                    Isi Masa PKL
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
                                    class="btn btn-warning w-100">
                                    Daftar PKL
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