<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi Berhasil</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px;">
    <h1 style="font-size: 24px; margin-bottom: 20px;">Registrasi Berhasil</h1>
    <p style="margin-bottom: 10px; ">Halo {{ $peserta->nama_peserta }},</p>
    <p style="margin-bottom: 10px;">Terima kasih telah berhasil melakukan registrasi acara Seminar
      Nasional X dan Health Care Expo VIII dengan Tema “TANTANGAN DAN KESIAPAN RUMAH SAKIT DALAM
      IMPLEMENTASI TRANSFORMASI KESEHATAN DAN ERA DIGITALISASI“ yang akan diselenggarakan pada 26- 28
      Juli 2023 di Hotel The Ritz Carlton Jakarta-Mega Kuningan Berikut adalah detail informasi Anda:</p>

    <table style="border-collapse: collapse; width: 100%; background-color: transparent;">
      <tr>
        <td style="padding: 5px; width :180px"><strong>Nama Peserta</strong></td>
        <td style="padding: 5px;">: {{ $peserta->nama_peserta }}</td>
      </tr>
      <tr>
        <td style="padding: 5px; width :180px"><strong>Email Peserta</strong></td>
        <td style="padding: 5px;">: {{ $peserta->email }}</td>
      </tr>
      <tr>
        <td style="padding: 5px; width :180px"><strong>No. HP Peserta:</strong></td>
        <td style="padding: 5px;">: {{ $peserta->no_hp }}</td>
      </tr>
      <tr>
        <td style="padding: 5px; width :180px"><strong>Acara Yang Akan diikuti </strong></td>
        <td style="padding: 5px;">:
          @if ($peserta->seminar && $peserta->seminar)
            Seminar dan Workshop {{ $peserta->seminar }}
          @elseif ($peserta->seminar && !$peserta->seminar)
            Seminar
          @elseif (!$peserta->seminar && $peserta->seminar)
            Workshop {{ $peserta->seminar }}
          @endif
        </td>
      </tr>
      <tr>
        <td style="padding: 5px; width :100px"><strong>Nominal Harga</strong></td>
        <td style="padding: 5px;">: Rp {{ number_format($peserta->pembelian, 0, ',', '.') }}</td>
      </tr>
      <!-- Tambahkan baris tambahan sesuai kebutuhan -->
    </table>

    <p style="margin-bottom: 20px;">Silakan login untuk melanjutkan pembayaran.</p>
  </div>
</body>

</html>
