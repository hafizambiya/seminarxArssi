 @extends('layout.template')

 @section('title', 'Peserta-Dashboard')
 @section('content')
   @php
     $orderCount = $user->orderCount;
     $orderId = $user->idpesanan . '_' . ($orderCount + 1);
     $orderCount++;
     $user->orderCount = $orderCount;
     $user->save();
     session()->put('order_count', $orderCount);
     $snaptoken = $user->snaptoken;
     $ws = $user->workshop;

   @endphp
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
         <div class="row margin-atas-tablet">
           <div class="col-lg-7 col-md-12">
             {{-- {{ dd($user->pelunasan) }} --}}
             <h4 class="display-2 text-white mt-5 nama-peserta" style="font-size:30px">Hello
               {{ $user->nama_peserta }}
             </h4>
             <p class="text-white mt-0 fs-justify">Selamat datang pada laman peserta Seminar Nasional X dan
               Healthcare Expo VIII yang akan diadakan di Hotel The RitzCalton Jakarta, 26-28 Juli 2023,
               anda saat ini terdaftar mengikuti kegiatan {{ $acara }}
             </p>
             <p class="text-white mt-0 fs-justify">Presensi kehadiran akan menggunakan barcode di halaman
               ini, barcode
               berwarna merah
               menandakan pembayaran belum dilakukan/lunas</p>

             <div class="container">
               <div class="row tex-tengah-tablet">
                 <div class="col col-lg-4 col-12 col-sm-12 mr-3 mb-3">
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
                         <input type="hidden" class="form-control" name="idpesanan"
                           value="{{ $orderId }}">
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
                       <input class="d-none" type="text" value="{{ $user->idpeserta }}"
                         name="idpeserta">


                       <button type="submit" class="btn btn-info">Pilih Metode Pembayaran</button>

                     </form>
                   @elseif($user->pelunasan)
                     <button type="button" class="btn btn-primary btn-success"> {{ $user->pelunasan }}
                     </button>
                   @endif



                 </div>
                 <div class="col col-lg-4 col-12 col-sm-12 mr-3 mb-3">
                   @if (!is_null($user->snaptoken) && $user->pelunasan === '0')
                     <button type="submit" id="pay-button" class="btn btn-primary">Lanjutkan
                       Pembayaran</button>
                   @endif
                 </div>


               </div>
             </div>
             {{-- <a href="#!" class="btn btn-info">Edit profile</a> --}}
           </div>
           <div class="col-lg-5">
            <div class="card text-dark bg-info mb-3 top-desktop" style="">
                <div class="card-header">Pengumuman</div>
                <div class="card-body">
                  <h5 class="card-title">E-Sertifikat dan Materi</h5>
                  <p class="card-text text-justify">Mohon maaf atas ketidaknyamanannya untuk sertifikat dan materi belum dapat kami publish hari ini, kami usahakan dalam dua hari kedepan sudah dapat di akses via web ini
              </div>
            </div>



           </div>
         </div>
       </div>
     </div>



     <!-- Page content -->
     <div class="container-fluid container-kotak ">
       <div class="row">
         <div class="col-xl-4 order-xl-2 mb-0 mb-xl-0">
           <div class="card card-profile shadow">
             <div class="row justify-content-center barcode">
               <div class="col-lg-3 order-lg-2">
                 <div class="card-profile-image">
                   <a href="#" class="bg-warning">
                     @if ($user->pelunasan == 0)
                       <img
                         src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ $user->idpeserta }}&chf=bg,s,FF0000"
                         class="rounded-circle ">
                     @else
                       <img
                         src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ $user->idpeserta }}"
                         class="rounded-circle ">
                     @endif
                   </a>
                 </div>
               </div>
             </div>

             <div class="card-body pt-0 pt-md-4">

               <div class="text-center mt-5">
                 <h3 style="margin-top: 150px">
                   {{ $user->nama_peserta }}<span class="font-weight-light"></span>
                 </h3>
                 <div class="container">
                    @if ($user->pelunasan !== '0')
                      <div class="container text-center">
                        <div class="row top-desktop  justify-content-center">
                          @if ($user->seminar)
                            <div class="col col-lg-3 col-12 col-sm-12  mb-3 d-none">

                              <form action="{{ url('/sertifikat_seminar') }}" method="POST">
                                @csrf
                                <input type="text" class="d-none" value="{{ $user->nama_peserta }}"
                                  name="nama">
                                <button type="submit" class="btn btn-info border border-white" style="width: 170px;">Sertifikat
                                  Seminar</button>
                              </form>
                            </div>
                          @endif

                          @if ($user->workshop)
                            <div class="col col-lg-3 col-12 col-sm-12  mb-3 d-none">
                              <form action="{{ url('/sertifikat_workshop') }}" method="POST">
                                @csrf
                                <input type="text" class="d-none" value="{{ $user->nama_peserta }}"
                                  name="nama">
                                <input type="text" class="d-none" value="{{ $ws }}"
                                  name="ws">
                                <button type="submit" class="btn btn-info border border-white"
                                  style="width: 170px;">Sertifikat
                                  Workshop</button>
                              </form>
                            </div>
                          @endif
                          @if ($user->seminar)
                            <div class="col col-lg-3 col-12 col-sm-12  mb-3">
                              <a href="">
                                <button type="submit" class="btn btn-info border border-white " style="width: 170px;">Materi
                                  Seminar</button>
                              </a>
                            </div>
                          @endif
                          @if ($user->workshop)
                            <div class="col col-lg-3 col-12 col-sm-12  mb-3">
                              <a href="https://bit.ly/{{ $user->workshop }}wsmtr">
                                <button type="submit" class="btn btn-info border border-white " style="width: 170px;">Materi
                                  Workshop</button>
                              </a>

                            </div>
                          @endif
                        </div>
                      </div>
                    @endif

                </div>
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
                 <h6 class="heading-small text-muted mb-4">Informasi peserta</h6>
                 <div class="pl-lg-4">
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-username">Nama Peserta</label>
                         <input type="text" id="input-username"
                           class="form-control form-control-alternative" placeholder=""
                           value="{{ $user->nama_peserta }}" readonly>
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-email">Email address</label>
                         <input type="email" id="input-email"
                           class="form-control form-control-alternative" value="{{ $user->email }}"
                           readonly>
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-first-name">No HP</label>
                         <input type="text" id="input-first-name"
                           class="form-control form-control-alternative" value="{{ $user->no_hp }}"
                           readonly>
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
                           value="{{ $user->instansi }}" type="text" readonly>
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-city">Alamat Instansi</label>
                         <input type="text" id="input-city"
                           class="form-control form-control-alternative" placeholder=""
                           value="{{ $user->alamat_instansi }}" readonly>
                       </div>
                     </div>
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-country">Telp Instansi</label>
                         <input type="text" id="input-country"
                           class="form-control form-control-alternative" placeholder=""
                           value="{{ $user->no_telp_instansi }}" readonly>
                       </div>
                     </div>
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-country">Email Instansi</label>
                         <input type="text" id="input-postal-code"
                           class="form-control form-control-alternative"
                           value="{{ $user->email_instansi }}" readonly>
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
                           class="form-control form-control-alternative" placeholder=""
                           value="{{ $user->pembelian }}" readonly>
                       </div>
                     </div>
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label class="form-control-label" for="input-country">Status</label>
                         <input type="text" id=""
                           class="form-control form-control-alternative text-left" placeholder=""
                           value="@if ($user->pelunasan == 0) Belum lunas
                           @else{{ $user->pelunasan }} @endif"
                           readonly>
                       </div>
                     </div>

                   </div>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>

       <script type="text/javascript">
         var payButton = document.getElementById('pay-button');
         payButton.addEventListener('click', function() {
           snap.pay('{{ $snaptoken }}', {
             onSuccess: function(result) {
               /* You may add your own implementation here */
               // alert("payment success!");
               window.location.href = 'peserta';
               console.log(result);
             },
             onPending: function(result) {
               /* You may add your own implementation here */
               alert("Waiting for your payment!");
               console.log(result);
             },
             onError: function(result) {
               /* You may add your own implementation here */
               alert("Payment failed!");
               console.log(result);
             },
             onClose: function() {
               /* You may add your own implementation here */
               alert('You closed the popup without finishing the payment');
             }
           });
         });
       </script>
     @endsection
