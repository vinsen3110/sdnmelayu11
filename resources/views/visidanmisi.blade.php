@extends('layouts.frontend')
@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">VISI DAN MISI</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('homepage') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        <strong>Visi & Misi</strong>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Konten Pengumuman PPDB -->
<div class="container">
    @foreach ($visimisi as $item)

<!-- Tombol Unduh Foto -->
<div class="row mb-2">
    <div class="col-md-12 d-flex justify-content-between">
        <div></div> <!-- Kolom kosong di kiri -->
        <a href="{{ Storage::url($item->foto) }}"
           class="btn btn-info text-white btn-sm"
           style="margin-right: 310px;"
           download>
           <i class="bi bi-download"></i> Unduh Foto
        </a>
    </div>
</div>


<!-- Gambar -->
<div class="text-center mb-4">
    <img src="{{ Storage::url($item->foto) }}"
         alt="{{ $item->judul }}"
         class="img-fluid rounded shadow"
         style="max-width: 500px;">
</div>


        <!-- Deskripsi -->
        <p>{!! nl2br(e($item->deskripsi)) !!}</p>

    @endforeach
</div>


@endsection