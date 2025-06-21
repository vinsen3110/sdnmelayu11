@extends('layouts.admin')

@section('content')

    <div class="container py-4">
        <h2 class="mb-4 ms-3">Daftar PTK</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-1"></i> Tambah PTK
        </button>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{-- Form Search --}}
        <div class="mb-3 px-3">
            <form method="GET" action="{{ route('ptk.index') }}" class="d-flex" style="max-width: 100%;">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari PTK..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search me-1"></i>Search
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Status Kepegawaian</th>
                        <th>Pendidikan</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>TMT</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ptks as $item)
                        <tr>
                            <td>{{ $item->nama_ptk }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->status_kepegawaian }}</td>
                            <td>{{ $item->pendidikan_terakhir }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_tmt }}</td>
                            <td>
                                <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}"
                                    alt="Foto PTK" width="70">
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit{{ $item->id }}">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </button>
                                <button class="btn btn-sm btn-danger"
                                    onclick="konfirmasiHapus('{{ route('ptk.destroy', $item->id) }}')">
                                    <i class="fas fa-trash-alt me-1"></i>Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="formTambah" method="POST" action="{{ route('ptk.store') }}" enctype="multipart/form-data"
                class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah PTK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3 px-3">
                    <div class="col-md-6">
                        <label>Nama PTK</label>
                        <input type="text" name="nama_ptk" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Status Kepegawaian</label>
                        <select name="status_kepegawaian" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="ASN">ASN</option>
                            <option value="P3K">P3K</option>
                            <option value="Honorer">Honorer</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email (Opsional)</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $item->email ?? '') }}" placeholder="Masukkan email (jika ada)">
                    </div>
                    <div class="col-md-6">
                        <label>TMT</label>
                        <input type="date" name="no_tmt" class="form-control">
                    </div>
                    <div class="col-12">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer px-3">
                    <button type="button" class="btn btn-primary btn-konfirmasi-simpan" data-form-id="formTambah"
                        data-bs-toggle="modal" data-bs-target="#modalKonfirmasi">Tambah</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    @foreach ($ptks as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <form id="formEdit{{ $item->id }}" method="POST" action="{{ route('ptk.update', $item->id) }}"
                    enctype="multipart/form-data" class="modal-content">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit PTK</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3 px-3">
                        <div class="col-md-6">
                            <label>Nama PTK</label>
                            <input type="text" name="nama_ptk" class="form-control" value="{{ $item->nama_ptk }}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ $item->jabatan }}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label>Status Kepegawaian</label>
                            <select name="status_kepegawaian" class="form-select" required>
                                <option value="ASN" {{ $item->status_kepegawaian == 'ASN' ? 'selected' : '' }}>ASN
                                </option>
                                <option value="P3K" {{ $item->status_kepegawaian == 'P3K' ? 'selected' : '' }}>P3K
                                </option>
                                <option value="Honorer" {{ $item->status_kepegawaian == 'Honorer' ? 'selected' : '' }}>
                                    Honorer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" class="form-control"
                                value="{{ $item->pendidikan_terakhir }}">
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select">
                                <option value="Laki-laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ $item->no_hp }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email (Opsional)</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $item->email ?? '') }}" placeholder="Masukkan email (jika ada)">
                        </div>
                        <div class="col-md-6">
                            <label>TMT</label>
                            <input type="date" name="no_tmt" class="form-control"
                                value="{{ \Carbon\Carbon::parse($item->no_tmt)->format('Y-m-d') }}">

                        </div>
                        <div class="col-12">
                            <label>Foto (kosongkan jika tidak diganti)</label>
                            <input type="file" name="foto" class="form-control">
                            @if ($item->foto)
                                <img src="{{ Storage::url($item->foto) }}" class="mt-2" width="80">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary btn-konfirmasi-edit"
                            data-form-id="formEdit{{ $item->id }}">
                            Simpan
                        </button>
            
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal Konfirmasi Edit -->
    <div class="modal fade" id="modalKonfirmasiEdit" tabindex="-1" role="dialog"
        aria-labelledby="modalKonfirmasiEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Simpan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menyimpan perubahan data ekskul ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btnKonfirmasiSubmitEdit">Yakin Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="modalKonfirmasi" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Simpan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menyimpan perubahan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btnSimpanKonfirmasi">Yakin Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formHapus" method="POST" action="" class="modal-content">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin menghapus data ini?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Konfirmasi Hapus
            window.konfirmasiHapus = function(url) {
                const formHapus = document.getElementById('formHapus');
                formHapus.action = url;
                const modalHapus = new bootstrap.Modal(document.getElementById('modalHapus'));
                modalHapus.show();
            };

            // Konfirmasi Simpan
            const btnKonfirmasiSimpan = document.querySelectorAll('.btn-konfirmasi-simpan');
            btnKonfirmasiSimpan.forEach(btn => {
                btn.addEventListener('click', function() {
                    const formId = this.getAttribute('data-form-id');
                    const form = document.getElementById(formId);
                    const modalKonfirmasi = new bootstrap.Modal(document.getElementById(
                        'modalKonfirmasi'));
                    modalKonfirmasi.show();

                    document.getElementById('btnSimpanKonfirmasi').onclick = function() {
                        form.submit();
                    };
                });
            });

            // Konfirmasi Editconst editButtons = document.querySelectorAll('.btn-konfirmasi-edit');
            const editButtons = document.querySelectorAll('.btn-konfirmasi-edit');
    const modalKonfirmasiEdit = new bootstrap.Modal(document.getElementById('modalKonfirmasiEdit'));
    let formEditTarget = null;

    editButtons.forEach(button => {
    button.addEventListener('click', function () {
        const formId = this.getAttribute('data-form-id');
        formEditTarget = document.getElementById(formId);

        // Tutup modal edit dulu
        const modalEdit = bootstrap.Modal.getInstance(formEditTarget.closest('.modal'));
        modalEdit.hide();

        // Tampilkan modal konfirmasi setelah delay agar animasi smooth
        setTimeout(() => {
            modalKonfirmasiEdit.show();
        }, 300);
    });
});


    document.getElementById('btnKonfirmasiSubmitEdit')?.addEventListener('click', () => {
        if (formEditTarget) {
            formEditTarget.submit();
        }
    });
});
    </script>
@endpush
