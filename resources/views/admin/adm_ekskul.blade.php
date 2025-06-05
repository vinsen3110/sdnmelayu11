@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 ms-3">Daftar Ekskul</h2>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <button class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#tambahEkskulModal">
        <i class="fas fa-plus me-2"></i>Tambah Ekskul
    </button>

    {{-- Tabel Ekskul --}}
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
                            {{-- Tombol Edit --}}
                            <button class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#editEkskulModal{{ $item->id }}">
                                <i class="fas fa-edit me-1"></i> Edit
                            </button>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editEkskulModal{{ $item->id }}" tabindex="-1" aria-labelledby="editEkskulLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="formEditEkskul{{ $item->id }}" action="{{ route('ekskul.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
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
                                                        <small class="text-muted d-block mt-2">Foto saat ini:
                                                            <img src="{{ asset('storage/ekskul/' . $item->foto) }}" width="50">
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary btn-konfirmasi-edit" data-form-id="formEditEkskul{{ $item->id }}">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            {{-- Tombol Hapus --}}
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusEkskulModal{{ $item->id }}">
                                <i class="fas fa-trash me-1"></i> Hapus
                            </button>

                            {{-- Modal Konfirmasi Hapus --}}
                            <div class="modal fade" id="hapusEkskulModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusEkskulLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('ekskul.destroy', $item->id) }}" method="POST" class="modal-content">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusEkskulLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus ekskul <strong>{{ $item->nama_ekskul }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

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

{{-- Modal Tambah Ekskul --}}
<div class="modal fade" id="tambahEkskulModal" tabindex="-1" aria-labelledby="tambahEkskulLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formTambahEkskul" action="{{ route('ekskul.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="tambahEkskulLabel">Tambah Ekskul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <!-- Input fields seperti nama_ekskul, pembina, dll -->
                <div class="mb-3">
                    <label class="form-label">Nama Ekskul</label>
                    <input type="text" name="nama_ekskul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pembina</label>
                    <input type="text" name="pembina" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari Kegiatan</label>
                    <select name="hari_kegiatan" class="form-select" required>
                        <option value="">Pilih Hari</option>
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                            <option value="{{ $hari }}">{{ $hari }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Waktu Kegiatan</label>
                    <input type="time" name="waktu_kegiatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Ekskul</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnKonfirmasiUpload">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Simpan Ekskul -->
<div class="modal fade" id="konfirmasiSimpanModalEkskul" tabindex="-1" aria-labelledby="konfirmasiSimpanLabelEkskul" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiSimpanLabelEkskul">Konfirmasi Simpan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menyimpan data ekskul ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSubmitEkskul">Yakin Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Konfirmasi Edit Ekskul -->
<div class="modal fade" id="modalKonfirmasiEditEkskul" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasiEditLabel" aria-hidden="true">
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

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- TAMBAH EKSKUL ---
    const btnKonfirmasiUpload = document.getElementById('btnKonfirmasiUpload');
    const modalTambahEkskul = new bootstrap.Modal(document.getElementById('tambahEkskulModal'));
    const modalKonfirmasiTambah = new bootstrap.Modal(document.getElementById('konfirmasiSimpanModalEkskul'));
    const btnSubmitEkskul = document.getElementById('btnSubmitEkskul');
    const formTambahEkskul = document.getElementById('formTambahEkskul');

    btnKonfirmasiUpload?.addEventListener('click', () => {
        // Tutup modal input terlebih dahulu
        modalTambahEkskul.hide();

        // Tampilkan modal konfirmasi setelah delay
        setTimeout(() => {
            modalKonfirmasiTambah.show();
        }, 300);
    });

    btnSubmitEkskul?.addEventListener('click', () => {
        formTambahEkskul?.submit();
    });

    // --- EDIT EKSKUL ---
    const editButtons = document.querySelectorAll('.btn-konfirmasi-edit');
    const modalKonfirmasiEdit = new bootstrap.Modal(document.getElementById('modalKonfirmasiEditEkskul'));
    let formEditTarget = null;

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const formId = this.getAttribute('data-form-id');
            formEditTarget = document.getElementById(formId);
            modalKonfirmasiEdit.show(); // tampilkan modal konfirmasi edit
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
