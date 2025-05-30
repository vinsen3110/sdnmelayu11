@extends('layouts.frontend')
@section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">KONTAK</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="#">SD NEGERI MELAYU 11 BANJARMASIN</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<style>
  /* Ubah warna teks dalam h4 ke hitam, tapi biarkan garis tetap biru */
  .section-title.text-primary {
    color: black !important;
  }
</style>

<!-- Kontak Section Start -->
<div class="container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-12">
      <div class="row bg-white shadow rounded p-4">
        <!-- Kolom Kontak -->
        <div class="col-md-6 mb-5 mb-md-0">
          
          <!-- Judul Sesuai Permintaan -->
        <h4 class="text-start" style="color: black; font-weight: bold;">Hubungi Kami</h4>
          <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Kampung Melayu Darat No.23, RT.9, Melayu, Banjarmasin Tengah, Kalimantan Selatan 70234</p>
          <p><i class="fas fa-phone me-2"></i> (0511) 335XXXX</p>
          <p><i class="fas fa-envelope me-2"></i> sdnmelayu11@gmail.com</p>
          <p><i class="fas fa-clock me-2"></i> Senin - Jumat: 07.30 - 15.00 WITA</p>

          <div class="mt-3">
            <strong>Social Media:</strong><br>
            <a href="https://instagram.com/sdnmelayu11_banjarmasin" target="_blank" class="btn btn-dark rounded-circle me-2" title="@sdnmelayu11_banjarmasin">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success rounded-circle" title="Chat via WhatsApp">
              <i class="fab fa-whatsapp"></i>
            </a>
          </div>
        </div>

        <!-- Kolom Maps -->
        <div class="col-md-6">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.130791236262!2d114.59808747406161!3d-3.3178335412195232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423e946258b33%3A0xf43b4be559f830bd!2sSD%20Negeri%20Melayu%2011!5e0!3m2!1sid!2sid!4v1748588664247!5m2!1sid!2sid" 
            width="100%" 
            height="350" 
            style="border:0; border-radius:10px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Kontak Section End -->

@endsection
