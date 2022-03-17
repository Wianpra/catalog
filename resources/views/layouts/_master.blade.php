<!-- =========================================================
  * Argon Dashboard PRO v1.1.0
  =========================================================
  
  * Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
  * Copyright 2019 Creative Tim (https://www.creative-tim.com)
  
  * Coded by Creative Tim
  
  =========================================================
  
  * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title> @yield('headerName') | ORCANA</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('/') }}assets/img/Logo-Circle.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https:/fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.css">
  
  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/css/vendor.css">
  
  @yield('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ url('dashboard') }}">
          <img src="{{ asset('/') }}assets/img/logo-black2.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#navbar-products" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-products">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Products</span>
              </a>
              <div class="collapse" id="navbar-products">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ url('product-admin') }}" class="nav-link">Product</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('product-admin/create') }}" class="nav-link">Create Product</a>
                  </li>
                </ul>
              </div>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ url('product-admin') }}">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('category-admin') }}">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Category</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sosmed-admin') }}">
                <i class="la la-whatsapp text-green"></i>
                <span class="nav-link-text">Social Media</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about-admin') }}">
                <i class="ni ni ni-compass-04 text-info"></i>
                <span class="nav-link-text">About Us</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">
                <i class="ni ni-atom text-danger"></i>
                <span class="nav-link-text">Situs</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ asset('/') }}assets/_admin/assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ url('/profile-admin') }}" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Company Profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    @yield('header')
    @include('sweetalert::alert')
    @yield('content')
    
    @yield('modal')
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('/') }}assets/_admin/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('/') }}assets/_admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}assets/_admin/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ asset('/') }}assets/_admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ asset('/') }}assets/_admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{ asset('/') }}assets/_admin/assets/vendor/list.js/dist/list.min.js"></script>
  <!-- Argon JS -->
  @yield('script')
  <script src="{{ asset('/') }}assets/_admin/assets/js/argon.js?v=1.1.0"></script>
</body>

</html>