@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">FASILITAS SEKOLAH</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('homepage') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        <strong>Fasilitas Sekolah</strong>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container py-5">
    {{-- Fasilitas Utama --}}
    <h2 class="mb-4">Fasilitas Utama</h2>
    <div class="row">
        @forelse ($utama as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm" role="button" data-bs-toggle="modal" data-bs-target="#modalUtama{{ $item->id }}">
                    @php $gambar = $item->foto1 ?? $item->foto2 ?? $item->foto3; @endphp
                    @if($gambar)
                        <img src="{{ asset('storage/' . $gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-text text-muted" style="font-size: 0.95rem;">Jumlah: {{ $item->jumlah }}</p>
                    </div>
                </div>
            </div>

            <!-- Modal Swiper -->
            <div class="modal fade" id="modalUtama{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content text-center bg-white border-0">
                        <div class="modal-header border-0 d-flex flex-column align-items-start w-100">
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 ms-2">{{ $item->nama }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="ms-2 mt-1 text-muted" style="font-size: 0.9rem;">Jumlah: {{ $item->jumlah }}</div>
                        </div>
                        <div class="modal-body pt-2 pb-3">
                            <div class="swiper fasilitasSwiper{{ $item->id }}">
                                <div class="swiper-wrapper">
                                    @foreach (['foto1', 'foto2', 'foto3'] as $foto)
                                        @if ($item->$foto)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $item->$foto) }}" class="d-block w-100 rounded" style="height: 400px; object-fit: cover;">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
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
            </div>
        @empty
            <p class="text-center">Belum ada fasilitas utama.</p>
        @endforelse
    </div>
</div>

<div class="container py-5">
    {{-- Fasilitas Pendukung --}}
    <h2 class="mb-4 mt-5">Fasilitas Pendukung</h2>
    <div class="row">
        @forelse ($pendukung as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm" role="button" data-bs-toggle="modal" data-bs-target="#modalPendukung{{ $item->id }}">
                    @php $gambar = $item->foto1 ?? $item->foto2 ?? $item->foto3; @endphp
                    @if($gambar)
                        <img src="{{ asset('storage/' . $gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-text text-muted" style="font-size: 0.95rem;">Jumlah: {{ $item->jumlah }}</p>
                    </div>
                </div>
            </div>

            <!-- Modal Swiper -->
            <div class="modal fade" id="modalPendukung{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content text-center bg-white border-0">
                        <div class="modal-header border-0 d-flex flex-column align-items-start w-100">
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 ms-2">{{ $item->nama }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="ms-2 mt-1 text-muted" style="font-size: 0.9rem;">Jumlah: {{ $item->jumlah }}</div>
                        </div>
                        <div class="modal-body pt-2 pb-3">
                            <div class="swiper fasilitasSwiper{{ $item->id }}">
                                <div class="swiper-wrapper">
                                    @foreach (['foto1', 'foto2', 'foto3'] as $foto)
                                        @if ($item->$foto)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $item->$foto) }}" class="d-block w-100 rounded" style="height: 400px; object-fit: cover;">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
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
            </div>
        @empty
            <p class="text-center">Belum ada fasilitas pendukung.</p>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[id^="modalUtama"], [id^="modalPendukung"]').forEach(modal => {
            modal.addEventListener('shown.bs.modal', function () {
                const swiperEl = modal.querySelector('.swiper');
                if (swiperEl && !swiperEl.classList.contains('swiper-initialized')) {
                    new Swiper(swiperEl, {
                        loop: true,
                        spaceBetween: 10,
                        grabCursor: true,
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: swiperEl.querySelector('.swiper-pagination'),
                            clickable: true,
                        },
                    });
                }
            });
        });
    });
</script>
@endsection
