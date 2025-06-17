@extends('layouts.frontend')

@section('content')
<!-- Header -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3">Visi & Misi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Konten -->
<div class="container py-5">
    <div class="row">
        @foreach($visimisi as $item)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="Foto Visi Misi">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{!! Str::limit(strip_tags($item->deskripsi), 150) !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
