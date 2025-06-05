@extends('layouts.frontend') {{-- Ganti jika layout kamu berbeda --}}

@section('content')
<div class="container my-4">
    <h2>Hasil Pencarian untuk: "{{ $query }}"</h2>

    {{-- Hasil dari Berita --}}
    <div class="mt-4">
        <h4>Berita</h4>
        @if($berita->isEmpty())
            <p>Tidak ada berita ditemukan.</p>
        @else
            <ul>
                @foreach($berita as $item)
                    <li><strong>{{ $item->judul_berita }}</strong><br>{{ Str::limit($item->deskrip, 100) }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Hasil dari Ekskul --}}
    <div class="mt-4">
        <h4>Ekstrakurikuler</h4>
        @if($ekskul->isEmpty())
            <p>Tidak ada ekskul ditemukan.</p>
        @else
            <ul>
                @foreach($ekskul as $item)
                    <li><strong>{{ $item->nama_ekskul }}</strong><br>{{ Str::limit($item->deskripsi, 100) }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Hasil dari Fasilitas --}}
    <div class="mt-4">
        <h4>Fasilitas</h4>
        @if($fasilitas->isEmpty())
            <p>Tidak ada fasilitas ditemukan.</p>
        @else
            <ul>
                @foreach($fasilitas as $item)
                    <li><strong>{{ $item->fasilitas }}</strong><br>{{ Str::limit($item->deskripsi, 100) }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Hasil dari Prestasi --}}
    <div class="mt-4">
        <h4>Prestasi</h4>
        @if($prestasi->isEmpty())
            <p>Tidak ada prestasi ditemukan.</p>
        @else
            <ul>
                @foreach($prestasi as $item)
                    <li><strong>{{ $item->nama_prestasi }}</strong><br>{{ Str::limit($item->keterangan, 100) }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
