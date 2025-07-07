@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">EKSTRAKURIKULER</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('homepage') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        <strong>Ekstrakurikuler</strong>
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
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex justify-content-center">
                <div class="card h-100 shadow-sm" role="button" data-bs-toggle="modal" data-bs-target="#modalEkskul{{ $item->id }}">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_ekskul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            <strong>Jadwal :</strong> {{ $item->hari_kegiatan }},
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu_kegiatan)->format('H:i') }}
                        </p>
                    </div>
                </div>
            </div>

           <!-- Modal Ekstrakurikuler -->
            <div class="modal fade" id="modalEkskul{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 shadow-sm">
                        <div class="modal-header border-0 flex-column align-items-start pb-1">
                            <h2 class="modal-title fs-2 mb-2" id="modalLabel{{ $item->id }}">
                                Ekstrakurikuler {{ $item->nama_ekskul }}
                            </h2>
                            <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>

                        <div class="modal-body pt-0 pb-3">
                            @if ($item->foto)
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded mt-2" alt="{{ $item->nama_ekskul }}">
                                </div>
                            @endif

                            @if ($item->deskripsi)
                                <p class="mt-4 px-3 text-start text-muted" style="font-size: 0.95rem;">
                                    {!! nl2br(e($item->deskripsi)) !!}
                                </p>
                            @endif

                <!-- Informasi tambahan -->
                <div class="px-3 mt-4">
                    <p class="fw-semibold text-dark mb-2">
                        <i class="bi bi-info-circle-fill me-1 text-info"></i>
                        Informasi kegiatan ekskul:
                    </p>
                    <ul class="list-unstyled text-muted" style="font-size: 0.95rem;">
                        <li><strong>Jadwal:</strong> {{ $item->hari_kegiatan }},
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->waktu_kegiatan)->format('H:i') }}
                        </li>
                        <li><strong>Pembina:</strong> {{ $item->pembina ?? '-' }}</li>
                        <li><strong>Ruangan Kegiatan:</strong> {{ $item->ruangan ?? 'Belum ditentukan' }}</li>
                    </ul>
                </div>
            </div>
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
