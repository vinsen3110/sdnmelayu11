@extends('layouts.admin')

@section('title', 'Manajemen PPDB')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manajemen PPDB</h2>

    {{-- Tombol Tambah --}}
    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-plus me-2"></i>Tambah PPDB
    </button>

    {{-- Tabel --}}
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
                        <img src="{{ asset('storage/' . $item->foto) }}" width="80" alt="Foto">
                    @else
                        Tidak ada
                    @endif
                </td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                        Edit
                    </button>
                    <form action="{{ route('ppdb.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
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
        <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
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
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
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
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
