@extends('layouts.frontend')
@section('content')

<!-- Header -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-5 text-white animated slideInDown">DATA PENDIDIK & KEPENDIDIKAN</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><strong>Data PTK</strong></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container py-5">

    {{-- Kepala Sekolah (Baris Pertama) --}}
    @if (count($ptks) > 0)
        <div class="row justify-content-center mb-5">
            <div class="col-md-4 text-center">
                <div class="ptk-card">
                    <img src="{{ asset('storage/' . $ptks[0]->foto) }}" alt="{{ $ptks[0]->nama_ptk }}"
                        style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%; margin-bottom: 10px;">
                    <div class="ptk-info-text">
                        <h5 class="mb-1 text-white">{{ $ptks[0]->nama_ptk }}</h5>
                        <p class="mb-0 text-white">{{ $ptks[0]->jabatan }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Guru/Pegawai Lainnya --}}
    <div class="row justify-content-center">
        @foreach ($ptks->skip(1) as $ptk)
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-10 mb-4 d-flex justify-content-center">
                <div class="ptk-card text-center">
                    <img src="{{ asset('storage/' . $ptk->foto) }}" alt="{{ $ptk->nama_ptk }}"
                        style="width: 140px; height: 140px; object-fit: cover; border-radius: 50%; margin-bottom: 10px;">
                    <div class="ptk-info-text">
                        <h6 class="mb-1 text-white">{{ $ptk->nama_ptk }}</h6>
                        <p class="mb-0 text-white">{{ $ptk->jabatan }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection
