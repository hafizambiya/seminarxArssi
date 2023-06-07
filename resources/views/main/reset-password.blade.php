 @extends('layout.template')

 @section('title', 'Reset Password')
 @section('content')
   <!-- Header -->
   <div class="header bg-gradient-primary py-7 py-lg-8">
     <div class="container">
       <div class="header-body text-center">
         <div class="row justify-content-center">
           <div class="col-lg-5 col-md-6">
             <h1 class="text-white">Reset Password</h1>
             <p class="text-lead text-light">Silahkan masukan password baru anda</p>



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
   <div class="container mt--6 pb-5">
     <div class="row justify-content-center">
       <div class="col-lg-5 col-md-7">
         <div class="card bg-secondary shadow border-0">

           <div class="card-body px-lg-5 py-lg-5">

             <form action="{{ route('password.update') }}" method="POST">
               @csrf
               <input type="hidden" value="{{ request()->token }}" name="token">
               <input type="hidden" value="{{ request()->email }}" name="email">

               {{-- {{ dd(request()->email) }} --}}

               <div class="form-group">
                 <div class="input-group input-group-alternative">
                   <div class="input-group-prepend">
                     <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                   </div>
                   <input class="form-control" placeholder="Password" type="password" name="password">
                 </div>
                 @error('password')
                   {{ $message }}
                 @enderror
               </div>
               {{-- password confirmation --}}
               <div class="form-group">
                 <div class="input-group input-group-alternative">
                   <div class="input-group-prepend">
                     <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                   </div>
                   <input class="form-control" placeholder="Password Confirmation" type="password"
                     name="password_confirmation">
                 </div>
                 @error('password')
                   {{ $message }}
                 @enderror
               </div>

               <div class="text-center">
                 <button type="submit" value="Update Password" class="btn btn-primary my-4">Reset
                   Password</button>
               </div>
             </form>
           </div>
         </div>

       </div>
     </div>
   </div>
 @endsection
