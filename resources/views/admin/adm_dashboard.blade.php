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
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">
                   Selamat datang di,<br>
                   SD Negeri Melayu 11 Banjarmasin
                </h6>
              </div>
              
            </div>
           <div class="row">
    <div class="col-md-3">
        <a href="{{ route('ekskul') }}" style="text-decoration: none">
            <div class="card card-stats card-round">
                <div class="card-body d-flex align-items-center">
                    <div class="col-icon me-3">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col">
                        <p class="card-category">Ekskul</p>
                        <h4 class="card-title">{{ $jumlahEkskul }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('fasilitas') }}" style="text-decoration: none">
            <div class="card card-stats card-round">
                <div class="card-body d-flex align-items-center">
                    <div class="col-icon me-3">
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                    <div class="col">
                        <p class="card-category">Fasilitas</p>
                        <h4 class="card-title">{{ $jumlahFasilitas }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('prestasi.index') }}" style="text-decoration: none">
            <div class="card card-stats card-round">
                <div class="card-body d-flex align-items-center">
                    <div class="col-icon me-3">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fas fa-trophy"></i>
                        </div>
                    </div>
                    <div class="col">
                        <p class="card-category">Prestasi</p>
                        <h4 class="card-title">{{ $jumlahPrestasi }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('ptk.index') }}" style="text-decoration: none">
            <div class="card card-stats card-round">
                <div class="card-body d-flex align-items-center">
                    <div class="col-icon me-3">
                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                    <div class="col">
                        <p class="card-category">PTK</p>
                        <h4 class="card-title">{{ $jumlahPtk }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection