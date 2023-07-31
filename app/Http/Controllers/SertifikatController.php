<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
// use setasign\Fpdi\Tcpdf\FpdfTpl;

class SertifikatController extends Controller
{


    public function generateSertifikatw(Request $request)
    {
        // Mendapatkan data yang diperlukan, misalnya nama penerima sertifikat
        $nama = $request->nama;
        $ws = $request->ws;
        $namaPenerima = $nama;

        // Path ke file sertifikat template
        $templatePath = storage_path('../public/assets/img/brand/sertif' . $ws . '.pdf');

        // Membuat objek FPDI
        $pdf = new Fpdi();

        // Memuat sertifikat template
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1);

        // Mendapatkan ukuran halaman dari template
        $templateSize = $pdf->getTemplateSize($templateId);
        $templateWidth = $templateSize['width'];
        $templateHeight = $templateSize['height'];

        // Menambahkan halaman baru dengan orientasi landscape dan ukuran sesuai template
        $pdf->AddPage('L', [$templateWidth, $templateHeight]);

        // Menggunakan halaman template dalam orientasi landscape
        $pdf->useTemplate($templateId, 0, 0, $templateWidth, $templateHeight, true);

        // Menambahkan teks dinamis ke sertifikat
        $pdf->SetFont('Arial', '', 24);
        $pdf->SetTextColor(0, 0, 0);
        $textWidth = $pdf->GetStringWidth($nama); // Mendapatkan lebar teks

        $pageWidth = $pdf->GetPageWidth(); // Mendapatkan lebar halaman
        $x = ($pageWidth - $textWidth) / 2; // Menghitung posisi X agar teks rata tengah

        $pdf->SetXY($x, 80);
        $pdf->Write(0, $namaPenerima);

        // Menyimpan sertifikat yang telah dibuat
        $outputPath = storage_path('app/public/Sertifikat-Workshop-' . $namaPenerima . '.pdf');
        $pdf->Output($outputPath, 'F');

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }

    public function generateSertifikats(Request $request)
    {
        // Mendapatkan data yang diperlukan, misalnya nama penerima sertifikat
        $nama = $request->nama;
        $namaPenerima = $nama;

        // Path ke file sertifikat template
        $templatePath = storage_path('../public/assets/img/brand/Seminar.pdf');

        // Membuat objek FPDI
        $pdf = new Fpdi();

        // Memuat sertifikat template
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1);

        // Mendapatkan ukuran halaman dari template
        $templateSize = $pdf->getTemplateSize($templateId);
        $templateWidth = $templateSize['width'];
        $templateHeight = $templateSize['height'];

        // Menambahkan halaman baru dengan orientasi landscape dan ukuran sesuai template
        $pdf->AddPage('L', [$templateWidth, $templateHeight]);

        // Menggunakan halaman template dalam orientasi landscape
        $pdf->useTemplate($templateId, 0, 0, $templateWidth, $templateHeight, true);

        // Menambahkan teks dinamis ke sertifikat
        $pdf->AddFont('corsiva','','Monotype-Corsiva.php');
        $pdf->SetFont('corsiva', '', 40);
        $pdf->SetTextColor(0, 0, 0);
        $textWidth = $pdf->GetStringWidth($nama); // Mendapatkan lebar teks

        $pageWidth = $pdf->GetPageWidth(); // Mendapatkan lebar halaman
        $x = ($pageWidth - $textWidth) / 2; // Menghitung posisi X agar teks rata tengah

        $pdf->SetXY($x, 80);
        $pdf->Write(0, $namaPenerima);

        // Menyimpan sertifikat yang telah dibuat
        $outputPath = storage_path('app/public/Sertifikat-Seminar-' . $namaPenerima . '.pdf');
        $pdf->Output($outputPath, 'F');

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
