<!DOCTYPE html>
<html>

<head>
  <title>Sertifikat</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      width: auto;

      margin: 0 auto;
      background-color: #f3f3f3;
      border: 1px solid #ccc;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .sertifikat-image {
      position: relative;

    }

    .nama-peserta {
      position: absolute;
      top: 35%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 27px;
      font-weight: bold;
      color: #190505;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="sertifikat-image">
      <img src="{{ asset('assets/img/brand/sertifikat_solo.png') }}" style="width: 1080px" alt="Sertifikat">

      <div class="nama-peserta">
        Muhammad Hafiz AmbiyaS.Si
      </div>
    </div>
  </div>
  <button id="save-pdf-button">Save PDF</button>

  <script>
    document.getElementById('save-pdf-button').addEventListener('click', function() {
      const pdf = new jsPDF();
      const element = document.getElementById(
        'sertifikat-container'); // Ganti dengan ID kontainer sertifikat Anda

      // Mengonversi halaman HTML ke file PDF
      pdf.html(element, {
        callback: function(pdf) {
          pdf.save('sertifikat.pdf');
        }
      });
    }); <
    /scriptxa <
    /body>

    <
    /html>
