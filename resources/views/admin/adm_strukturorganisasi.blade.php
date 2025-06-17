@extends('layouts.admin')

@section('title', 'Manajemen Struktur Organisasi')
@section('content')
<div class="container py-4">
    <h2 class="mb-4 ms-3">Struktur Organisasi</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-plus me-2"></i>Tambah Struktur
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Foto</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>
                    @if($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" width="80" alt="Foto">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                        <i class="fas fa-edit me-1"></i>Edit
                    </button>

                    <form action="{{ route('strukturorganisasi.destroy', $item->id) }}" method="POST" class="formHapus d-inline" data-id="{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger btnUniversalTrigger" data-modal="hapus" data-id="{{ $item->id }}">
                            <i class="fas fa-trash me-1"></i>Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form id="formTambahStruktur" action="{{ route('strukturorganisasi.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Struktur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btnUniversalTrigger" data-modal="tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
@foreach ($data as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form id="formEdit{{ $item->id }}" action="{{ route('strukturorganisasi.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Struktur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" value="{{ $item->judul }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto (kosongkan jika tidak diubah)</label>
                    <input type="file" name="foto" class="form-control">
                    @if ($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" width="100" class="mt-2">
                    @endif
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required>{{ $item->deskripsi }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnUniversalTrigger" data-modal="edit" data-id="{{ $item->id }}">Simpan</button>
                <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
@endforeach

{{-- Modal Konfirmasi Universal --}}
<div class="modal fade" id="modalKonfirmasiUniversal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKonfirmasiTitle">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalKonfirmasiBody"></div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnUniversalSubmit">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let currentForm = null;
    let currentAction = null;

    const modal = new bootstrap.Modal(document.getElementById('modalKonfirmasiUniversal'));

    document.querySelectorAll('.btnUniversalTrigger').forEach(btn => {
        btn.addEventListener('click', function () {
            const type = this.dataset.modal;
            const id = this.dataset.id;

            if (type === 'tambah') {
                document.getElementById('modalKonfirmasiTitle').textContent = 'Konfirmasi Tambah';
                document.getElementById('modalKonfirmasiBody').textContent = 'Apakah Anda yakin ingin menyimpan data ini?';
                currentForm = document.getElementById('formTambahStruktur');
                bootstrap.Modal.getInstance(document.getElementById('modalTambah')).hide();

            } else if (type === 'edit') {
                document.getElementById('modalKonfirmasiTitle').textContent = 'Konfirmasi Edit';
                document.getElementById('modalKonfirmasiBody').textContent = 'Apakah Anda yakin ingin menyimpan perubahan ini?';
                currentForm = document.getElementById('formEdit' + id);
                bootstrap.Modal.getInstance(document.getElementById('editModal' + id)).hide();

            } else if (type === 'hapus') {
                document.getElementById('modalKonfirmasiTitle').textContent = 'Konfirmasi Hapus';
                document.getElementById('modalKonfirmasiBody').textContent = 'Apakah Anda yakin ingin menghapus data ini?';
                currentForm = document.querySelector(`.formHapus[data-id="${id}"]`);
            }

            currentAction = 'submit';
            modal.show();
        });
    });

    document.getElementById('btnUniversalSubmit').addEventListener('click', function () {
        if (currentForm && currentAction === 'submit') {
            currentForm.submit();
        }
    });
</script>
@endpush

@endsection
