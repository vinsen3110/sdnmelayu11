@extends('layouts.frontend')

@section('content')

<div class="container py-5">
    <h2>{{ $berita->judul_berita }}</h2>
   @php
    try {
        $waktu = \Carbon\Carbon::parse($berita->tanggal . ' ' . $berita->jam);
    } catch (\Exception $e) {
        $waktu = null;
    }
@endphp

@if ($waktu)
    <p><small>{{ $waktu->format('d M Y, H:i') }}</small></p>
@endif
    <img src="{{ $berita->foto ? Storage::url($berita->foto) : asset('img/foto-tidak-ada.png') }}" alt="Foto Berita" class="img-fluid mb-4" />
    <p>{!! nl2br(e($berita->deskripsi)) !!}</p>
    <a href="{{ url('/beritasekolah') }}" class="btn btn-outline-primary mt-3 kembali-btn">
        <i class="bi bi-arrow-left"></i> Kembali ke Berita
    </a>
</div>

@endsection
