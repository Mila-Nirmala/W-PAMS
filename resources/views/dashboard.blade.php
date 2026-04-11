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
                        {{-- Konten admin nanti di sini --}}
                    @else
                       <div class="row g-4">

                                <div class="col-md-3">
                                    <!-- Card Detail User -->
                                    <div class="card text-white bg-primary">
                                        <div class="card-header text-center">
                                            <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">DETAIL USER</h5>
                                            <p class="card-text">Klik tombol di bawah untuk mengisi data Detail User</p>
                                            <a href="{{ route('detail-user.create') }}" class="btn btn-danger">Isi Detail User</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <!-- Card Sekolah -->
                                    <div class="card text-white bg-success">
                                        <div class="card-header text-center">
                                            <i class="bi bi-building" style="font-size: 2rem;"></i>
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">ASAL SEKOLAH</h5>
                                            <p class="card-text">Klik tombol di bawah untuk mengisi data Sekolah</p>
                                            <a href="{{ route('sekolah.create') }}" class="btn btn-danger">Isi Data Sekolah</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <!-- Card Masa PKL -->
                                    <div class="card text-white bg-secondary">
                                        <div class="card-header text-center">
                                            <i class="bi bi-briefcase-fill" style="font-size: 2rem;"></i>
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">MASA PKL</h5>
                                            <p class="card-text">Klik tombol di bawah untuk mengisi data Masa PKL</p>
                                            <a href="{{ route('masa-pkl.create') }}" class="btn btn-danger">Isi Data Masa PKL</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <!-- Card Pendaftaran -->
                                    <div class="card text-white bg-warning">
                                        <div class="card-header text-center">
                                            <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">PENDAFTARAN</h5>
                                            <p class="card-text">Klik tombol di bawah untuk Mendaftar</p>
                                            <a href="{{ route('pendaftaran.create') }}" class="btn btn-danger">Isi Pendaftaran</a>
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