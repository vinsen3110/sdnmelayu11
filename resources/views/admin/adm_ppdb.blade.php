@extends('layouts.admin')

@section('title', 'Manajemen PPDB')
@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar PPDB</h2>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- Tombol Tambah --}}
    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-plus me-2"></i>Tambah PPDB
    </button>


   {{-- Tabel PPDB --}}
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
                {{-- Tombol Edit --}}
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                    <i class="fas fa-edit me-1"></i>Edit
                </button>

                {{-- Tombol Hapus --}}
                <form action="{{ route('ppdb.destroy', $item->id) }}" method="POST" class="formHapus d-inline" data-id="{{ $item->id }}">
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
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formTambahPPDB" action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data PPDB</h5>
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

{{-- Modal Edit (Per Item) --}}
@foreach ($data as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit{{ $item->id }}" method="POST" action="{{ route('ppdb.update', $item->id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Data PPDB</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required>{{ $item->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Foto (kosongkan jika tidak diganti)</label>
                    <input type="file" name="foto" class="form-control">
                    @if ($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" alt="Foto" width="100" class="mt-2">
                    @endif
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary btnUniversalTrigger" data-modal="edit" data-id="{{ $item->id }}">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- Modal Konfirmasi Umum -->
<div class="modal fade" id="modalKonfirmasiUniversal" tabindex="-1" aria-labelledby="konfirmasiUniversalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalKonfirmasiTitle">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="modalKonfirmasiBody">
        <!-- Isi konfirmasi diisi lewat JS -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnUniversalSubmit">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>


@push('scripts')
<script>
    let currentAction = null;
    let currentForm = null;

    // Modal instance
    const modalUniversal = new bootstrap.Modal(document.getElementById('modalKonfirmasiUniversal'));
    const modalTitle = document.getElementById('modalKonfirmasiTitle');
    const modalBody = document.getElementById('modalKonfirmasiBody');

    document.querySelectorAll('.btnUniversalTrigger').forEach(btn => {
        btn.addEventListener('click', function () {
            const actionType = this.getAttribute('data-modal');
            const id = this.getAttribute('data-id');

            if (actionType === 'tambah') {
                modalTitle.textContent = 'Konfirmasi Tambah';
                modalBody.textContent = 'Apakah Anda yakin ingin menyimpan data PPDB ini?';
                currentForm = document.getElementById('formTambahPPDB');
                currentAction = 'submit';
                bootstrap.Modal.getInstance(document.getElementById('modalTambah')).hide();

            } else if (actionType === 'edit') {
                modalTitle.textContent = 'Konfirmasi Edit';
                modalBody.textContent = 'Apakah Anda yakin ingin menyimpan perubahan data ini?';
                currentForm = document.getElementById('formEdit' + id);
                currentAction = 'submit';
                bootstrap.Modal.getInstance(document.getElementById('editModal' + id)).hide();

            } else if (actionType === 'hapus') {
                modalTitle.textContent = 'Konfirmasi Hapus';
                modalBody.textContent = 'Apakah Anda yakin ingin menghapus data ini?';
                currentForm = document.querySelector(`.formHapus[data-id="${id}"]`);
                currentAction = 'submit';
            }

            modalUniversal.show();
        });
    });

    // Tombol Lanjutkan (submit sesuai action)
    document.getElementById('btnUniversalSubmit').addEventListener('click', function () {
        if (currentForm && currentAction === 'submit') {
            currentForm.submit();
        }
    });

    // Tombol Batal: jika tambah/edit dibatalkan, kembalikan modal form
    document.querySelector('#modalKonfirmasiUniversal .btn-secondary').addEventListener('click', function () {
        if (!currentForm) return;

        const id = currentForm.getAttribute('id');
        if (id === 'formTambahPPDB') {
            new bootstrap.Modal(document.getElementById('modalTambah')).show();
        } else if (id && id.startsWith('formEdit')) {
            const editId = id.replace('formEdit', '');
            new bootstrap.Modal(document.getElementById('editModal' + editId)).show();
        }
    });
</script>
@endpush

@endsection
