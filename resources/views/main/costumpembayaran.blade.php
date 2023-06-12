@extends('layout.template')

@section('title', 'Login')

@section('content')
  <div class="main-content">
    <div class="header pb-8 pt-1 pt-lg-2 d-flex align-items-center"
      style="min-height: 600px; background-image: url(../assets/img/theme/seminar.jpg); background-size: cover; background-position: center top;">
      <span class="mask bg-gradient-default opacity-8"></span>


    </div>

    <div class="container-fluid" style="margin-top: -30rem;">
      <div class="row">
        @if (session('msg'))
          <div class="alert alert-success mt-3">{{ session('msg') }}</div>
        @endif

        <div class="col-xl-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Make Your Virtual Account Number</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="card ps-3 pb-2">
                <div class="card-header mb-3">
                  <a href="{{ url('admin') }}">
                    <button type="button" class="btn btn-warning">kembali</button>
                  </a>

                </div>

                <form method="POST" action="{{ url('konfirmasi') }}">
                  @csrf
                  {{-- @method('PUT') --}}

                  <div class="row mb-3">
                    <label for="instansi" class="col-sm-2 col-form-label">Nama Instansi</label>
                    <div class="col-sm-4">
                      <input type="text"
                        class="form-control form-control-sm @error('instansi') is-invalid @enderror"
                        id="instansi" name="instansi">
                      @error('instansi')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                      <input type="text"
                        class="form-control form-control-sm @error('nama') is-invalid @enderror"
                        id="nama" name="nama">
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                      <input type="email"
                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                        id="email" name="email">
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="acara" class="col-sm-2 col-form-label">Deskripsi Acara</label>
                    <div class="col-sm-4">
                      <input type="text"
                        class="form-control form-control-sm @error('acara') is-invalid @enderror"
                        id="acara" name="acara">
                      @error('acara')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pembelian" class="col-sm-2 col-form-label">Nominal Harga</label>
                    <div class="col-sm-4">
                      <input type="number"
                        class="form-control form-control-sm @error('pembelian') is-invalid @enderror"
                        id="pembelian" name="pembelian">
                      @error('pembelian')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-success">Bayar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
