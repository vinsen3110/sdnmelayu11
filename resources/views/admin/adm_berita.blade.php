@extends('layouts.admin')
@section('content')
<div class="container py-4">
<h2 class="mb-4 ms-3">Daftar Berita</h2>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal"
        data-bs-target="#tambahModal">
        <i class="fas fa-plus me-2"></i>Tambah Berita 
    </button>

    {{-- Form Search --}}
    <div class="mb-3 px-3">
        <form method="GET" action="{{ route('berita') }}" class="d-flex" style="max-width: 100%;">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari Berita..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">
                <i class="fas fa-search me-1"></i>Search
            </button>
        </form>
    </div>

    {{-- Tabel --}}
<div class="table-responsive">
  <table class="table table-bordered align-middle text-center">
      <thead class="table-light">
          <tr>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Jam</th>
              <th>Tanggal</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
         @foreach ($berita as $item)
              <tr>
                  <td>{{ $item->judul_berita }}</td>
                  <td class="text-start">{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 80) }}</td>
                  <td>
                      <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}"
                          alt="Foto Berita" class="img-fluid rounded" style="max-width: 100px;">
                  </td>
                  <td>{{ $item->jam }}</td>
                  <td>{{ $item->tanggal }}</td>
                  <td>
                      <button type="button" class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal"
                          data-bs-target="#editModal{{ $item->id }}">
                          <i class="fas fa-edit me-1"></i> Edit
                      </button>
                      <button type="button" class="btn btn-sm btn-danger" onclick="konfirmasiHapus('{{ route('berita.hapus', $item->id) }}')">
                          <i class="fas fa-trash-alt me-1"></i> Hapus
                      </button>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>


{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formTambah" method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul Berita</label>
                        <input type="text" name="judul_berita" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Jam</label>
                            <input type="time" name="jam" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" data-form-id="formTambah">Tambah</button>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
@foreach ($berita as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit{{ $item->id }}" method="POST" action="{{ route('berita.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul Berita</label>
                        <input type="text" name="judul_berita" class="form-control"
                               value="{{ $item->judul_berita }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required>{{ $item->deskripsi }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Jam</label>
                            <input type="time" name="jam" class="form-control"
                                   value="{{ $item->jam }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control"
                                   value="{{ $item->tanggal }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Foto (kosongkan jika tidak diganti)</label>
                        <input type="file" name="foto" class="form-control">
                        @if ($item->foto)
                            <img src="{{ Storage::url($item->foto) }}" width="100" class="mt-2">
                        @endif
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

<!-- Modal Konfirmasi Simpan -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Simpan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menyimpan data berita ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="btnConfirmSimpan">Yakin Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade modal-top" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
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
        <form id="formHapus" method="POST" action="">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
             Hapus
          </button>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@push('styles')
<style>
/* Modal hapus muncul dari atas */
.modal-top .modal-dialog {
    top: 10%;
    margin: 0 auto;
    position: absolute;
    transform: translateY(0%);
}

/* Responsive tombol aksi di HP */
@media (max-width: 576px) {
    td button {
        width: 100%;
        margin-bottom: 5px;
    }
}
</style>
@endpush

@endsection

@push('scripts')
<script>
    let formToSubmit = null;

    // === Untuk Modal Konfirmasi Simpan ===
    document.getElementById('confirmModal')?.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const formId = button.getAttribute('data-form-id');
        formToSubmit = document.getElementById(formId);
    });

    // Tombol submit konfirmasi simpan
    document.getElementById('btnConfirmSimpan')?.addEventListener('click', function () {
        if (formToSubmit) formToSubmit.submit();
    });

    // === Fungsi Konfirmasi Hapus ===
    function konfirmasiHapus(url) {
        const form = document.getElementById('formHapus');
        form.action = url; // set URL DELETE
        const hapusModal = new bootstrap.Modal(document.getElementById('hapusModal'));
        hapusModal.show();
    }
</script>
@endpush
