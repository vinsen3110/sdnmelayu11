@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Berita</h2>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Berita</button>

        <!-- Tabel Berita -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
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
                        <td>
                            <img class="card-img-top"
                                src="{{ $item->foto != null ? asset('storage/foto/' . $item->foto) : asset('img/foto-tidak-ada.png') }}"
                                alt="Card image cap" style="width: 100px; height: auto;" />
                        </td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                        <a class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $item->id }}">
                            Edit
                        </a>
                        <form action="{{ route('berita.hapus', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus berita ini?')">
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
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Judul Berita</label>
                            <input type="text" name="judul_berita" class="form-control" value="{{ old('judul_berita') }}"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Jam</label>
                                <input type="time" name="jam" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label>Foto</label>
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

    <!-- Modal Edit (dipisahkan dari tabel agar valid HTML) -->
    @foreach ($berita as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('berita.update', $item->id) }}" enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Jam</label>
                                    <input type="time" name="jam" class="form-control" value="{{ $item->jam }}"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tanggal</label>
                                    <input type="date" name="date" class="form-control" value="{{ $item->tanggal }}"
                                        required>
                                </div>
                                
                            </div>
                            <div class="mb-3">
                                <label>Foto (biarkan kosong jika tidak diganti)</label>
                                <input type="file" name="foto" class="form-control">
                                @if ($item->foto)
                                    <img src="{{ Storage::url($item->foto) }}" width="60" class="mt-2">
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
@endsection
