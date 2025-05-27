@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 style="margin-left:20px;" class="mb-4">Daftar Ekskul</h2>

    <!-- Notifikasi sukses -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah -->
    <button style="margin-left:20px;" class="btn btn-primary mb-3" data-bs-toggle="modal"
        data-bs-target="#tambahEkskulModal">
        <i class="fas fa-plus me-2"></i>Tambah Ekskul
    </button>

    <!-- Tabel Ekskul -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr class="text-secondary">
                    <th>Nama Ekskul</th>
                    <th>Pembina</th>
                    <th>Hari Kegiatan</th>
                    <th>Waktu</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ekskul as $item)
                    <tr>
                        <td>{{ $item->nama_ekskul }}</td>
                        <td>{{ $item->pembina }}</td>
                        <td>{{ $item->hari_kegiatan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->waktu_kegiatan)->format('H:i') }}</td>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('storage/ekskul/' . $item->foto) }}" alt="Foto" width="60" class="rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="#" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal"
                                data-bs-target="#editEkskulModal{{ $item->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Modal Edit (HARUS DI DALAM LOOP) -->
                            <div class="modal fade" id="editEkskulModal{{ $item->id }}" tabindex="-1" aria-labelledby="editEkskulLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('ekskul.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editEkskulLabel{{ $item->id }}">Edit Ekskul</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Ekskul</label>
                                                <input type="text" name="nama_ekskul" value="{{ $item->nama_ekskul }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pembina</label>
                                                <input type="text" name="pembina" value="{{ $item->pembina }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Hari Kegiatan</label>
                                                <select name="hari_kegiatan" class="form-select" required>
                                                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                                        <option value="{{ $hari }}" {{ $item->hari_kegiatan == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Waktu Kegiatan</label>
                                                <input type="time" name="waktu_kegiatan" value="{{ \Carbon\Carbon::parse($item->waktu_kegiatan)->format('H:i') }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $item->deskripsi }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Foto Ekskul (opsional)</label>
                                                <input type="file" name="foto" class="form-control" accept="image/*">
                                                @if($item->foto)
                                                    <small class="text-muted d-block mt-2">Foto saat ini: <img src="{{ asset('storage/ekskul/' . $item->foto) }}" width="50"></small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('ekskul.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada ekskul.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Ekskul -->
<div class="modal fade" id="tambahEkskulModal" tabindex="-1" aria-labelledby="tambahEkskulLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('ekskul.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="tambahEkskulLabel">Tambah Ekskul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namaEkskul" class="form-label">Nama Ekskul</label>
                    <input type="text" name="nama_ekskul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pembina" class="form-label">Pembina</label>
                    <input type="text" name="pembina" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="hariKegiatan" class="form-label">Hari Kegiatan</label>
                    <select name="hari_kegiatan" class="form-select" required>
                        <option value="">Pilih Hari</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="waktuKegiatan" class="form-label">Waktu Kegiatan</label>
                    <input type="time" name="waktu_kegiatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Ekskul</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Ekskul</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
