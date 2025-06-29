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
    

    <div class="row justify-content-center">
        @forelse ($ekskul as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex justify-content-center">
                <div class="card h-100 shadow-sm" role="button" data-bs-toggle="modal" data-bs-target="#modalEks{{ $item->id }}" style="width: 100%; max-width: 350px;">
                    <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('img/foto-tidak-ada.png') }}"
                         class="card-img-top"
                         alt="{{ $item->nama_ekstrakurikuler }}"
                         style="height: 220px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $item->nama_ekstrakurikuler }}</h5>
                        <p class="card-text text-muted" style="font-size: 0.95rem;">Pembina: {{ $item->pembina }}</p>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalEks{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content text-start bg-white border-0">
                        <div class="modal-header border-0 d-flex flex-column align-items-start w-100">
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 ms-2">{{ $item->nama_ekstrakurikuler }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="ms-2 mt-1 text-muted" style="font-size: 0.9rem;">Pembina: {{ $item->pembina }}</div>
                        </div>
                        <div class="modal-body pt-2 pb-3">
                            <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('img/foto-tidak-ada.png') }}"
                                 class="w-100 rounded"
                                 style="height: 400px; object-fit: cover; margin-top: 10px;"
                                 alt="Foto Ekstrakurikuler">
                            @if ($item->deskripsi)
                                <p class="mt-3 px-3 text-muted" style="font-size: 0.95rem;">
                                    {!! nl2br(e($item->deskripsi)) !!}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada data ekstrakurikuler.</p>
        @endforelse
    </div>
</div>

@endsection
