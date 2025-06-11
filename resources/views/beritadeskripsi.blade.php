@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">BERITA</h1>
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
    <h2>{{ $berita->judul_berita }}</h2>
    <p><small>{{ $berita->created_at->format('d M Y H:i') }}</small></p>
    <img src="{{ $berita->foto ? Storage::url($berita->foto) : asset('img/foto-tidak-ada.png') }}" alt="Foto Berita" class="img-fluid mb-4" />
    <p>{!! nl2br(e($berita->deskripsi)) !!}</p>
    <a href="{{ url('/berita') }}" class="btn btn-primary mt-3">Kembali ke Berita</a>
</div>

@endsection
