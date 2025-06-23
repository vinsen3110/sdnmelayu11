@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">EKSTRAKULIKULER</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('homepage') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        <strong>Ekstrakulikuler</strong>
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
                <div class="card h-100 shadow-sm" role="button" data-bs-toggle="modal" data-bs-target="#modalEkskul{{ $item->id }}">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_ekskul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            <strong>Pembina:</strong> {{ $item->pembina }}
                        </p>
                    </div>
                </div>
            </div>

        <!-- Modal Ekstrakurikuler -->
            <div class="modal fade" id="modalEkskul{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 shadow-sm">
                        <div class="modal-header border-0 flex-column align-items-start pb-1">
                            <h5 class="modal-title mb-2" id="modalLabel{{ $item->id }}">{{ $item->nama_ekskul }}</h5>
                            <p class="mb-1"><strong>Pembina:</strong> {{ $item->pembina }}</p>
                            <p class="mb-0">
                                <strong>Hari & Waktu:</strong>
                                {{ $item->hari_kegiatan }},
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu_kegiatan)->format('H:i') }}
                            </p>
                            <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body pt-2 pb-3 text-center">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded" alt="{{ $item->nama_ekskul }}">
                            @endif
                        </div>
                        {{-- Deskripsi --}}
                        @if ($item->deskripsi)
                            <p class="mt-3 px-3 text-start text-muted" style="font-size: 0.95rem;">
                                {!! nl2br(e($item->deskripsi)) !!}
                            </p>
                        @endif
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
