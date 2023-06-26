<!-- Header -->
@extends('layout.template')

@section('title', 'Registrasi')
@section('content')
  <div class="header  py-7 py-lg-8"
    style="min-height: 300px; background-image: url(../assets/img/theme/seminar.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <div class="container">
      <div class="header-body text-center mb-4 mt-1"></div>
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 text-center batas-bawah">
          <h1 class="text-white font-hp">Pendaftaran Seminar Nasional ARSSI X dan Healthcare Expo VIII Juli
            2023</h1>

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
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-12">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-transparent pb-5">

            <div class="card-body px-lg-5 py-lg-5">
              {{-- ----------------------------------------- form ada disini---------------------------------- --}}

              <form enctype="multipart/form-data" method="post" action="{{ url('registrasi_proses') }}">
                @csrf
                <div class="container">
                  <div class="row justify-content-md-cente">
                    <div class="col col-lg-6 col-sm-12 col-md-12 col-12">
                      {{-- ------------------------- start name ------------------------- --}}
                      <div class="form-group">
                        <label for="nama_p" style="font-size: 18px">Data Peserta</label>
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input class="form-control" id="nama_p" placeholder="Nama Peserta"
                            type="text" name="nama_p" value="{{ old('nama_p') }}">
                        </div>
                        @error('nama_p')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start email ------------------------- --}}
                      <div class="form-group">

                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input class="form-control" placeholder="Email Peseta" type="email"
                            name="email_p" value="{{ old('email_p') }}">
                        </div>
                        @error('email_p')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start password ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                          </div>
                          <input class="form-control" placeholder="Password" type="password"
                            name="password" value="{{ old('password') }}" id="passwordInput">
                          <div class="input-group-append">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;"><i
                                class="fa fa-eye-slash"></i></span>
                          </div>
                        </div>
                        @error('password')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start password confirmation------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                          </div>
                          <input class="form-control" placeholder="Confirm Password" type="password"
                            name="password_confirmation">
                        </div>
                      </div>
                      {{-- ------------------------- start no hp ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                          </div>
                          <input class="form-control" placeholder="No HP Peserta" type="number"
                            name="phone_p" value="{{ old('phone_p') }}">
                        </div>
                        @error('phone_p')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start seminar------------------------- --}}

                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">

                          <select class="form-control" name="seminar">
                            <option value="">Pilih opsi Seminar</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                          </select>
                        </div>
                        @error('seminar')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start workshop ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">

                          <select class="form-control" name="workshop">
                            <option value="">Pilih opsi Workshop</option>
                            <option value="">Tidak</option>
                            <option value="1">Workshop 1 Manajemen Risiko</option>
                            <option value="2">Workshop 2 Optimalisasi Penangananan Dispute / Pending
                              Claim dalam Penagihan ke BPJS Kesehatan</option>
                            <option value="3">Workshop 3 Program Nasional (TB, Stunting ) dalam
                              Akreditasi RS</option>
                            <option value="4">Workshop 4 E- Rekam Medis</option>
                            <option value="5">Workshop 5 Asuhan Keperawatan yang Efektif dan Efisien
                              Melalui E -Rekam Medis</option>
                            <option value="6">Workshop 6 Supply Chain Management dalam Pengelolaan
                              Logistik Farmasi </option>
                          </select>
                        </div>
                        @error('workshop')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>


                    </div>
                    <div class="col col-lg-6 col-sm-12 col-md-12 col-12">
                      {{-- ------------------------- start jabatan ------------------------- --}}
                      <div class="form-group">
                        <label for="jabatan" style="font-size: 18px">Data Instansi</label>
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-bold-up"></i></span>
                          </div>
                          <input class="form-control" id="jabatan" placeholder="Jabatan"
                            type="text" name="jabatan" value="{{ old('jabatan') }}">
                        </div>
                      </div>
                      {{-- ------------------------- start instansi ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                          </div>
                          <input class="form-control" placeholder="Asal Instansi" type="text"
                            name="instansi" value="{{ old('instansi') }}">
                        </div>
                        @error('instansi')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start email instansi ------------------------- --}}
                      <div class="form-group">

                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input class="form-control" placeholder="Email Instnasi" type="email"
                            name="email_instansi" value="{{ old('email_instansi') }}">
                        </div>
                        @error('email_instansi')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start Alamat Instansi ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                          </div>
                          <input class="form-control" placeholder="Alamat Instansi" type="text"
                            name="alamat" value="{{ old('alamat') }}">
                        </div>
                        @error('alamat')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start telp instansi ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                          </div>
                          <input class="form-control" placeholder="Telp Intansi" type="number"
                            name="phone_instansi" value="{{ old('phone_instansi') }}">
                        </div>
                        @error('phone_instansi')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      {{-- ------------------------- start nama pendaftar ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input class="form-control" placeholder="Nama Pendaftar" type="text"
                            name="nama_pendaftar" value="{{ old('nama_pendaftar') }}">

                        </div>
                        <small>tuliskan '-' strip jika pendaftar merupakan peserta</small>
                        @error('nama_pendaftar')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start no hp pendaftar ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                          </div>
                          <input class="form-control" placeholder="No HP Pendatar" type="text"
                            name="no_hp_pendaftar" value="{{ old('no_hp_pendaftar') }}">

                        </div>
                        <small>tuliskan '-' strip jika pendaftar merupakan peserta</small>
                        @error('no_hp_pendaftar')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>



                      {{-- <div class="row my-4">
                        <div class="col-12">
                          <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id="customCheckRegister"
                              type="checkbox">
                            <label class="custom-control-label" for="customCheckRegister">
                              <span class="text-muted">I agree with the <a href="#!">Privacy
                                  Policy</a></span>
                            </label>
                          </div>
                        </div>
                      </div> --}}
                      <div class="text-center">
                        <button type="submit" class="btn btn-info mt-4">Daftar</button>
                      </div>

                    </div>
                  </div>

                </div>



              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

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
