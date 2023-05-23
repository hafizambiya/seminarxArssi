<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title')
  </title>
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
        <a class="navbar-brand"  href="({{ url('/login') }})">
          <img style="height:70px" src="{{ asset('/') }}assets/img/brand/arssi.png" />
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
            @elseif(Request::is('peserta'))
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
  <footer class="py-5">
  {{-- <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
              target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div> --}}
  </footer>
  </div>
  <!--   Core   -->
  <script src="{{ asset('/') }}assets/js/plugins/jquery/dist/jquery.min.js"></script>
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
