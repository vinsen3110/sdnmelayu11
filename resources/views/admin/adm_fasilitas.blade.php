@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar Fasilitas</h2>

    <!-- Button Tambah -->
    <button style="margin-left:20px;" class="btn btn-primary mb-3" data-bs-toggle="modal"
        data-bs-target="#tambahEkskulModal">
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
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                   
                     <!-- Tombol Hapus -->
                            <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                             </td>
                </tr>

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
    <form method="POST" action="{{ route('fasilitas.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Fasilitas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
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
            <button type="submit" class="btn btn-primary">Tambah</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection
