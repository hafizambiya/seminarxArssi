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
                  <h3 class="mb-0">Edit Peserta {{ $nama }}</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="card ps-3 pb-2">
                <div class="card-header mb-3">
                  <a href="{{ url('admin') }}">
                    <button type="button" class="btn btn-warning">kembali</button>
                  </a>
                  <form method="POST" action="{{ url('admin/' . $idpeserta) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus peserta ini?')"><i
                        class="fas fa-trash"></i> delete peserta</button>
                  </form>
                </div>

                <form method="POST" action="{{ url('admin/' . $idpeserta) }}">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                    <label for="idpeserta" class="col-sm-2 col-form-label">Id Peserta</label>
                    <div class="col-sm-4">
                      <input type="text"
                        class="form-control-plaintext form-control-sm @error('idpeserta') is-invalid @enderror"
                        id="idpeserta" value="{{ $idpeserta }}" name="idpeserta" readonly>
                      @error('idpeserta')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                      <input type="text"
                        class="form-control form-control-sm @error('nama') is-invalid @enderror"
                        id="nama" name="nama" value="{{ $nama }}">
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pelunasan" class="col-sm-2 col-form-label">Pelunasan</label>
                    <div class="col-sm-4">
                      <select class="form-control form-control-sm @error('pelunasan') is-invalid @enderror"
                        id="pelunasan" name="pelunasan">
                        <option value="" selected>-Pilih-</option>
                        <option value="0" {{ $pelunasan == '0' ? 'selected' : '' }}>belum</option>
                        <option value="lunas" {{ $pelunasan == 'lunas' ? 'selected' : '' }}>lunas
                        </option>
                        <option value="free" {{ $pelunasan == 'free' ? 'selected' : '' }}>free</option>
                        <option value="sponsor" {{ $pelunasan == 'sponsor' ? 'selected' : '' }}>sponsor
                        </option>
                      </select>
                      @error('pelunasan')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="seminar" class="col-sm-2 col-form-label">Seminar</label>
                    <div class="col-sm-4">
                      <select class="form-control form-control-sm @error('seminar') is-invalid @enderror"
                        id="seminar" name="seminar">
                        <option value="" selected>-Pilih-</option>
                        <option value="0" {{ $seminar == '0' ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ $seminar == '1' ? 'selected' : '' }}>Ya</option>

                      </select>
                      @error('seminar')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="workshop" class="col-sm-2 col-form-label">Workshop</label>
                    <div class="col-sm-4">
                      <select class="form-control form-control-sm @error('workshop') is-invalid @enderror"
                        id="workshop" name="workshop">
                        <option value="" selected>-Pilih-</option>
                        <option value="0" {{ $workshop == '0' ? 'selected' : '' }}>tidak</option>
                        <option value="1" {{ $workshop == '1' ? 'selected' : '' }}>1
                        </option>
                        <option value="2" {{ $workshop == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $workshop == '3' ? 'selected' : '' }}>3
                        </option>
                        <option value="4" {{ $workshop == '4' ? 'selected' : '' }}>4
                        </option>
                        <option value="5" {{ $workshop == '5' ? 'selected' : '' }}>5
                        </option>
                        <option value="6" {{ $workshop == '6' ? 'selected' : '' }}>6
                        </option>
                      </select>
                      @error('workshop')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-success">Perbaharui</button>
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
