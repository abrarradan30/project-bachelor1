<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\User;
use App\Models\Materi;
use App\Models\Sertifikat;
use DB;

class FillPDFController extends Controller
{
    public function process($id)
    {
        // $nama = $request->post('nama');
        // $nama = "JUSTIN HUBNER";
        // $materi = "Laravel";
        // $tgl = "1 Januari 2024";

        // Mengambil data sertifikat berdasarkan id
        $sertifikat = Sertifikat::findOrFail($id);

        // Mengambil informasi yang dibutuhkan dari sertifikat
        $user = User::findOrFail($sertifikat->users_id);
        $materi = Materi::findOrFail($sertifikat->materi_id);
        $tgl = date('d F Y', strtotime($sertifikat->created_at));
        $nama = $user->nama;
        $outputfile = public_path().'dcs.pdf';
        $this->fillPDF(public_path().'/sertif/dcs.pdf', $outputfile, $nama, $materi, $tgl);

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
