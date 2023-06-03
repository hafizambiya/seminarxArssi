 @extends('layout.template')

 @section('title', 'Admin')
 @section('content')
   {{-- {{ dd($user->all()) }} --}}
   <div class="main-content">

     <!-- Header -->
     <div class="header pb-8 pt-1 pt-lg-2 d-flex align-items-center"
       style="min-height: 600px; background-image: url(../assets/img/theme/seminar.jpg); background-size: cover; background-position: center top;">
       <!-- Mask -->
       <span class="mask bg-gradient-default opacity-8"></span>
       <!-- Header container -->
       <div class="container-fluid d-flex align-items-center admin-tinggi">
         <div class="row">
           <div class="col-lg-7 col-md-10 col-12">
             <h1 class="display-2 text-white mt-1">Hello Admin ARSSI X</h1>
             <p class="text-white mt-0 mb-1">Selamat datang pada laman Admin Seminar Nasional X dan
               Healthcare Expo VIII yang akan diadakan di Hotel The RitzCalton Jakarta, 26-28 Juli 2023,
               anda saat ini terdaftar mengikuti kegiatan
             </p>

             {{-- <a href="#!" class="btn btn-info">Edit profile</a> --}}
           </div>

           <div class="col-lg-4 col-7 col-md-7 text-center">
             <h2 class="text-white" style="width:200px">Jumlah Pendaftar </h2>
             <table class="table table-striped">
               <thead>
                 <tr class="text-white">
                   <th>Jenis Peserta</th>
                   <th>Seminar</th>
                   <th>Workshop</th>
                   <th>S & W</th>
                 </tr>
               </thead>
               <tbody>
                 <tr class="text-white">
                   <td style="padding: 1px;">Seminar</td>
                   <td style="padding: 1px;">{{ $s }}</td>
                   <td style="padding: 1px;">0</td>
                   <td style="padding: 1px;">0</td>
                 </tr>
                 <tr class="text-white">
                   <td style="padding: 1px;">Workshop 1</td>
                   <td style="padding: 1px;">0</td>
                   <td style="padding: 1px;">{{ $w1 }}</td>
                   <td style="padding: 1px;">{{ $sw1 }}</td>
                 </tr>
                 <tr class="text-white">
                   <td style="padding: 1px;">Workshop 2</td>
                   <td style="padding: 1px;">0</td>
                   <td style="padding: 1px;">{{ $w2 }}</td>
                   <td style="padding: 1px;">{{ $sw2 }}</td>
                 </tr>
                 <tr class="text-white">
                   <td style="padding: 1px;">Workshop 3</td>
                   <td style="padding: 1px;">0</td>
                   <td style="padding: 1px;">{{ $w3 }}</td>
                   <td style="padding: 1px;">{{ $sw3 }}</td>
                 </tr>
                 <tr class="text-white">
                   <td style="padding: 1px;">Workshop 4</td>
                   <td style="padding: 1px;">0</td>
                   <td style="padding: 1px;">{{ $w4 }}</td>
                   <td style="padding: 1px;">{{ $sw4 }}</td>
                 </tr class="text-white">
                 <tr class="text-white">
                   <td style="padding: 1px;">Workshop 5</td>
                   <td style="padding: 1px;">0</td>
                   <td style="padding: 1px;">{{ $w5 }}</td>
                   <td style="padding: 1px;">{{ $sw5 }}</td>
                 </tr>
                 <tr class="text-white">
                   <td style="padding: 1px;">Workshop 6</td>
                   <td style="padding: 1px;">0</td>
                   <td style="padding: 1px;">{{ $w6 }}</td>
                   <td style="padding: 1px;">{{ $sw6 }}</td>
                 </tr>
               </tbody>

             </table>

           </div>

         </div>
       </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid" style="margin-top: -15rem;">
       <div class="row">
         <div class="col-xl-12">
           <div class="card bg-secondary shadow">
             <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                 <div class="col-8">
                   <h3 class="mb-0">My account</h3>
                 </div>
               </div>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table id="Peserta" class="table table-striped display">
                   <thead>
                     <tr style="padding: 5px;" class="bg-info">
                       <th style="padding: 5px" scope="col">#</th>
                       <th style="padding: 5px" scope="col">#</th>
                       <th style="padding: 5px 10px" scope="col">Pembayaran</th>
                       <th style="padding: 5px; white-space:normal; width:80px" scope="col">Nama</th>
                       <th style="padding: 5px" scope="col">Instansi</th>
                       <th style="padding: 5px" scope="col">Jabatan</th>
                       <th style="padding: 5px" scope="col">Email</th>
                       <th style="padding: 5px" scope="col">No Telp</th>
                       <th style="padding: 5px" scope="col">Pendaftar</th>
                       <th style="padding: 5px" scope="col">No Telp Pendaftar</th>
                       <th style="padding: 5px" scope="col">Seminar</th>
                       <th style="padding: 5px" scope="col">Workshop</th>

                     </tr>
                   </thead>
                   <tbody>

                     @foreach ($pesertas as $index => $peserta)
                       <tr>
                         <td style="padding: 5px">{{ $index + 1 }}</td>
                         <td style="padding: 5px"><a href="admin/{{ $peserta->idpeserta }}">
                             <button type="button" class="btn btn-sm btn-info"><i
                                 class="fas fa-plus-circle" style="width: 20px"></i> edit</button></a></td>
                         <td style="padding: 5px" class="text-center">{{ $peserta->pelunasan }}</td>
                         <td style="padding: 5px">
                           {{ $peserta->nama_peserta }}</td>
                         <td style="padding: 5px">{{ $peserta->instansi }}</td>
                         <td style="padding: 5px">{{ $peserta->jabatan }}</td>
                         <td style="padding: 5px">{{ $peserta->email }}</td>
                         <td style="padding: 5px">{{ $peserta->no_hp }}</td>
                         <td style="padding: 5px">{{ $peserta->nama_pendaftar }}</td>
                         <td style="padding: 5px">{{ $peserta->no_hp_pendaftar }}</td>
                         <td style="padding: 5px">{{ $peserta->seminar }}</td>
                         <td style="padding: 5px">{{ $peserta->workshop }}</td>

                       </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>



   <script>
     $(document).ready(function() {
       $('#Peserta').DataTable();

     });
   </script>
 @endsection
