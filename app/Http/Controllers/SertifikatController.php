<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class SertifikatController extends Controller
{
    public function generateSertifikat()
    {
        // Mendapatkan data yang diperlukan, misalnya nama penerima sertifikat
        $namaPenerima = "Muhammad Hafiz Ambiya";

        // Path ke file sertifikat template
        $templatePath = storage_path('../public/assets/img/brand/sertif.pdf');

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
        $pdf->SetXY(100, 80);
        $pdf->Write(0, $namaPenerima);

        // Menyimpan sertifikat yang telah dibuat
        $outputPath = storage_path('app/public/sertifikat_output.pdf');
        $pdf->Output($outputPath, 'F');

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
