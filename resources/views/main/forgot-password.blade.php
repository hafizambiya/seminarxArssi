 @extends('layout.template')


 @section('content')
   <!-- Header -->
   <div class="header bg-gradient-primary py-7 py-lg-8">
     <div class="container">

     </div>
     <div class="separator separator-bottom separator-skew zindex-100">
       <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
         xmlns="http://www.w3.org/2000/svg">
         <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
       </svg>
     </div>
   </div>
   <!-- Page content -->
   <div class="container mt--6 pb-1">
     <div class="row justify-content-center">
       <div class="col-lg-5 col-md-7">
         <div class="card bg-secondary shadow border-0">
           <div class="header-body text-center mt-4">
             <div class="row justify-content-center">
               <div class="col-lg-12 col-md-12">
                 <h1 class="text-dark">Forgot Your Password!</h1>
                 <p class="text-lead text-dark">please enter your mail to password reset request</p>
                 @if ($message = Session::get('failed'))
                   <p class="text-danger bg-light">{{ $message }}
                   </p>
                 @endif
                 @error('email')
                   <p class="text-danger bg-light">{{ $message }}
                   @enderror
                   @if (session()->has('status'))
                     <div class="alert alert-success">
                       {{ session()->get('status') }}
                     </div>
                   @endif


               </div>
             </div>
           </div>
           <hr class="my--1" />

           <div class="card-body px-lg-5 ">

             <form action="{{ route('password.email') }}" method="POST">
               @csrf
               <div class="form-group mb-3">

                 <div class="input-group input-group-alternative">
                   <div class="input-group-prepend">
                     <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                   </div>

                   <input class="form-control" autofocus placeholder="Email" type="email" name="email"
                     value="{{ old('email') }}" id="email">
                 </div>

               </div>

               <div class="text-center">
                 <button type="submit" class="btn btn-primary my-4">Reset Password Request</button>
               </div>
             </form>
           </div>
         </div>
         <div class="row mt-3">

           <div class="col-12 text-center">
             <a href="#" class="text-light"><small>Create new account</small></a>
           </div>
         </div>
       </div>
     </div>
   </div>
 @endsection
