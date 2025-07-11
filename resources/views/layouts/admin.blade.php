<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SDN Melayu 11 BJM - Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{ asset('ta/img/logo.png') }}"
      type="image/png"
    />

    <!-- Fonts and icons -->
    <script src="{{asset('admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{asset('admin/assets/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/kaiadmin.min.css')}}" />
  </head>
  <head>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header d-flex align-items-center" data-background-color="dark">
             <img
            src="{{ asset('admin/assets/img/logo_sekolah.png') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="35"
        />
        <span class="ms-2 text-white fw-bold" style="font-size: 12px;">
          SDN MELAYU 11 BJM</span>
 <!-- ← Tambah teks di sini -->
    </a>
    <div class="nav-toggle ms-auto">
        <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
        </button>
    </div>
    <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
    </button>
</div>

          <!-- End Logo Header -->
</div>
<div class="sidebar-wrapper scrollbar scrollbar-inner">
  <div class="sidebar-content">
    <ul class="nav nav-secondary">
      <li class="nav-item active">
      <a href="{{ route('dashboard') }}">
        <i class="fas fa-home"></i>
        <p>Dashboard</p>
      </a>


      </li>

      <li class="nav-section">
        <span class="sidebar-mini-icon">
          <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Menu</h4>
      </li>

      <li class="nav-item {{ request()->is('admin/berita*') ? 'active' : '' }}">
        <a href="{{ url('admin/berita') }}" class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}">
          <i class="fas fa-newspaper"></i>
          <p>BERITA</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/ekskul*') ? 'active' : '' }}">
        <a href="{{ url('admin/ekskul') }}" class="nav-link {{ request()->is('admin/ekskul*') ? 'active' : '' }}">
          <i class="fas fa-users"></i>
          <p>EKSTRAKURIKULER</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/fasilitas*') ? 'active' : '' }}">
        <a href="{{ url('admin/fasilitas') }}" class="nav-link {{ request()->is('admin/fasilitas*') ? 'active' : '' }}">
          <i class="fas fa-building"></i>
          <p>FASILITAS</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/ppdb*') ? 'active' : '' }}">
        <a href="{{ url('admin/ppdb') }}" class="nav-link {{ request()->is('admin/ppdb*') ? 'active' : '' }}">
          <i class="fas fa-user-graduate"></i>
          <p>PPDB</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/prestasi*') ? 'active' : '' }}">
        <a href="{{ url('admin/prestasi') }}" class="nav-link {{ request()->is('admin/prestasi*') ? 'active' : '' }}">
          <i class="fas fa-trophy"></i>
          <p>PRESTASI</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/ptk*') ? 'active' : '' }}">
        <a href="{{ url('admin/ptk') }}" class="nav-link {{ request()->is('admin/ptk*') ? 'active' : '' }}">
          <i class="fas fa-chalkboard-teacher"></i>
          <p>GTK</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/visimisi*') ? 'active' : '' }}">
        <a href="{{ url('admin/visimisi') }}" class="nav-link {{ request()->is('admin/visimisi*') ? 'active' : '' }}">
          <i class="fas fa-bullseye me-2"></i>
          <p>Visi Misi</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/strukturorganisasi*') ? 'active' : '' }}">
      <a href="{{ route('strukturorganisasi') }}" class="nav-link {{ request()->is('admin/strukturorganisasi*') ? 'active' : '' }}">
        <i class="fas fa-sitemap me-2"></i>
        <p>Struktur Organisasi</p>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/tentangkami*') ? 'active' : '' }}">
  <a href="{{ route('tentangkami') }}" class="nav-link {{ request()->is('admin/tentangkami*') ? 'active' : '' }}">
    <i class="fas fa-info-circle me-2"></i>
    <p>Tentang Kami</p>
      </a>
    </li>
    </ul>

    <!-- Tombol Logout di bagian bawah sidebar -->
    <div class="sidebar-logout mt-auto p-3">
      <form method="POST" action="{{ url('/logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger w-100">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </button>
    </form>
    </div>

  </div>
</div>
</div>

<!-- End Sidebar -->


      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/logo.sekolah.png" 
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                </div>
              </nav>
              
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                 <div class="avatar-sm d-flex align-items-center justify-content-center">
                    <i class="fas fa-user fa-lg"></i>
                 </div>
                       <span class="profile-username">
                       <span class="fw-bold">Hi Admin </span>
                   </span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

@yield('content')

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-center py-3">
             Sistem Informasi SD Negeri Melayu 11 Banjarmasin
      </div>
        </footer>
      </div>

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('admin/assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('admin/assets/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('admiin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset('admin/assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('admin/assets/js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset('admin/assets/js/setting-demo.js')}}"></script>
    <script src="{{asset('admin/assets/js/demo.js')}}"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
    @stack('scripts')
    @stack('script')
  </body>
</html>
