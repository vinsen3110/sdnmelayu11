@extends('layouts.frontend')
  @section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">PENGUMUMAN PPDB</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-white" href="#">SD NEGERI MELAYU 11 BANJARMASIN</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Visi Misi Image Start -->
<div class="container text-center mb-5">
    <div class="row justify-content-center">
         <div class="col-lg-6 col-md-8 wow fadeInUp d-flex justify-content-center" data-wow-delay="0.1s">
            <img src="{{ asset('ta/img/ppdb-1.jpg') }}" alt="" class="img-fluid rounded shadow"
                style="max-width: 500px;">
        </div>
    </div>
</div>
<!-- Visi Misi Image End -->

  @endsection