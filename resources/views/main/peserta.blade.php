 @extends('layout.template')

 @section('title', 'Peserta-Dashboard')
 @section('content')
   {{-- {{ dd($user->all()) }} --}}
   <div class="main-content">
     @php
       if ($user->seminar && $user->workshop) {
           $acara = ' Seminar dan Workshop' . ' ' . $user->workshop;
           $idacara = 'SW';
       } elseif (!$user->seminar && $user->workshop) {
           $acara = 'Workshop' . ' ' . $user->workshop;
           $idacara = 'W';
       } else {
           $acara = 'Seminar';
           $idacara = 'S';
       }
     @endphp
     <!-- Header -->
     <div class="header pb-8 pt-1 pt-lg-2 d-flex align-items-center"
       style="min-height: 600px; background-image: url(../assets/img/theme/seminar.jpg); background-size: cover; background-position: center top;">
       <!-- Mask -->
       <span class="mask bg-gradient-default opacity-8"></span>
       <!-- Header container -->
       <div class="container-fluid d-flex align-items-center">
         <div class="row">
           <div class="col-lg-7 col-md-10">
             {{-- {{ dd($user->pelunasan) }} --}}
             <h1 class="display-2 text-white mt-5">Hello {{ $user->nama_peserta }}</h1>
             <p class="text-white mt-0 mb-5">Selamat datang pada laman peserta Seminar Nasional X dan
               Healthcare Expo VIII yang akan diadakan di Hotel The RitzCalton Jakarta, 26-28 Juli 2023,
               anda saat ini terdaftar mengikuti kegiatan {{ $acara }}
             </p>

             <div class="container text-center">
               <div class="row">
                 <div class="col col-lg-2 col-12 col-sm-12 mr-3 mb-3">
                   @if ($user->pelunasan == 0)
                     <form action="{{ url('/checkout') }}" method="POST">
                       @csrf
                       <div class="form-group d-none">
                         <label for="nama">nama peserta</label>
                         <input type="text" class="form-control" class="nama"
                           value="{{ $user->nama_peserta }}" name="nama">
                       </div>
                       <div class="form-group d-none">
                         <label for="nama">snapToken</label>
                         <input type="text" class="form-control" class="nama"
                           value="{{ $user->snaptoken }}" name="snaptoken">
                       </div>
                       <div class="form-group d-none">
                         <label for="idpesanan">id pesanan</label>
                         <input type="text" class="form-control" class="idpesanan"
                           value="{{ $user->idpesanan }}" name="idpesanan">
                       </div>
                       <div class="form-group d-none">
                         <label for="email">email peserta</label>
                         <input type="text" class="form-control" class="email"
                           value="{{ $user->email }}" name="email">
                       </div>
                       <div class="form-group d-none">
                         <label for="pembelian">pembayaran</label>
                         <input type="text" class="form-control" value="{{ $user->pembelian }}"
                           name="pembelian">
                       </div>

                       <div class="form-group d-none">
                         <label for="pelunasan">Pelunasan</label>
                         <input type="text" class="form-control" value="{{ $user->pelunasan }}"
                           name="pelunasan">
                       </div>

                       <input class="d-none" type="text" value="{{ $acara }}" name="acara">
                       <input class="d-none" type="text" value="{{ $idacara }}" name="idacara">


                       <button type="submit" class="btn btn-info">Bayar Disini</button>

                     </form>
                   @elseif($user->pelunasan)
                     <button type="button" class="btn btn-primary btn-success">{{ $user->pelunasan }}
                     </button>
                   @endif


                 </div>
                 <div class="col col-lg-3 col-12 col-sm-12 ">
                   @if ($user->pelunasan == 0)
                     <button type="button" class="btn btn-primary btn-warning">Menunggu Pembayaran
                     </button>
                   @endif


                 </div>
               </div>
             </div>



             {{-- <a href="#!" class="btn btn-info">Edit profile</a> --}}
           </div>
         </div>
       </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid container-kotak ">
       <div class="row">
         <div class="col-xl-4 order-xl-2 mb-0 mb-xl-0">
           <div class="card card-profile shadow">
             <div class="row justify-content-center">
               <div class="col-lg-3 order-lg-2">
                 <div class="card-profile-image">
                   <a href="#" class="bg-warning">

                     <img
                       src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ $user->idpeserta }}"
                       class="rounded-circle ">
                   </a>
                 </div>
               </div>
             </div>

             <div class="card-body pt-0 pt-md-4">

               <div class="text-center mt-5">
                 <h3 style="margin-top: 150px">
                   {{ $user->nama_peserta }}<span class="font-weight-light"></span>
                 </h3>
                 <hr class="my-4" />
                 <div class="h5 font-weight-300">
                   <i class="ni location_pin mr-2"></i>{{ $user->email }}, {{ $user->no_hp }}
                 </div>
                 <div class="h5 mt-4">
                   <i class="ni business_briefcase-24 mr-2"></i>{{ $user->jabatan }},
                   {{ $user->instansi }}

                 </div>
                 <div>
                   <i class="ni education_hat mr-2"></i> Terdaftar pada kegiatan @if ($user->seminar && $user->workshop)
                     Seminar & workshop
                   @elseif (!$user->seminar && $user->workshop)
                     Workshop {{ $user->workshop }}
                   @else
                     seminar
                   @endif
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-8 order-xl-1">
           <div class="card bg-secondary shadow">
             <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                 <div class="col-8">
                   <h3 class="mb-0">My account</h3>
                 </div>
                 {{-- <div class="col-4 text-right">
                   <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                 </div> --}}
               </div>
             </div>
             <div class="card-body">
               <form>
                 <h6 class="heading-small text-muted mb-4">User information</h6>
                 <div class="pl-lg-4">
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-username">Nama Peserta</label>
                         <input type="text" id="input-username"
                           class="form-control form-control-alternative" placeholder="Username"
                           value="{{ $user->nama_peserta }}">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-email">Email address</label>
                         <input type="email" id="input-email"
                           class="form-control form-control-alternative" value="{{ $user->email }}">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-first-name">No HP</label>
                         <input type="text" id="input-first-name"
                           class="form-control form-control-alternative" value="{{ $user->no_hp }}">
                       </div>
                     </div>

                   </div>
                 </div>
                 <hr class="my-4" />
                 <!-- Address -->
                 <h6 class="heading-small text-muted mb-4">Asal Instansi</h6>
                 <div class="pl-lg-4">
                   <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                         <label class="form-control-label" for="input-address">Instansi</label>
                         <input id="input-address" class="form-control form-control-alternative"
                           value="{{ $user->instansi }}" type="text">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-city">Alamat Instansi</label>
                         <input type="text" id="input-city"
                           class="form-control form-control-alternative" placeholder="City"
                           value="{{ $user->alamat_instansi }}">
                       </div>
                     </div>
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-country">Telp Instansi</label>
                         <input type="text" id="input-country"
                           class="form-control form-control-alternative" placeholder="Country"
                           value="{{ $user->no_telp_instansi }}">
                       </div>
                     </div>
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-country">Email Instansi</label>
                         <input type="text" id="input-postal-code"
                           class="form-control form-control-alternative"
                           value="{{ $user->email_instansi }}">
                       </div>
                     </div>
                   </div>
                 </div>
                 <hr class="my-4" />
                 <!-- Description -->
                 <h6 class="heading-small text-muted mb-4">Status Pembayaran</h6>
                 <div class="pl-lg-4">
                   <div class="row">
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-city">Jumlah Pembayaran</label>
                         <input type="text" id="input-city"
                           class="form-control form-control-alternative" placeholder="City"
                           value="{{ $user->pembelian }}">
                       </div>
                     </div>
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-country">Status</label>
                         <input type="text" id="input-country"
                           class="form-control form-control-alternative" placeholder="Country"
                           value="@if ($user->pelunasan == 0) Belum lunas
                           @else
                               {{ $user->pelunasan }} @endif">
                       </div>
                     </div>

                   </div>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     @endsection
