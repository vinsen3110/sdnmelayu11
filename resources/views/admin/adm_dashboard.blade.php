@extends('layouts.admin')

@section('content')
<style>
  .card.card-stats.card-round {
    transition: all 0.2s ease-in-out;
  }

  .card.card-stats.card-round:hover {
    cursor: pointer;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    transform: scale(1.02);
  }
</style>

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">
                    Selamat datang di,<br>
                    SD Negeri Melayu 11 Banjarmasin
                </h6>
            </div>
        </div> <!-- Tutup d-flex -->

        <div class="row">
            @php
                $cards = [
                    ['title' => 'Berita', 'icon' => 'fas fa-newspaper', 'color' => 'icon-warning', 'value' => $jumlahBerita, 'route' => route('berita')],
                    ['title' => 'Ekskul', 'icon' => 'fas fa-users', 'color' => 'icon-primary', 'value' => $jumlahEkskul, 'route' => route('ekskul')],
                    ['title' => 'Fasilitas', 'icon' => 'fas fa-building', 'color' => 'icon-info', 'value' => $jumlahFasilitas, 'route' => route('fasilitas')],
                    ['title' => 'PPDB', 'icon' => 'fas fa-file-alt', 'color' => 'icon-danger', 'value' => $jumlahPpdb, 'route' => route('ppdb')],
                    ['title' => 'Prestasi', 'icon' => 'fas fa-trophy', 'color' => 'icon-success', 'value' => $jumlahPrestasi, 'route' => route('prestasi.index')],
                    ['title' => 'PTK', 'icon' => 'fas fa-chalkboard-teacher', 'color' => 'icon-secondary', 'value' => $jumlahPtk, 'route' => route('ptk.index')],
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="col-md-4 mb-4">
                    <a href="{{ $card['route'] }}" style="text-decoration: none">
                        <div class="card card-stats card-round">
                            <div class="card-body d-flex align-items-center">
                                <div class="col-icon me-3">
                                    <div class="icon-big text-center {{ $card['color'] }} bubble-shadow-small">
                                        <i class="{{ $card['icon'] }}"></i>
                                    </div>
                                </div>
                                <div class="col">
                                   <p class="card-category text-dark fw-bolder fs-5">{{ $card['title'] }}</p>
                                   <h4 class="card-title fw-bolder fs-4">{{ $card['value'] }}</h4>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div> <!-- Tutup page-inner -->
</div> <!-- Tutup container -->

@endsection
