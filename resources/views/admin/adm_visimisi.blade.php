@extends('layouts.admin')

@section('title', 'Manajemen Visi Misi')
@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar Visi Misi</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-plus me-2"></i>Tambah Visi Misi
    </button>
     <div class="table-responsive">
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
            @foreach($visimisi as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>
                    @if($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" width="80" alt="Foto">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                        <i class="fas fa-edit me-1"></i>Edit
                    </button>
                    <form action="{{ route('visimisi.destroy', $item->id) }}" method="POST" class="formHapus d-inline" data-id="{{ $item->id }}">
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
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formTambahVisiMisi" action="{{ route('visimisi.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Visi Misi</h5>
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

<!-- Modal Edit -->
@foreach ($visimisi as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit{{ $item->id }}" method="POST" action="{{ route('visimisi.update', $item->id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Visi Misi</h5>
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

<!-- Modal Konfirmasi Universal -->
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

@push('styles')
<style>
.clamp-deskripsi {
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Maksimal 2 baris */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    max-width: 300px; /* Sesuaikan lebar kolom */
}
</style>
@endpush

@push('scripts')
<script>
    let currentAction = null;
    let currentForm = null;

    const modalUniversal = new bootstrap.Modal(document.getElementById('modalKonfirmasiUniversal'));
    const modalTitle = document.getElementById('modalKonfirmasiTitle');
    const modalBody = document.getElementById('modalKonfirmasiBody');

    document.querySelectorAll('.btnUniversalTrigger').forEach(btn => {
        btn.addEventListener('click', function () {
            const actionType = this.getAttribute('data-modal');
            const id = this.getAttribute('data-id');

            if (actionType === 'tambah') {
                modalTitle.textContent = 'Konfirmasi Tambah';
                modalBody.textContent = 'Apakah Anda yakin ingin menyimpan data ini?';
                currentForm = document.getElementById('formTambahVisiMisi');
                currentAction = 'submit';
                bootstrap.Modal.getInstance(document.getElementById('modalTambah')).hide();

            } else if (actionType === 'edit') {
                modalTitle.textContent = 'Konfirmasi Edit';
                modalBody.textContent = 'Apakah Anda yakin ingin menyimpan perubahan ini?';
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

    document.getElementById('btnUniversalSubmit').addEventListener('click', function () {
        if (currentForm && currentAction === 'submit') {
            currentForm.submit();
        }
    });
</script>
@endpush
@endsection