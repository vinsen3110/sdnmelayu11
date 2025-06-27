@extends('layouts.frontend')
@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">STRUKTUR ORGANISASI</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('homepage') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        <strong>Struktur Organisasi</strong>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Konten Pengumuman PPDB -->
<div class="container">
    @foreach ($strukturorganisasi as $item)
        <!-- Judul & Tanggal -->
        <div class="row mb-2">
            <div class="col-md-12">
                <h3 class="mb-1">{{ $item->judul }}</h3>
            </div>
        </div>

        <!-- Tombol Unduh Foto -->
        <div class="mb-4 text-end px-3">
            <a href="{{ Storage::url($item->foto) }}"
            class="btn btn-info text-white btn-sm"
            download>
            <i class="bi bi-download"></i> Unduh Foto
            </a>
        </div>

         <!-- Gambar -->
        <div class="row justify-content-center mb-2">
            <div class="col-md-10 text-center px-3">
                <img src="{{ Storage::url($item->foto) }}"
                     alt="{{ $item->judul }}"
                     class="img-fluid rounded shadow"
                     style="max-width: 100%; height: auto;">
            </div>
        </div>

        <!-- Deskripsi -->
        <p>{!! nl2br(e($item->deskripsi)) !!}</p>

    @endforeach
</div>


@endsection