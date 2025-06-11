@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">PRESTASI</h1>
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

<div class="container py-4">
    <h2 class="mb-4">Prestasi Siswa</h2>
    <div class="row g-3">
        @foreach ($prestasi as $item)
            <div class="col-md-4">
                <div class="card h-100" role="button" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id_prestasi }}">
                    <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}" 
                         class="card-img-top" alt="Thumbnail">
                    <div class="card-body p-3">

                        {{-- Nama Prestasi --}}
                        <h6 class="text-primary mb-1">{{ $item->nama_prestasi }}</h6>

                        {{-- Judul Prestasi --}}
                        <h5 class="card-title mb-2">{{ $item->judul_prestasi }}</h5>

                        {{-- Tanggal --}}
                        <div class="text-muted mb-2" style="font-size: 0.85rem;">
                            <i class="bi bi-calendar"></i> {{ $item->created_at->format('Y-m-d') }}
                        </div>

                        {{-- Nama Siswa --}}
                        <p class="mb-1" style="font-size: 0.9rem;"><strong>Nama Siswa:</strong> {{ $item->nama_siswa }}</p>

                        {{-- Peringkat dan Tingkat --}}
                        <p class="mb-2" style="font-size: 0.9rem;">Juara {{ $item->peringkat }} — Tingkat {{ ucfirst($item->tingkat) }}</p>

                        {{-- Deskripsi --}}
                        <p class="card-text" style="font-size: 0.9rem;">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                    </div>
                </div>
            </div>
                  <!-- Modal Hanya Foto Prestasi -->
                  <div class="modal fade" id="modal{{ $item->id_prestasi }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content text-center bg-white border-0">
                        <div class="modal-header border-0 d-flex flex-column align-items-start w-100">
    <div class="w-100 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 ms-2">{{ $item->nama_prestasi }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    {{-- Nama Siswa --}}
    <div class="ms-2 mt-1 text-muted" style="font-size: 0.9rem;">
        <strong>Nama Siswa:</strong> {{ $item->nama_siswa }}
    </div>

    {{-- Peringkat, Tingkat, Jenis --}}
    <div class="ms-2 mt-1" style="font-size: 0.9rem;">
        Juara {{ $item->peringkat }} — Tingkat {{ ucfirst($item->tingkat) }} — {{ ucfirst($item->jenis_prestasi) }}
    </div>

    {{-- Tahun --}}
    <div class="ms-2 mt-1 text-muted" style="font-size: 0.9rem;">
        <strong>Tahun:</strong> {{ $item->tahun }}
    </div>
</div>
 <div class="modal-body pt-2 pb-3 position-relative">

    <!-- Tanggal di atas kanan -->
    <div class="d-flex justify-content-end mb-2 pe-2" style="font-size: 0.85rem;">
        <div class="text-muted">
            <i class="bi bi-calendar"></i> {{ $item->created_at->format('Y-m-d') }}
        </div>
    </div>
    <!-- Foto Prestasi -->
<img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}"
     class="w-100 rounded"
     style="max-height: 500px; object-fit: cover;"
     alt="Foto Prestasi">

</div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $prestasi->links() }}
    </div>
</div>

@endsection
