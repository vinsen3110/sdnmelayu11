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

    <!-- Tabel Fasilitas -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jumlah</th>
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
                    <td>
                        @foreach (['foto1', 'foto2', 'foto3'] as $foto)
                            @if ($item->$foto)
                                <img src="{{ asset('storage/' . $item->$foto) }}" alt="Foto" width="60" class="me-1 mb-1">
                            @endif
                        @endforeach
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
                        <div class="modal-dialog">
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
                    <form method="POST" action="{{ route('fasilitas.update', $item->id) }}" enctype="multipart/form-data">
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
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
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
        </div>
        <div class="modal-footer">
          <!-- Tombol Konfirmasi -->
          <button type="button" class="btn btn-primary" id="btnKonfirmasiSimpanFasilitas">Tambah</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Konfirmasi Simpan -->
<div class="modal fade" id="konfirmasiSimpanModal" tabindex="-1" aria-labelledby="konfirmasiSimpanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="konfirmasiSimpanLabel">Konfirmasi Simpan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menyimpan data fasilitas ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-konfirmasi-simpan">Yakin Simpan</button>
      </div>
    </div>
  </div>
</div>


@endsection

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const btnTriggerKonfirmasi = document.getElementById('btnKonfirmasiSimpanFasilitas');
    const btnSubmitForm = document.getElementById('btn-konfirmasi-simpan');
    const form = document.getElementById('formTambahFasilitas');

    if (btnTriggerKonfirmasi && btnSubmitForm && form) {
        btnTriggerKonfirmasi.addEventListener('click', function () {
            const modalKonfirmasi = new bootstrap.Modal(document.getElementById('konfirmasiSimpanModal'));
            modalKonfirmasi.show();
        });

        btnSubmitForm.addEventListener('click', function () {
            form.submit();
        });
    } else {
        console.warn('Element tidak ditemukan: Periksa ID tombol atau modal di Blade.');
    }
});
</script>
@endpush

