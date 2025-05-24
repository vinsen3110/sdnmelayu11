@extends('layouts.frontend')
  @section('content')

<!-- Header Start -->
<div class="container-fluid p-0 mb-5" style="position: relative; background: rgb(53, 113, 148); height: 150px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-5 text-white animated slideInDown">STRUKTUR ORGANISASI</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-white" href="#">SD NEGERI MELAYU 11 BANJARMASIN</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Struktur Organisasi Image Start -->
<div class="container text-center mb-5">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center">
            <div class="zoom-wrapper position-relative overflow-hidden">
                <img src="{{ asset('ta/img/image.png') }}" alt="Struktur Organisasi"
                    style="width: 800px; height: auto;" 
                    class="img-fluid rounded shadow zoomable-img">
            </div>
        </div>
    </div>
</div>
<!-- Struktur Organisasi Image End -->


<!-- CSS -->
<style>
    .zoomable-img {
        transition: transform 0.3s ease;
        cursor: zoom-in;
        transform-origin: center center;
    }

    .zoomable-img.zoomed {
        transform: scale(2); /* Ubah skala sesuai kebutuhan */
        cursor: zoom-out;
    }
</style>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const img = document.querySelector('.zoomable-img');

        img.addEventListener('click', function (e) {
            const rect = this.getBoundingClientRect();

            // Posisi klik relatif terhadap gambar
            const offsetX = e.clientX - rect.left;
            const offsetY = e.clientY - rect.top;

            // Hitung persentase posisi klik
            const xPercent = (offsetX / rect.width) * 100;
            const yPercent = (offsetY / rect.height) * 100;

            // Toggle zoom
            if (!this.classList.contains('zoomed')) {
                this.style.transformOrigin = `${xPercent}% ${yPercent}%`;
                this.classList.add('zoomed');
            } else {
                this.style.transformOrigin = `center center`;
                this.classList.remove('zoomed');
            }
        });
    });
</script>


@endsection