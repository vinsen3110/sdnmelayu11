@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 ms-3">Daftar PTK</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-plus me-2"></i>Tambah PTK
    </button>

     {{-- Form Search --}}
    <div class="mb-3 px-3">
        <form method="GET" action="{{ route('ptk.index') }}" class="d-flex" style="max-width: 100%;">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari PTK..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">
                <i class="fas fa-search me-1"></i>Search
            </button>
        </form>
    </div>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No TMT</th>
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
                @foreach ($ptks as $ptk)
                <tr>
                    <td>{{ $ptk->no_tmt }}</td>
                    <td>{{ $ptk->nama_ptk }}</td>
                    <td>{{ $ptk->jabatan }}</td>
                    <td>{{ $ptk->status_kepegawaian }}</td>
                    <td>{{ $ptk->pendidikan_terakhir }}</td>
                    <td>{{ $ptk->jenis_kelamin }}</td>
                    <td>{{ $ptk->no_hp }}</td>
                    <td>{{ $ptk->email }}</td>
                    <td>
                        @if ($ptk->foto)
                            <img src="{{ asset('storage/' . $ptk->foto) }}" width="50">
                        @else
                            -
                        @endif
                   <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $ptk->id }}">
                        <i class="fas fa-edit me-1"></i>Edit
                    </button>

                    <!-- Tombol Hapus -->
                    <form method="POST" action="{{ route('ptk.destroy', $ptk->id) }}" class="d-inline formHapus">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btnTriggerHapus">
                            <i class="fas fa-trash-alt me-1"></i>Hapus
                        </button>
                    </form>
                </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit{{ $ptk->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" action="{{ route('ptk.update', $ptk->id) }}" enctype="multipart/form-data" class="modal-content formEdit">
                            @csrf @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit PTK</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Edit -->
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
                                        @foreach (['ASN', 'P3K', 'Honorer'] as $status)
                                            <option value="{{ $status }}" {{ $ptk->status_kepegawaian == $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Pendidikan Terakhir</label>
                                    <input type="text" name="pendidikan_terakhir" class="form-control" value="{{ $ptk->pendidikan_terakhir }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
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
                                <button type="button" class="btn btn-primary btnTriggerEdit">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('ptk.store') }}" enctype="multipart/form-data" class="modal-content" id="formTambah">
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
                <button type="button" class="btn btn-primary btnTriggerSimpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Konfirmasi</h5></div>
            <div class="modal-body">Apakah Anda yakin ingin melanjutkan?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" id="btnSubmitKonfirmasi">Ya</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let formToSubmit = null;

    document.querySelectorAll('.btnTriggerSimpan').forEach(btn => {
        btn.addEventListener('click', () => {
            formToSubmit = document.querySelector('#formTambah');
            new bootstrap.Modal(document.getElementById('modalKonfirmasi')).show();
        });
    });

    document.querySelectorAll('.btnTriggerEdit').forEach(btn => {
        btn.addEventListener('click', () => {
            formToSubmit = btn.closest('form');
            new bootstrap.Modal(document.getElementById('modalKonfirmasi')).show();
        });
    });

    document.querySelectorAll('.btnTriggerHapus').forEach(btn => {
        btn.addEventListener('click', () => {
            formToSubmit = btn.closest('form');
            new bootstrap.Modal(document.getElementById('modalKonfirmasi')).show();
        });
    });

    document.getElementById('btnSubmitKonfirmasi')?.addEventListener('click', () => {
        formToSubmit?.submit();
    });
</script>
@endpush
