@extends('layout.template')

@section('title', 'Pembayaran')
@section('content')
  <!-- Header -->
  <div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6">
            <h1 class="text-white">Konfirmasi Pembayaran</h1>




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
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">

          <div class="card-body px-lg-5 py-lg-5">

            <form>
              <div class="form-group">
                <label for="nama">Nama Peserta</label>
                <input type="text" class="form-control" id="nama" value="{{ $order['nama'] }}"
                  readonly>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" value="{{ $order['email'] }}"
                  readonly>
              </div>
              <div class="form-group">
                <label for="pembayaran">Jumlah Pembayaran</label>
                <input type="text" class="form-control" id="pembayaran"
                  value="{{ $order['pembelian'] }}" readonly>
                  <small>Biaya transaksi dikenakan 4400</small>
              </div>


            </form>
            <button type="submit" id="pay-button" class="btn btn-primary" style="display: block; margin: 0 auto; width: 250px;">Pilih Metode Pembayaran</button>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
          /* You may add your own implementation here */
          //   alert("payment success!");
          window.location.href = 'peserta';
          console.log(result);
        },
        onPending: function(result) {
          /* You may add your own implementation here */
          alert("wating your payment!");
          console.log(result);
        },
        onError: function(result) {
          /* You may add your own implementation here */
          alert("payment failed!");
          console.log(result);
        },
        onClose: function() {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script>
@endsection
