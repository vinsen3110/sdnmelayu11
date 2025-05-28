@extends('layouts.frontend')
@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Semua Berita</h2>
        <div class="row">
            @foreach ($berita as $item)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="course-item">
                        <img class="img-fluid"
                            src="{{ $item->foto != null ? asset('storage/app/'.$item->foto) : asset('img/foto-tidak-ada.png') }}"
                            alt="" />
                        <div class="course-content">
                            <h3>{{ $item->judul_berita}}</h3>
                           
                        </div>
                    </div>
                </div> <!-- End Course Item-->
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $berita->links() }}
        </div>
    </div>
@endsection
