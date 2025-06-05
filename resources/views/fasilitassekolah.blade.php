@extends('layouts.frontend')
@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">FASILITAS SEKOLAH</h1>
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

<div class="container">

    {{-- Fasilitas Utama --}}
    <h2 class="text-start mb-4">Fasilitas Utama</h2>
    <div class="row">
        @forelse ($utama as $item)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-sm h-100 rounded-4 overflow-hidden">
                    @php
                        $gambar = $item->foto1 ?? $item->foto2 ?? $item->foto3;
                    @endphp
                    @if($gambar)
                        <img src="{{ asset('storage/' . $gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 160px; object-fit: cover; border-top-left-radius: 1.2rem; border-top-right-radius: 1.2rem;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-text">
                            <strong>Jumlah:</strong> {{ $item->jumlah }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada fasilitas utama.</p>
        @endforelse
    </div>

    {{-- Fasilitas Pendukung --}}
    <h2 class="text-start mt-5 mb-4">Fasilitas Pendukung</h2>
    <div class="row">
        @forelse ($pendukung as $item)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-sm h-100 rounded-4 overflow-hidden">
                    @php
                        $gambar = $item->foto1 ?? $item->foto2 ?? $item->foto3;
                    @endphp
                    @if($gambar)
                        <img src="{{ asset('storage/' . $gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 160px; object-fit: cover; border-top-left-radius: 1.2rem; border-top-right-radius: 1.2rem;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-text">
                            <strong>Jumlah:</strong> {{ $item->jumlah }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada fasilitas pendukung.</p>
        @endforelse
    </div>
</div>

@endsection
