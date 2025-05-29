@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Semua Berita</h2>
        <div class="row">
            @foreach ($berita as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}" 
                             class="card-img-top" alt="Thumbnail">
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Berita</span>
                            <p class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $item->created_at->format('Y-m-d H:i:s') }}
                            </p>
                            <h5 class="card-title">{{ $item->judul_berita }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $berita->links() }}
        </div>
    </div>
@endsection
