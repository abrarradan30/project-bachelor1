<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FillPDFController extends Controller
{
    public function process()
    {
        // $nama = $request->post('nama');
        $nama = "JUSTIN HUBNER";
        $materi = "Laravel";
        $tgl = "1 Januari 2024";
        $outputfile = public_path().'dcs.pdf';
        $this->fillPDF(public_path().'/sertifikat/dcs.pdf', $outputfile, $nama, $materi, $tgl);

        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile, $nama, $materi, $tgl)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);
        /*
        $top_nama = 85;
        $right_nama = 110;
        $name = $nama;
        $top_materi = 150;
        $right_materi = 110;
        $material = $materi;
        $top_tgl = 20;
        $right_tgl = 200;
        $tanggal = $tgl;
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $fpdi->Text(
            $right_nama, 
            $top_nama, 
            $name,
            $right_materi,
            $top_materi,
            $material,
            $top_tgl,
            $right_tgl,
            $tanggal
        );
        */
        // Menambahkan teks nama ke PDF
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $fpdi->Text(110, 85, $nama); // Koordinat X dan Y

        // Menambahkan teks materi ke PDF
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $fpdi->Text(130, 130, $materi); // Koordinat X dan Y

        // Menambahkan teks tanggal ke PDF
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $fpdi->Text(30, 150, $tgl);


        return $fpdi->Output($outputfile, 'F');
    }
}
