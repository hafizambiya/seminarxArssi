<!-- Header -->
@extends('layout.template')


@section('content')
  <div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6">
            <h1 class="text-white">Pendaftaran Seminar Nasional ARSSI X dan Hospital Expo</h1>
            <p class="text-lead text-light">Use these awesome forms to login or create new account in
              your project for free.</p>
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
      <div class="col-lg-10 col-md-8">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-transparent pb-5">

            <div class="card-body px-lg-5 py-lg-5">

              <form enctype="multipart/form-data" method="post" action="{{ url('registrasi_proses') }}">
                @csrf
                <div class="container">
                  <div class="row justify-content-md-cente">
                    <div class="col col-lg-6 col-sm-12">
                      {{-- ------------------------- start name ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input class="form-control" placeholder="Nama Peserta" type="text"
                            name="nama_p" value="{{ old('nama_p') }}">
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
                            name="password" value="{{ old('password') }}">
                        </div>
                        @error('password')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start no hp ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                          </div>
                          <input class="form-control" placeholder="No HP Peserta" type="tel"
                            name="phone_p" value="{{ old('phone_p') }}">
                        </div>
                        @error('phone_p')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- ------------------------- start jabatan ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-bold-up"></i></span>
                          </div>
                          <input class="form-control" placeholder="Jabatan" type="text" name="jabatan"
                            value="{{ old('jabatan') }}">
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

                    </div>
                    <div class="col col-lg-6 col-sm-12">
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
                          <input class="form-control" placeholder="Telp Intansi" type="tel"
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
                        @error('no_hp_pendaftar')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      {{-- ------------------------- start seminar------------------------- --}}

                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">

                          <select class="form-control" name="seminar" required>
                            <option value="">Pilih opsi Seminar</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                          </select>
                        </div>
                      </div>
                      {{-- ------------------------- start workshop ------------------------- --}}
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">

                          <select class="form-control" name="workshop">
                            <option value="">Pilih opsi Workshop</option>
                            <option value="1">Workshop 1</option>
                            <option value="2">Workshop 2</option>
                            <option value="3">Workshop 3</option>
                            <option value="4">Workshop 4</option>
                            <option value="5">Workshop 5</option>
                            <option value="6">Workshop 6</option>
                          </select>
                        </div>
                      </div>

                      <div class="row my-4">
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
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">Daftar</button>
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
  @endsection
