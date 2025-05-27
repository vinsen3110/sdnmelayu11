@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar Prestasi</h2>


    <!-- Button Tambah -->
    <button style="margin-left:20px;" class="btn btn-primary mb-3" data-bs-toggle="modal"
        data-bs-target="#tambahEkskulModal">
        <i class="fas fa-plus me-2"></i>Tambah Prestasi
    </button>

    <!-- Tabel Prestasi -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Prestasi</th>
                <th>Peringkat</th>
                <th>Jenis</th>
                <th>Tingkat</th>
                <th>Tahun</th>
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
                    <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="60">
                        @endif
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_prestasi }}">Edit</button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('prestasi.destroy', $item->id_prestasi) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $item->id_prestasi }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id_prestasi }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <form method="POST" action="{{ route('prestasi.update', $item->id_prestasi) }}" enctype="multipart/form-data">
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
                                  <input type="text" name="jenis_prestasi" class="form-control" value="{{ $item->jenis_prestasi }}" required>
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
                                  <label>Foto (boleh kosong)</label>
                                  <input type="file" name="foto" class="form-control">
                                  @if ($item->foto)
                                      <img src="{{ asset('storage/' . $item->foto) }}" width="60" class="mt-2">
                                  @endif
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
                  <input type="text" name="nama_siswa" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Nama Prestasi</label>
                  <input type="text" name="nama_prestasi" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Peringkat</label>
                  <input type="text" name="peringkat" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Jenis Prestasi</label>
                  <input type="text" name="jenis_prestasi" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Tingkat</label>
                  <input type="text" name="tingkat" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Tahun</label>
                  <input type="number" name="tahun" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Foto (boleh kosong)</label>
                  <input type="file" name="foto" class="form-control">
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
