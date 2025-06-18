@extends('layouts.frontend')

@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
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
    <h2 class="mb-4">Semua Berita</h2>
    <div class="row">
        @foreach ($berita as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('berita.show', $item->id) }}" style="text-decoration: none; color: inherit;">
                        <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}" 
                             class="card-img-top" alt="Thumbnail">
                        <div class="card-body">
                                <h5 class="card-title">{{ $item->judul_berita }}</h5>
                            <p class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $item->created_at->format('d M Y, h:i A') }}
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
