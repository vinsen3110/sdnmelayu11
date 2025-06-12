@extends('layouts.frontend')

@section('content')

<div class="container py-5">
    <h2>{{ $berita->judul_berita }}</h2>
    <p><small>{{ $berita->created_at->format('d M Y H:i') }}</small></p>
    <img src="{{ $berita->foto ? Storage::url($berita->foto) : asset('img/foto-tidak-ada.png') }}" alt="Foto Berita" class="img-fluid mb-4" />
    <p>{!! nl2br(e($berita->deskripsi)) !!}</p>
    <a href="{{ url('/beritasekolah') }}" class="btn btn-primary mt-3">Kembali ke Berita</a>
</div>

@endsection
