 @extends('layout.template')

 @section('title', 'Login')

 @section('content')

   <!-- Header -->
   <div class="header  py-7 py-lg-8"
     style="min-height: 300px; background-image: url(../assets/img/theme/seminar.jpg); background-size: cover; background-position: center top;">
     <!-- Mask -->
     <span class="mask bg-gradient-default opacity-8"></span>

     <div class="container">
       <div class="header-body text-center mb-2">
         <div class="row justify-content-center">


           <div class="col-lg-9 col-md-8 batas-bawah">
             <h1 class="text-white">Selamat Datang Peserta Seminar Nasional X ARSSI</h1>
             <p class="text-lead text-light">Hotel The Ritz Carlton Jakarta-Mega Kuningan <br> 26-28 Juli
               2023 </p>
             <a href="{{ url('/registrasi') }}"><button type="submit" class="btn btn-info mb-1">Daftar
                 Disini</button></a>

             @if ($message = Session::get('failed'))
               <p class="text-danger bg-light">{{ $message }}
               </p>
             @endif

             @if (session('status'))
               <div class="alert alert-success">
                 {{ session('status') }}
               </div>
             @endif



           </div>
         </div>
       </div>
     </div>
     <div class="separator separator-bottom separator-skew zindex-100">
       <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
         xmlns="http://www.w3.org/2000/svg">
         <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
       </svg>
     </div>
   </div>
   <!-- Page content -->
   <div class="container mt--8 pb-5">
     <div class="row justify-content-center">
       <div class="col-lg-5 col-md-8 mb-2">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
           <ol class="carousel-indicators">
             <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
             <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
             <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
           </ol>
           <div class="carousel-inner">
             <div class="carousel-item active " data-interval="3000">
               <img src="{{ asset('/') }}assets/img/carousel/1.jpg" class="d-block w-100 rounded"
                 alt="...">
             </div>
             <div class="carousel-item" data-interval="3000">
               <img src="{{ asset('/') }}assets/img/carousel/3.jpg" class="d-block w-100 rounded"
                 alt="...">
             </div>
             <div class="carousel-item" data-interval="3000">
               <img src="{{ asset('/') }}assets/img/carousel/2.jpg" class="d-block w-100 rounded"
                 alt="...">
             </div>
           </div>

         </div>
       </div>
       <div class="col-lg-5 col-md-8">
         <div class="card bg-secondary shadow border-0">

           <div class="card-body px-lg-5 mt-2 mb-2">

             <form action="{{ url('login/proses') }}" method="POST">
               @csrf
               <div class="form-group mb-3">
                 <div class="input-group input-group-alternative">
                   <div class="input-group-prepend">
                     <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                   </div>
                   <input class="form-control" placeholder="Email" type="email" name="email"
                     value="{{ old('email') }}">
                 </div>
                 @error('email')
                   {{ $message }}
                 @enderror
               </div>
               <div class="form-group">
                 <div class="input-group input-group-alternative">
                   <div class="input-group-prepend">
                     <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                   </div>
                   <input class="form-control" placeholder="Password" type="password" name="password"
                     id="passwordInput">
                   <div class="input-group-append">
                     <span class="input-group-text" id="togglePassword" style="cursor: pointer;"><i
                         class="fa fa-eye-slash"></i></span>
                   </div>
                 </div>
                 @error('password')
                   {{ $message }}
                 @enderror
               </div>
               <div class="custom-control custom-control-alternative custom-checkbox">
                 <input class="custom-control-input" id=" customCheckLogin" type="checkbox"
                   name="remember">
                 <label class="custom-control-label" for=" customCheckLogin">
                   <span class="text-muted">Remember me</span>
                 </label>
               </div>
               <div class="text-center">
                 <button type="submit" class="btn btn-info mt-4">Sign in</button>
               </div>
             </form>
           </div>
         </div>
         <div class="row mt-3">
           <div class="col-6">
             <a href="{{ url('/forgot-password') }}" class="text-light"><small>Lupa Password</small></a>
           </div>
           <div class="col-6 text-right">
             <a href="{{ url('/registrasi') }}" class="text-light"><small>Daftar Disini</small></a>
           </div>
         </div>
       </div>
     </div>
   </div>

   @if ($message = session::get('failed'))
   @endif

   <script>
     const passwordInput = document.getElementById('passwordInput');
     const togglePassword = document.getElementById('togglePassword');

     togglePassword.addEventListener('click', function() {
       const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
       passwordInput.setAttribute('type', type);
       togglePassword.innerHTML = type === 'password' ? '<i class="fa fa-eye-slash"></i>' :
         '<i class="fa fa-eye"></i>';
     });
   </script>
 @endsection
