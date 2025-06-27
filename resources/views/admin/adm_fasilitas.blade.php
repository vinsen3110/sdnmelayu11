@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar Fasilitas</h2>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button Tambah -->
    <button style="margin-left:20px;" class="btn btn-primary mb-3" data-bs-toggle="modal"
        data-bs-target="#tambahModal">
        <i class="fas fa-plus me-2"></i>Tambah Fasilitas
    </button>

   {{-- Form Search --}}
    <div class="mb-3 px-3">
        <form method="GET" action="{{ route('fasilitas') }}" class="d-flex" style="max-width: 100%;">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari fasilitas..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">
                <i class="fas fa-search me-1"></i>Search
            </button>
        </form>
    </div>

    <!-- Tabel Fasilitas -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($fasilitas as $item)
        <tr>
        <td>{{ $item->nama }}</td>
        <td>{{ ucfirst($item->kategori) }}</td>
        <td>{{ $item->jumlah }}</td>
        <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</td> 
        <td>
            @foreach (['foto1', 'foto2', 'foto3'] as $foto)
                @if ($item->$foto)
                    <img src="{{ Storage::url($item->$foto) }}" alt="Foto" width="60" class="me-1 mb-1 rounded">
                @endif
            @endforeach
                </td>
                <td>
                    <!-- Tombol Edit  -->
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>

                    <!-- Tombol Hapus -->
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusFasilitasModal{{ $item->id }}">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="hapusFasilitasModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusFasilitasLabel{{ $item->id }}" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered">
                            <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" class="modal-content">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusFasilitasLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin ingin menghapus fasilitas <strong>{{ $item->nama }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <form id="formEdit{{ $item->id }}" method="POST" action="{{ route('fasilitas.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Fasilitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="mb-3">
                                  <label>Nama</label>
                                  <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                              </div>
                              <div class="mb-3">
                                  <label>Kategori</label>
                                  <select name="kategori" class="form-control" required>
                                      <option value="utama" {{ $item->kategori == 'utama' ? 'selected' : '' }}>Utama</option>
                                      <option value="pendukung" {{ $item->kategori == 'pendukung' ? 'selected' : '' }}>Pendukung</option>
                                  </select>
                              </div>
                              <div class="mb-3">
                                  <label>Jumlah</label>
                                  <input type="number" name="jumlah" class="form-control" value="{{ $item->jumlah }}" required>
                              </div>
                              <div class="mb-3">
                                  <label>Foto 1</label>
                                  <input type="file" name="foto1" class="form-control">
                              </div>
                              <div class="mb-3">
                                  <label>Foto 2</label>
                                  <input type="file" name="foto2" class="form-control">
                              </div>
                              <div class="mb-3">
                                  <label>Foto 3</label>
                                  <input type="file" name="foto3" class="form-control">
                              </div>
                             <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" data-form-id="formEdit{{ $item->id }}">Simpan</button>
                           <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formTambahFasilitas" method="POST" action="{{ route('fasilitas.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahModalLabel">Tambah Fasilitas</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Isi Form -->
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
              <option value="utama">Utama</option>
              <option value="pendukung">Pendukung</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Foto 1</label>
            <input type="file" name="foto1" class="form-control">
          </div>
          <div class="mb-3">
            <label>Foto 2</label>
            <input type="file" name="foto2" class="form-control">
          </div>
          <div class="mb-3">
            <label>Foto 3</label>
            <input type="file" name="foto3" class="form-control">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
           <textarea name="deskripsi" class="form-control" id="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>
        </div>
        <div class="modal-footer">
          <!-- Tombol Konfirmasi -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" data-form-id="formTambahFasilitas">
             Tambah
        </button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Konfirmasi Simpan Umum -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Simpan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menyimpan data fasilitas ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnConfirmSimpan">Yakin Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let formToSubmit = null;
    let deleteUrl = null;

    // === Konfirmasi Simpan ===
    const simpanModal = document.getElementById('confirmModal');
    const btnSimpan = document.getElementById('btnConfirmSimpan');

    if (simpanModal) {
        simpanModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const formId = button.getAttribute('data-form-id');
            formToSubmit = document.getElementById(formId);
        });
    }

    btnSimpan?.addEventListener('click', function () {
        if (formToSubmit) {
            formToSubmit.submit();
        }
    });

    // === Konfirmasi Hapus ===
    window.showDeleteConfirm = function (url) {
        deleteUrl = url;
        const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        deleteModal.show();
    };

    const btnHapus = document.getElementById('confirmDeleteBtn');
    btnHapus?.addEventListener('click', function () {
        if (deleteUrl) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = deleteUrl;

            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = '{{ csrf_token() }}';

            const method = document.createElement('input');
            method.type = 'hidden';
            method.name = '_method';
            method.value = 'DELETE';

            form.appendChild(csrf);
            form.appendChild(method);
            document.body.appendChild(form);
            form.submit();
        }
    });
});
</script>
@endpush


