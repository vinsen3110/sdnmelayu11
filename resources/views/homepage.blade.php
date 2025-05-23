@extends('layouts.frontend')
@section('content')
    <!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative ">
        
        <!-- Slide 1 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid carousel-image" src="{{ asset('ta/img/kelas.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 113, 148, 0.438)">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-10 animated slideInDown">SELAMAT DATANG DI WEBSITE RESMI</h5>
                            <h1 class="display-3 text-white animated slideInDown">SDN Melayu 11 Banjarmasin</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid carousel-image" src="{{ asset('ta/img/ptk-2.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 113, 148, 0.438)">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">SELAMAT DATANG DI WEBSITE RESMI</h5>
                            <h1 class="display-3 text-white animated slideInDown">SDN Melayu 11 Banjarmasin</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 Baru -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid carousel-image" src="{{ asset('ta/img/homepage-1.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 113, 148, 0.438)">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">SELAMAT DATANG DI WEBSITE RESMI</h5>
                            <h1 class="display-3 text-white animated slideInDown">SDN Melayu 11 Banjarmasin</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <!-- Visi & Misi -->
            <div class="col-lg-3 col-sm-6 mb-4 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{ route('visimisi') }}" style="text-decoration: none; color: inherit;">
                    <div class="service-item text-center pt-3 h-100">
                        <div class="p-4">
                            <i class="fa fa-3x fa-bullseye text-primary mb-4"></i>
                            <h5 class="mb-3">Visi & Misi</h5>
                            <p>Langkah dan Tujuan sekolah untuk membentuk karakter siswa, berkompetensi global, mandiri, dan peduli sosial serta lingkungan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Struktur Organisasi -->
            <div class="col-lg-3 col-sm-6 mb-4 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{ route('strukturorganisasi') }}" style="text-decoration: none; color: inherit;">
                    <div class="service-item text-center pt-3 h-100">
                        <div class="p-4">
                            <i class="fa fa-3x fa-users text-primary mb-4"></i>
                            <h5 class="mb-3">Struktur Organisasi</h5>
                            <p>Struktur resmi sekolah yang mengatur peran dan tanggung jawab dalam mendukung operasional dan tujuan pendidikan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pengumuman PPDB -->
            <div class="col-lg-3 col-sm-6 mb-4 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3 h-100">
                    <div class="p-4">
                        <i class="fa fa-3x fa-bullhorn text-primary mb-4"></i>
                        <h5 class="mb-3">Pengumuman PPDB</h5>
                        <p>Informasi resmi mengenai jadwal, persyaratan, alur pendaftaran, dan ketentuan seleksi penerimaan peserta didik baru.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->



    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('ta/img/logo.png')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Sekolah Kami</h6>
                    <h1 class="mb-4">SD Negeri Melayu 11</h1>
                    <p class="mb-4">Merupakan sekolah dasar negeri memiliki Akreditasi B yang beralamatkan di Jln. Kampung Melayu Darat RT.09 No.27, Kelurahan Melayu, Kecamatan Banjarmasin Tengah. Sekolah ini beroperasi sejak tanggal 1 Januari 1978.
                                    Status kepemilikan sekolah ini adalah Pemerintah Daerah, dengan bentuk pendidikan jenjang SD.</p>
                    <p class="mb-4">Hingga tahun 2025, sekolah ini memiliki luas bangunan 1038 m² dengan 1 ruang kepala sekolah, 1 ruang guru, 6 ruang kelas, 1 perpustakaan, 1 ruang UKS, 3 toilet, dan 1 ruang bangunan.
                                    Untuk mendukung pembelajaran, tersedia :</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>17 Unit Laptop</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>1 Unit LCD Proyektor</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>1 Unit Sound System</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>2 Unit Printer</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


<!-- Data Sekolah Start -->
<section class="py-5" style="background-color: #2BB3B1;">
    <div class="container text-center">
        <h2 class="text-white mb-5">DATA SEKOLAH</h2>
        <div class="row justify-content-center" style="background-color: #062743; padding: 40px 20px; border-radius: 10px;">

            @php
                $facilities = [
                    ['icon' => 'fa-certificate', 'title' => 'Akreditasi', 'desc' => 'A'],
                    ['icon' => 'fa-universal-access', 'title' => 'Sekolah Inklusi', 'desc' => '10 orang'],
                    ['icon' => 'fa-leaf', 'title' => 'Sekolah Adiwiyata', 'desc' => 'Nasional'],
                    ['icon' => 'fa-chalkboard-teacher', 'title' => 'Pendidik & Tenaga Kependidikan', 'desc' => '13 orang'],
                    ['icon' => 'fa-user-graduate', 'title' => 'Siswa', 'desc' => '89 orang'],
                    ['icon' => 'fa-trophy', 'title' => 'Prestasi', 'desc' => '50+'],
                ];
            @endphp

            @foreach($facilities as $facility)
                <div class="col-md-2 col-6 mb-2 d-flex">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100" style="height: 100%;">
                        <i class="fa {{ $facility['icon'] }} fa-3x text-white mb-2"></i>
                        <p class="text-center mb-0">
                            <strong style="color: #5cd1ff;">{{ $facility['title'] }}</strong><br>
                            <span class="text-white">{{ $facility['desc'] }}</span>
                        </p>
                    </div>
                </div>
            @endforeach
</section>
<!-- Data Sekolah End -->

@endsection
   