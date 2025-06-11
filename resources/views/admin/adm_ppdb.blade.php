@extends('layouts.admin') <!-- Ganti jika pakai layout lain -->

@section('title', 'Manajemen PPDB')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manajemen PPDB</h2>

    {{-- Tombol Tambah --}}
    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#tambahEkskulModal">
        <i class="fas fa-plus me-2"></i>Tambah PPDB
    </button

    <!-- Tabel Data -->
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
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="foto" width="80">
                    @else
                        Tidak ada
                    @endif
                </td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                <button class="btn btn-primary btn-sm" onclick="editData({{ $item->id }})">Edit</button>
                <form action="{{ route('ppdb.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
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

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Data PPDB</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId">
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" id="editJudul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto (kosongkan jika tidak diganti)</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="editDeskripsi" class="form-control" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function editData(id) {
        fetch('/ppdb/' + id + '/edit')
            .then(res => res.json())
            .then(data => {
                document.getElementById('editId').value = data.id;
                document.getElementById('editJudul').value = data.judul;
                document.getElementById('editDeskripsi').value = data.deskripsi;

                const formEdit = document.getElementById('formEdit');
                formEdit.action = '/ppdb/' + data.id;

                new bootstrap.Modal(document.getElementById('modalEdit')).show();
            });
    }
</script>
@endsection
