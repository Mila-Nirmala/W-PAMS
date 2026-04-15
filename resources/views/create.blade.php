<x-app-layout>
    <div class="container my-5">
        {{-- ================= FORM DETAIL USER ================= --}}
         @if($type == 'detail-user')
        <h2 class="text-center mb-4">ISI DATA DETAIL USER</h2>

        <form action="{{ route('detail-user.store') }}" method="POST">
            @csrf

            <table class="table" style="background-color: #f8f9fa; border-radius:10px;">
                <tbody>

                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td>NIS</td>
                        <td><input type="text" name="nis" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td><input type="text" name="no_hp" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <td><textarea name="alamat" class="form-control" required></textarea></td>
                    </tr>


                    <tr>
                        <td>Sekolah</td>
                        <td>
                            <select name="sekolah_id" class="form-select" required>
                            <option value="">-- Pilih Sekolah --</option>
                            @foreach($sekolahs as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_sekolah }}</option>
                            @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Jurusan</td>
                        <td>
                            <select name="jurusan" class="form-select" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="RPL/PPLG">RPL/PPLG</option>
                                <option value="TKJT">TKJT</option>
                                <option value="MANAJEMEN PERKANTORAN">MANAJEMEN PERKANTORAN</option>
                                <option value="DKV">DKV</option>
                                 <option value="AKL">AKL</option>
                                <option value="TOI">TOI</option>
                                <option value="TBSM">TBSM</option>
                                <option value="PEMASARAN">PEMASARAN</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Nama Pembimbing</td>
                        <td><input type="text" name="nama_pembimbing" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td>No HP Pembimbing</td>
                        <td><input type="text" name="no_hp_pembimbing" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        {{-- ================= FORM MASA PKL ================= --}}
        @elseif($type == 'masa-pkl')
        <h2 class="text-center mb-4">ISI DATA MASA PKL</h2>
        <form action="{{ route('masa-pkl.store') }}" method="POST">
            @csrf

            <table class="table" style="background-color: #f8f9fa; border-radius:10px;">
                <tbody>
                     <tr>
                <td>Tanggal Mulai PKL</td>
                <td>
                    <input type="date" name="tgl_mulai" class="form-control" required>
                </td>
            </tr>
            <tr>
                <tr>
                <td>Tanggal Selesai PKL</td>
                <td>
                    <input type="date" name="tgl_selesai" class="form-control" required>
                </td>
            </tr>
            <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        {{-- ================= FORM PENDAFTARAN  ================= --}}
        @elseif($type == 'pendaftaran')
        <h2 class="text-center mb-4">ISI DATA PENDAFTARAN</h2>
        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <table class="table" style="background-color: #f8f9fa; border-radius:10px;">
                <tbody>
                     <tr>
                        <td>Sekolah</td>
                        <td>
                            <select name="sekolah_id" class="form-select" required>
                            <option value="">-- Pilih Sekolah --</option>
                            @foreach($sekolahs as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_sekolah }}</option>
                            @endforeach
                            </select>
                        </td>
                    </tr>
        
                <tr>
                <td>Tanggal Pendaftaran</td>
                <td>
                    <input type="date" name="tgl_pendaftaran" class="form-control" required>
                </td>
            </tr>

            <td>Jurusan</td>
                        <td>
                            <select name="jurusan" class="form-select" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="RPL/PPLG">RPL/PPLG</option>
                                <option value="TKJT">TKJT</option>
                                <option value="MANAJEMEN PERKANTORAN">MANAJEMEN PERKANTORAN</option>
                                <option value="DKV">DKV</option>
                                <option value="AKUNTANSI">AKL</option>
                                <option value="DKV">TOI</option>
                                <option value="DKV">TBSM</option>
                                <option value="DKV">PEMASARAN</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                <td>Surat Rekomendasi</td>
                <td>
                    <input type="file" name="surat_rekomendasi" class="form-control" required>
                </td>
            </tr>

            <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

         @endif
    </div>
</x-app-layout>

