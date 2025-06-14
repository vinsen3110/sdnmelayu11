@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">PRESTASI SEKOLAH</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="#">SD NEGERI MELAYU 11 BANJARMASIN</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container py-5">
    <h2 class="mb-4">Prestasi Siswa</h2>

    <div class="row">
        @foreach ($prestasi as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm" role="button" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id_prestasi }}">
                <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}"
                     class="card-img-top"
                     alt="Foto Prestasi"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_prestasi }}</h5>
                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                        <i class="bi bi-calendar"></i> {{ $item->created_at->format('Y-m-d') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal{{ $item->id_prestasi }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content text-start bg-white border-0">
                    <div class="modal-header border-0 d-flex flex-column align-items-start w-100">
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 ms-2">{{ $item->nama_prestasi }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="ms-2 mt-2 text-muted" style="font-size: 0.95rem; line-height: 1.6;">
                            <div><strong>Nama Siswa:</strong> {{ $item->nama_siswa }}</div>
                            <div><strong>Peringkat:</strong> Juara {{ $item->peringkat }}</div>
                            <div><strong>Kategori:</strong> {{ $item->jenis_prestasi }}, {{ $item->tingkat }}, {{ $item->tahun }}</div>
                        </div>
                    </div>
                    <div class="modal-body pt-2 pb-3 position-relative">
                        <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}"
                             class="w-100 rounded"
                             style="max-height: 500px; object-fit: cover; margin-top: 10px;"
                             alt="Foto Prestasi">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $prestasi->links() }}
    </div>
</div>

@endsection
