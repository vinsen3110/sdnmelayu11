@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">EKSTRAKULIKULER</h1>
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
    <div class="row">
        @forelse ($ekskul as $item)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 rounded-4 overflow-hidden" style="box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); transition: transform 0.2s;">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $item->nama_ekskul }}">
                    @endif
                    <div class="card-body p-3">
                        <h5 class="card-title mb-2" style="font-size: 1rem;">{{ $item->nama_ekskul }}</h5>
                        <p class="mb-1" style="font-size: 0.85rem;">
                            <strong>Pembina:</strong> {{ $item->pembina }}
                        </p>
                        <p class="mb-1" style="font-size: 0.85rem;">
                            <strong>Hari:</strong> {{ $item->hari_kegiatan }}<br>
                            <strong>Waktu:</strong> {{ \Carbon\Carbon::parse($item->waktu_kegiatan)->format('H:i') }}
                        </p>
                        <p class="card-text" style="font-size: 0.8rem;">
                            {{ Str::limit($item->deskripsi, 60) }}
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
