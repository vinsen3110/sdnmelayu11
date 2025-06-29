@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5 header" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">BERITA</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('homepage') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        <strong>Berita</strong>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container py-5">
    <div class="row justify-content-center">
        @foreach ($berita as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex justify-content-center">
                <div class="card h-100 shadow-sm" style="width: 100%; max-width: 350px;">
                    <a href="{{ route('berita.show', $item->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}" 
                             class="card-img-top" alt="Thumbnail" style="height: 220px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul_berita }}</h5>
                            <p class="mb-0 text-muted" style="font-size: 0.9rem;">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }},
                                {{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $berita->links() }}
    </div>
</div>

@endsection
