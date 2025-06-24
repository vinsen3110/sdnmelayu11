<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('ta/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('ta/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('ta/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('ta/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ta/css/style.css') }}" rel="stylesheet">


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

</head>



<!-- Tambahkan ini di dalam section atau di layout -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('homepage') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5 mb-1">
            <img class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2 logo-img" src="{{ asset('ta/img/logo.png') }}" alt="">
            <p class="text-md mb-0 text-primary text-15">
                SD NEGERI MELAYU 11<br>BANJARMASIN
            </p>
        </a>

        <div class="collapse navbar-collapse" id="navbarCollapse" style="justify-content: end">
            <div class="navbar-nav justify-content-end py-0">
                <a href="{{ route('homepage') }}" class="nav-item nav-link ">Beranda</a>

    {{-- dropdown profil sekolah --}}
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil Sekolah</a>
        <div class="dropdown-menu fade-down m-0">
            <a href="{{ route('tentang') }}" class="dropdown-item {{ Request::is('tentang') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('visidanmisi') }}" class="dropdown-item {{ Request::is('visidanmisi') ? 'active' : '' }}">Visi & Misi</a>
            <a href="{{ route('struktur') }}" class="dropdown-item {{ Request::is('struktur') ? 'active' : '' }}">Struktur Organisasi</a>
            <a href="{{ route('dataptk') }}" class="dropdown-item {{ Request::is('dataptk') ? 'active' : '' }}">Data PTK</a>
            <a href="{{ route('fasilitassekolah') }}" class="dropdown-item {{ Request::is('fasilitassekolah') ? 'active' : '' }}">Fasilitas</a>
            <a href="{{ route('ekstrakulikuler') }}" class="dropdown-item {{ Request::is('ekstrakulikuler') ? 'active' : '' }}">Ekstrakulikuler</a>
        </div>
    </div>

            <a href="{{ route('beritasekolah') }}" class="nav-item nav-link {{ Request::is('beritasekolah') ? 'active' : '' }}">Berita</a>

    <!-- Dropdown: Pages -->
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi</a>
        <div class="dropdown-menu fade-down m-0">
            <a href="{{ route('pengumumanppdb') }}" class="dropdown-item {{ Request::is('pengumumanppdb') ? 'active' : '' }}">Pengumuman PPDB</a>
            <a href="{{ route('prestasisiswa') }}" class="dropdown-item {{ Request::is('prestasisiswa') ? 'active' : '' }}">Prestasi Sekolah</a>
        </div>
    </div>

            <a href="{{ route('kontak') }}" class="nav-item nav-link {{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
            </nav>
        <!-- Navbar End -->

@yield('content')

<!-- WhatsApp Floating Button Start -->
<div class="wa-chat-container">
    <div class="wa-chat-text">
        Perlu bantuan?<br><strong>Chat dengan kami</strong>
    </div>
    <div class="wa-chat-icon">
        <a href="https://wa.me/6281234567890" target="_blank" title="Hubungi kami via WhatsApp">
            <img src="https://img.icons8.com/color/96/000000/whatsapp.png" alt="WhatsApp">
        </a>
    </div>
</div>
<!-- WhatsApp Floating Button End -->


<!-- Footer Start -->
<div class="container-fluid text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-3">
        <div class="row g-5 align-items-start">
            <!-- Kiri: Logo & Nama Sekolah -->
            <div class="col-lg-6 col-md-12">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('ta/img/logo.png') }}" alt="Logo" class="footer-logo">
                    <h2 class="text-white mb-0" style="font-weight: 800;">SDN MELAYU 11</h2>
                </div>
                <p class="text-light mb-2">Sekolah yang membentuk karakter siswa, berkompetensi global, mandiri, peduli sosial dan peduli lingkungan.</p>
            </div>

            <!-- Kanan: Quick Link & Contact -->
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h5 class="text-white mb-2">Quick Link</h5>
                        <a class="btn btn-link" href="{{ route('homepage') }}">Beranda</a>
                        <a class="btn btn-link" href="{{ route('beritasekolah') }}">Berita</a>
                        <a class="btn btn-link" href="{{ route('pengumumanppdb') }}">Pengumuman PPDB</a>
                        <a class="btn btn-link" href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-white mb-2">Contact</h5>
                        <p class="mb-1"><i class="fa fa-map-marker-alt me-2"></i>Jl. Kp. Melayu Darat No.23, RT.9, Banjarmasin</p>
                        <p class="mb-1"><i class="fa fa-phone-alt me-2"></i>+62 812 3456 7890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-2"></i>sdnmelayu11bjm@gmail.com</p>
                        <div class="d-flex pt-1">
                            <a href="https://instagram.com/sdnmelayu11_banjarmasin" class="social-icon" target="_blank" title="@xxx">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/6281234567890" class="social-icon" target="_blank" title="Chat via WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright mt-3 border-top pt-3">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <a class="border-bottom" href="#">Maisya Alifa</a> &copy;  All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <a class="border-bottom" href="#">HTML Maisya</a> |
                    Distributed By <a class="border-bottom" href="#">Maisya Alifa</a>
                </div>
            </div>
        </div>
<!-- Footer End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('ta/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('ta/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('ta/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('ta/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('ta/js/main.js')}}"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[class^="fasilitasSwiper"]').forEach(swiperEl => {
            new Swiper(swiperEl, {
                loop: true,
                spaceBetween: 10,
                grabCursor: true,
                pagination: {
                    el: swiperEl.querySelector('.swiper-pagination'),
                    clickable: true,
                },
                navigation: {
                    nextEl: swiperEl.querySelector('.swiper-button-next'),
                    prevEl: swiperEl.querySelector('.swiper-button-prev'),
                },
            });
        });
    });
</script>

@yield('scripts')
</body>

</html>