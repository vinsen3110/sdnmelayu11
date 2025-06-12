@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar PTK</h2>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah -->
    <button style="margin-left:20px;" class="btn btn-primary mb-3" data-bs-toggle="modal"
        data-bs-target="#modalTambah">
        <i class="fas fa-plus me-2"></i>Tambah PTK
    </button>

    <!-- Tabel -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Pendidikan</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ptks as $ptk)
            <tr>
                <td>{{ $ptk->nama_ptk }}</td>
                <td>{{ $ptk->jabatan }}</td>
                <td>{{ $ptk->status_kepegawaian }}</td>
                <td>{{ $ptk->pendidikan_terakhir }}</td>
                <td>{{ $ptk->jenis_kelamin }}</td>
                <td>{{ $ptk->no_hp }}</td>
                <td>{{ $ptk->email }}</td>
                <td>
                    @if($ptk->foto)
                        <img src="{{ asset('storage/' . $ptk->foto) }}" width="50">
                    @else
                        -
                    @endif
                </td>
                <td>
                    
                    <!-- Tombol Edit -->
                    <button class="btn btn-warning" data-bs-toggle="modal" 
                     data-bs-target="#modalEdit{{ $ptk->id }}">Edit</button>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('ptk.destroy', $ptk->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')"
                            class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{ $ptk->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('ptk.update', $ptk->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit PTK</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>No TMT</label>
                                <input type="text" name="no_tmt" class="form-control" value="{{ $ptk->no_tmt }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Nama PTK</label>
                                <input type="text" name="nama_ptk" class="form-control" value="{{ $ptk->nama_ptk }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="{{ $ptk->jabatan }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Status Kepegawaian</label>
                                <select name="status_kepegawaian" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="ASN" {{ $ptk->status_kepegawaian == 'ASN' ? 'selected' : '' }}>ASN</option>
                                    <option value="P3K" {{ $ptk->status_kepegawaian == 'P3K' ? 'selected' : '' }}>P3K</option>
                                    <option value="Honorer" {{ $ptk->status_kepegawaian == 'Honorer' ? 'selected' : '' }}>Honorer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan_terakhir" class="form-control" value="{{ $ptk->pendidikan_terakhir }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ $ptk->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $ptk->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $ptk->no_hp }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $ptk->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Foto (opsional)</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('ptk.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah PTK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah -->
                <div class="mb-3">
                    <label>No TMT</label>
                    <input type="text" name="no_tmt" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama PTK</label>
                    <input type="text" name="nama_ptk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status Kepegawaian</label>
                    <select name="status_kepegawaian" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="ASN">ASN</option>
                        <option value="P3K">P3K</option>
                        <option value="Honorer">Honorer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Pendidikan Terakhir</label>
                    <input type="text" name="pendidikan_terakhir" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto (opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
