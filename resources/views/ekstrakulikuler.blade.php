@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">EKSTRAKURIKULER</h1>
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
    <h2 class="mb-4">Daftar Ekstrakurikuler</h2>

    <div class="row">
        @forelse ($ekskul as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}"
                             class="card-img-top"
                             alt="{{ $item->nama_ekskul }}"
                             style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            <strong>Pembina:</strong> {{ $item->pembina }}
                        </p>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            <strong>Hari:</strong> {{ $item->hari_kegiatan }} <br>
                            <strong>Waktu:</strong> {{ \Carbon\Carbon::parse($item->waktu_kegiatan)->format('H:i') }}
                        </p>
                        <p class="card-text" style="font-size: 0.9rem;">
                            {{ Str::limit($item->deskripsi, 80) }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Belum ada data ekstrakurikuler.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection
