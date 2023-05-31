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
       <div class="container-fluid d-flex align-items-center">
         <div class="row">
           <div class="col-lg-7 col-md-10">
             <h1 class="display-2 text-white mt-1">Hello Admin</h1>
             <p class="text-white mt-0 mb-1">Selamat datang pada laman Admin Seminar Nasional X dan
               Healthcare Expo VIII yang akan diadakan di Hotel The RitzCalton Jakarta, 26-28 Juli 2023,
               anda saat ini terdaftar mengikuti kegiatan
             </p>





             {{-- <a href="#!" class="btn btn-info">Edit profile</a> --}}
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
                 <table class="table table-striped">
                   <thead>
                     <tr>
                       <th scope="col">#</th>
                       <th scope="col">#</th>
                       <th scope="col">Pembayaran</th>
                       <th scope="col">Nama</th>
                       <th scope="col">Instansi</th>
                       <th scope="col">Jabatan</th>
                       <th scope="col">Email</th>
                       <th scope="col">No Telp</th>
                       <th scope="col">Pendaftar</th>
                       <th scope="col">No Telp Pendaftar</th>
                       <th scope="col">Seminar</th>
                       <th scope="col">Workshop</th>

                     </tr>
                   </thead>
                   <tbody>
                     @foreach ($pesertas as $index => $peserta)
                       <tr>
                         <td>{{ $index + 1 }}</td>
                         <td><a href="admin/{{ $peserta->idpeserta }}">
                             <button type="button" class="btn btn-sm btn-info"><i
                                 class="fas fa-plus-circle" style="width: 20px"></i> edit</button></a></td>
                         <td>{{ $peserta->pelunasan }}</td>
                         <td>{{ $peserta->nama_peserta }}</td>
                         <td>{{ $peserta->instansi }}</td>
                         <td>{{ $peserta->jabatan }}</td>
                         <td>{{ $peserta->email }}</td>
                         <td>{{ $peserta->no_hp }}</td>
                         <td>{{ $peserta->nama_pendaftar }}</td>
                         <td>{{ $peserta->no_hp_pendaftar }}</td>
                         <td>{{ $peserta->seminar }}</td>
                         <td>{{ $peserta->workshop }}</td>

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
 @endsection
