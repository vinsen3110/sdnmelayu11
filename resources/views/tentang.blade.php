@extends('layouts.frontend')
@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5 header">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">TENTANG KAMI</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('homepage') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        <strong>Tentang Kami</strong>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

        <div class="container py-4">
    @foreach ($tentangkami as $item)
        <!-- Judul -->
        <div class="row mb-3">
            <div class="col-12 text-center">
                <h3 class="mb-1">{{ $item->judul }}</h3>
            </div>
        </div>

        <!-- Gambar -->
        <div class="text-center mb-4">
            <img src="{{ Storage::url($item->foto) }}"
                 alt="{{ $item->judul }}"
                 class="img-fluid rounded shadow"
                 style="max-width: 900px;">
        </div>

        <!-- Deskripsi -->
        <p>{!! nl2br(e($item->deskripsi)) !!}</p>

            @endforeach
        </div>

@endsection