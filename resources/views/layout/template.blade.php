<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title')
  </title>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <!-- Favicon -->
  <link href="{{ asset('/') }}assets/img/brand/arssi.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('/') }}assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link
    href="{{ asset('/') }}assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css"
    rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('/') }}assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <link href="{{ asset('/') }}assets/css/costum.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


  <style>


  /* Untuk lebar halaman di atas 1080px */
  @media (min-width: 1080px) {
    .container-kotak {
      margin-top: -9rem;
      /* background-color:red; */
    }
  }

  /* Untuk lebar halaman di bawah 600px */
  @media (max-width: 600px) {
    .container-kotak {
      margin-top: -6rem;
    }
  }
</style>


  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand"  href="">
          <img style="height:70px" src="{{ asset('/') }}assets/img/brand/arssi.png" />
          <h2 class="logo-arssi">Asosiasi Rumah Sakit Swasta Indonesia</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
          data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="{{ url('/login') }}">
                  <img src="{{ asset('/') }}assets/img/brand/arssi.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse"
                  data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                  aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            @if (Request::is('registrasi'))
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/registrasi') }}">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Register</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/login') }}">
                    <i class="ni ni-key-25"></i>
                    <span class="nav-link-inner--text">Login</span>
                </a>
                </li>
            @elseif(Request::is('login'))
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/registrasi') }}">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Register</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/login') }}">
                    <i class="ni ni-key-25"></i>
                    <span class="nav-link-inner--text">Login</span>
                </a>
                </li>
                @elseif(Request::is('forgot-password'))
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/registrasi') }}">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Register</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/login') }}">
                    <i class="ni ni-key-25"></i>
                    <span class="nav-link-inner--text">Login</span>
                </a>
                </li>
                @elseif(Request::is('checkout'))
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/peserta') }}">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Dashboard</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/logout') }}">
                    <i class="ni ni-button-power"></i>
                    <span class="nav-link-inner--text">Logout</span>
                </a>
                </li>
                 @elseif(Request::is('peserta'))
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/logout') }}">
                    <i class="ni ni-button-power"></i>
                    <span class="nav-link-inner--text">Logout</span>
                </a>
                </li>
                @elseif(Request::is('admin'))
                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ url('/logout') }}">
                    <i class="ni ni-button-power"></i>
                    <span class="nav-link-inner--text">Logout</span>
                </a>
                </li> @endif
          </ul>

      </div>
      </div>
    </nav>
    @yield('content')
  </div>
  <!-- Footer -->
  <footer class="py-3">

  </footer>
  </div>
  <!--   Core   -->
  {{-- <script src="{{ asset('/') }}assets/js/plugins/jquery/dist/jquery.min.js"></script> --}}
  <script src="{{ asset('/') }}assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="{{ asset('/') }}assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

  </body>

</html>
