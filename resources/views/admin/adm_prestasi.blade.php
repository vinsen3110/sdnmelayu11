@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar Prestasi</h2>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button Tambah -->
    <button style="margin-left:20px;" class="btn btn-primary mb-3" data-bs-toggle="modal"
        data-bs-target="#tambahModal">
        <i class="fas fa-plus me-2"></i>Tambah Prestasi
    </button>

    {{-- Form Search --}}
    <div class="mb-3 px-3">
        <form method="GET" action="{{ route('prestasi.index') }}" class="d-flex" style="max-width: 100%;">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari Prestasi..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">
                <i class="fas fa-search me-1"></i>Search
            </button>
        </form>
    </div>

    <!-- Tabel Prestasi -->
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Prestasi</th>
                <th>Peringkat</th>
                <th>Jenis</th>
                <th>Tingkat</th>
                <th>Tahun</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestasi as $item)
                <tr>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->nama_prestasi }}</td>
                    <td>{{ $item->peringkat }}</td>
                    <td>{{ $item->jenis_prestasi }}</td>
                    <td>{{ $item->tingkat }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</td>
                    <td>
                        @if ($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" alt="Foto" width="60">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                    </td>
                    <td>
                        <!-- Tombol Edit (warna biru dengan ikon) -->
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_prestasi }}">
                            <i class="fas fa-edit me-1"></i> Edit
                        </button>

                        <!-- Tombol Hapus (warna merah dengan ikon) -->
                        <form id="deleteForm{{ $item->id_prestasi }}" action="{{ route('prestasi.destroy', $item->id_prestasi) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger" onclick="showDeleteConfirmModal({{ $item->id_prestasi }})">
                            <i class="fas fa-trash-alt me-1"></i> Hapus
                        </button>
                        </form>

                    </td>
                </tr>

                <!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $item->id_prestasi }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id_prestasi }}" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editForm{{ $item->id_prestasi }}"
          method="POST"
          action="{{ route('prestasi.update', $item->id_prestasi) }}"
          enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Prestasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" value="{{ $item->nama_siswa }}" required>
          </div>

          <div class="mb-3">
            <label>Nama Prestasi</label>
            <input type="text" name="nama_prestasi" class="form-control" value="{{ $item->nama_prestasi }}" required>
          </div>

          <div class="mb-3">
            <label>Peringkat</label>
            <input type="text" name="peringkat" class="form-control" value="{{ $item->peringkat }}" required>
          </div>

          <div class="mb-3">
            <label>Jenis Prestasi</label>
            <select name="jenis_prestasi" class="form-control" required>
              <option value="">-- Pilih Jenis Prestasi --</option>
              <option value="akademik" {{ $item->jenis_prestasi == 'akademik' ? 'selected' : '' }}>Akademik</option>
              <option value="non akademik" {{ $item->jenis_prestasi == 'non akademik' ? 'selected' : '' }}>Non Akademik</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Tingkat</label>
            <input type="text" name="tingkat" class="form-control" value="{{ $item->tingkat }}" required>
          </div>

          <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ $item->tahun }}" required>
          </div>

          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $item->deskripsi }}</textarea>
          </div>

          <div class="mb-3">
            <label>Foto (boleh kosong)</label>
            <input type="file" name="foto" class="form-control">
            @if ($item->foto)
              <img src="{{ asset('storage/' . $item->foto) }}" width="60" class="mt-2">
            @endif
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="showConfirmModal(this.form)">Simpan</button>
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
    <form method="POST" action="{{ route('prestasi.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Prestasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa') }}" required>
          </div>

          <div class="mb-3">
            <label>Nama Prestasi</label>
            <input type="text" name="nama_prestasi" class="form-control" value="{{ old('nama_prestasi') }}" required>
          </div>

          <div class="mb-3">
            <label>Peringkat</label>
            <input type="text" name="peringkat" class="form-control" value="{{ old('peringkat') }}" required>
          </div>

          <div class="mb-3">
            <label>Jenis Prestasi</label>
            <select name="jenis_prestasi" class="form-control" required>
              <option value="">-- Pilih Jenis Prestasi --</option>
              <option value="akademik" {{ old('jenis_prestasi') == 'akademik' ? 'selected' : '' }}>Akademik</option>
              <option value="non akademik" {{ old('jenis_prestasi') == 'non akademik' ? 'selected' : '' }}>Non Akademik</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Tingkat</label>
            <input type="text" name="tingkat" class="form-control" value="{{ old('tingkat') }}" required>
          </div>

          <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
          </div>

          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
          </div>

          <div class="mb-3">
            <label>Foto (boleh kosong)</label>
            <input type="file" name="foto" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="showConfirmModal(this.form)">Tambah</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Konfirmasi Simpan/Edit -->
<div class="modal fade custom-slide-down" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Simpan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menyimpan data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="confirmSave">Yakin Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
       <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
<style>
@media (max-width: 576px) {
    td button {
        display: block;
        width: 100%;
        margin-bottom: 6px;
    }

    td .btn + .btn {
        margin-left: 0;
    }
}
</style>
@endpush

@push('scripts')
<script>
    let currentForm = null;

    function showConfirmModal(form) {
        currentForm = form;

        // ✅ Tutup modal edit saat ini sebelum buka konfirmasi
        const modalEdit = form.closest('.modal');
        const modalInstance = bootstrap.Modal.getInstance(modalEdit);
        if (modalInstance) {
            modalInstance.hide();
        }

        // ✅ Tampilkan modal konfirmasi
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show();
    }

    let deleteFormId = null;

    function showDeleteConfirmModal(id) {
        deleteFormId = `deleteForm${id}`;
        const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function () {
        // ✅ Aksi tombol konfirmasi HAPUS
        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            if (deleteFormId) {
                document.getElementById(deleteFormId).submit();
            }
        });

        // ✅ Aksi tombol konfirmasi SIMPAN (EDIT)
        document.getElementById('confirmSave').addEventListener('click', function () {
            if (currentForm) {
                currentForm.submit();
            }
        });
    });
</script>
@endpush


