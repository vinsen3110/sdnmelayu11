@extends('layouts.frontend')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">

        <!-- Slide 1 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid carousel-image" src="{{ asset('ta/img/kelas.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(53, 113, 148, 0.438);">
                <div class="position-absolute bottom-0 start-0 w-100">
                    <div style="background: rgb(43, 114, 149); padding: 20px 40px;">
                        <h5 class="text-white text-uppercase mb-2">SELAMAT DATANG DI WEBSITE RESMI</h5>
                        <h2 class="text-white fw-bold">SDN MELAYU 11 BANJARMASIN</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid carousel-image" src="{{ asset('ta/img/ptk-2.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(53, 113, 148, 0.438);">
                <div class="position-absolute bottom-0 start-0 w-100">
                    <div style="background: rgb(43, 114, 149); padding: 20px 40px;">
                        <h5 class="text-white text-uppercase mb-2">SELAMAT DATANG DI WEBSITE RESMI</h5>
                        <h2 class="text-white fw-bold">SDN MELAYU 11 BANJARMASIN</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid carousel-image" src="{{ asset('ta/img/homepage-1.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(53, 113, 148, 0.438);">
                <div class="position-absolute bottom-0 start-0 w-100">
                    <div style="background: rgb(43, 114, 149); padding: 20px 40px;">
                        <h5 class="text-white text-uppercase mb-2">SELAMAT DATANG DI WEBSITE RESMI</h5>
                        <h2 class="text-white fw-bold">SDN MELAYU 11 BANJARMASIN</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Carousel End -->

<!-- Sambutan Kepala Sekolah Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Foto Kepala Sekolah -->
            <div class="col-lg-4 mb-4 mb-lg-0 text-center">
                <img src="{{ asset('ta/img/kepsek.png') }}" alt="Kepala Sekolah" class="img-fluid" style="max-width: 300px; height: auto; border-radius: 8px;">
                <div class="mt-2">
                    <h5 class="mb-0 text-dark">HJ. Khairiah S.pd.</h5>
                    <small class="text-muted">Kepala Sekolah</small>
                </div>
            </div>

            <!-- Sambutan Teks -->
            <div class="col-lg-8 ps-lg-4">
                <h4 class="text-start" style="color: black; font-weight: bold;">Sambutan Kepala Sekolah</h4>
                <p class="mb-3">Assalamu’alaikum Warahmatullahi Wabarakaatuh.</p>
                <p>Salam sejahtera untuk kita semua. Selamat datang di website SD Negeri Melayu 11. Website ini dibangun sebagai media informasi dan komunikasi sekolah, agar selaras dengan perkembangan teknologi serta memudahkan masyarakat dalam mencari informasi terkait sekolah kami.</p>
                <a href="#" class="btn btn-warning text-white mt-2">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<!-- Sambutan Kepala Sekolah End -->



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
            <div class="col-lg-3 col-sm-6 mb-4 mx-3 wow fadeInUp" data-wow-delay="0.2s">
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
            <div class="col-lg-3 col-sm-6 mb-4 mx-3 wow fadeInUp" data-wow-delay="0.3s">
                <a href="{{ route('pengumumanppdb') }}" style="text-decoration: none; color: inherit;">
                    <div class="service-item text-center pt-3 h-100">
                        <div class="p-4">
                            <i class="fa fa-3x fa-bullhorn text-primary mb-4"></i>
                            <h5 class="mb-3">Pengumuman PPDB</h5>
                            <p>Informasi terkait Penerimaan Peserta Didik Baru tahun ajaran terbaru.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->

<!-- Data Sekolah Start -->
<section class="py-5" style="background-color: #357194">
    <div class="container text-center">
        <h2 class="text-white mb-5">DATA SEKOLAH</h2>
            <div class="row justify-content-center gap-3 mx-auto px-3 py-3"
                style="background-color:#ffffff; border-radius: 30px; max-width: 100%; width: 95%;">


            @php
                $facilities = [
                    ['icon' => 'fa-certificate', 'title' => 'Akreditasi', 'desc' => 'A'],
                    ['icon' => 'fa-universal-access', 'title' => 'Sekolah Inklusi', 'desc' => '10 orang'],
                    ['icon' => 'fa-leaf', 'title' => 'Sekolah Adiwiyata', 'desc' => 'Nasional'],
                    ['icon' => 'fa-book', 'title' => 'Kurikulum', 'desc' => 'Merdeka'],
                    ['icon' => 'fa-trophy', 'title' => 'Prestasi', 'desc' => '50+'],
                ];
            @endphp

            @foreach($facilities as $index => $facility)
                <div class="col-md-2 col-6 mb-4 px-2 d-flex wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <i class="fa {{ $facility['icon'] }} fa-4x mb-3" style="color: #000000;"></i>
                        <p class="text-center mb-0" style="color: #000000;">
                            <strong>{{ $facility['title'] }}</strong><br>
                            <span>{{ $facility['desc'] }}</span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Data Sekolah End -->
    


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Kolase 4 Foto -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-2">
                    <div class="col-6">
                        <img class="img-fluid w-100 rounded" src="{{ asset('ta/img/lomba-1.jpg') }}" alt="Kolase 1">
                    </div>
                    <div class="col-6">
                        <img class="img-fluid w-100 rounded" src="{{ asset('ta/img/perpus.jpg') }}" alt="Kolase 2">
                    </div>
                    <div class="col-6">
                        <img class="img-fluid w-100 rounded" src="{{ asset('ta/img/kantin.jpg') }}" alt="Kolase 3">
                    </div>
                    <div class="col-6">
                        <img class="img-fluid w-100 rounded" src="{{ asset('ta/img/kelas-2.jpg') }}" alt="Kolase 4">
                    </div>
                </div>
            </div>

            <!-- Deskripsi Sekolah -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h4 class="text-start" style="color: black; font-weight: bold;">Tentang Sekolah Kami</h4>
                <h1 class="mb-4">SD Negeri Melayu 11</h1>
                <p class="mb-4">Merupakan sekolah dasar negeri memiliki Akreditasi B yang beralamatkan di Jln. Kampung Melayu Darat RT.09 No.27, Kelurahan Melayu, Kecamatan Banjarmasin Tengah. Sekolah ini beroperasi sejak tanggal 1 Januari 1978.</p>
                <p class="mb-4">Hingga tahun 2025, sekolah ini memiliki luas bangunan 1038 m² dengan 1 ruang kepala sekolah, 1 ruang guru, 6 ruang kelas, 1 perpustakaan, 1 ruang UKS, 3 toilet, dan 1 ruang bangunan. Untuk mendukung pembelajaran, tersedia:</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6"><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>17 Unit Laptop</p></div>
                    <div class="col-sm-6"><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>1 Unit LCD Proyektor</p></div>
                    <div class="col-sm-6"><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>1 Unit Sound System</p></div>
                    <div class="col-sm-6"><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>2 Unit Printer</p></div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="#">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



<!-- Diagram Data PTK dan Siswa Start -->
<section class="py-5" style="background-color : white;">
    <div class="container">
        <h2 class="text-white text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="background-color: #357194; padding: 12px 40px; border-radius: 100px;">
             DATA PTK DAN SISWA
        </h2>
        <div class="row justify-content-center text-center">
            <!-- Diagram PTK -->
            <div class="col-md-6 d-flex flex-column align-items-center wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="mb-4">Data PTK</h5>
                <canvas id="ptkChart" width="350" height="350" style="display: block; margin: 0 auto;"></canvas>
            </div>

            <!-- Diagram Siswa -->
            <div class="col-md-6 d-flex flex-column align-items-center wow fadeInUp" data-wow-delay="0.3s">
                <h5 class="mb-4">Data Siswa</h5>
                <canvas id="siswaChart" width="350" height="350" style="display: block; margin: 0 auto;"></canvas>
            </div>
        </div>
    </div>
</section>
<!-- Diagram Data PTK dan Siswa End -->

<!-- Script Chart.js -->
<script>
    // Chart PTK
    const ctxPTK = document.getElementById('ptkChart').getContext('2d');
    new Chart(ctxPTK, {
        type: 'doughnut',
        data: {
            labels: ['Guru (8)', 'Tenaga Kependidikan (5)'],
            datasets: [{
                data: [8, 5],
                backgroundColor: ['#36A2EB', '#FF6384'],
                hoverOffset: 10
            }]
        },
        options: {
            responsive: false,
            animation: {
                duration: 2000
            },
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Chart Siswa
    const ctxSiswa = document.getElementById('siswaChart').getContext('2d');
    new Chart(ctxSiswa, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki (50)', 'Perempuan (39)'],
            datasets: [{
                data: [50, 39],
                backgroundColor: ['#4BC0C0', '#FFCE56'],
                hoverOffset: 10
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>


<!-- Berita -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Berita</h2>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($berita->take(6) as $item)
                    <div class="swiper-slide">
                        <div class="card h-100" style="width: 320px;">
                            <img src="{{ $item->foto ? Storage::url($item->foto) : asset('img/foto-tidak-ada.png') }}" 
                                 class="card-img-top" style="height: 200px; object-fit: cover;" alt="Thumbnail">
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Berita</span>
                                <p class="text-muted mb-1"><i class="bi bi-calendar"></i> {{ $item->created_at->format('Y-m-d H:i:s') }}</p>
                                <h5 class="card-title">{{ $item->judul_berita }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>

<!-- Tambahkan Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Inisialisasi Swiper -->
<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        },
    });
</script>

<style>
    .swiper {
        width: 100%;
        padding-bottom: 50px; /* jarak ke pagination dots */
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
    }

    .swiper-pagination {
        margin-top: 10px; /* jarak dots */
    }

    .card {
        width: 320px;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
</style>


@endsection
