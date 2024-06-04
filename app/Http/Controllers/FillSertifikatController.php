<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\User;
use App\Models\Materi;
use App\Models\Sertifikat;
use DB;

class FillSertifikatController extends Controller
{

    public function process(Request $request, $id)
    {
        // Ambil data dari request
        $nama = $request->input('nama');
        $judulMateri = $request->input('materi_id'); // Pastikan input name pada form sesuai
        $level = $request->input('level');
        $tgl = date('j F Y');

        // Validasi data jika perlu
        $request->validate([
            'nama' => 'required|string',
            'materi_id' => 'required|string',
            'level' => 'required|string'
        ]);

        $outputfile = public_path('dcs.pdf');
        $this->fillPDF(public_path('sertif/dcs.pdf'), $outputfile, $nama, $judulMateri, $tgl, $level);

        return response()->file($outputfile);
    }


    public function fillPDF($file, $outputfile, $nama, $judulMateri, $tgl, $level)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);

        // Nama ke PDF
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $namaWidth = $fpdi->GetStringWidth($nama);
        $namaX = ($size['width'] - $namaWidth) / 2;
        $fpdi->Text($namaX, 85, $nama); // Koordinat Y tetap

        // Judul Materi ke PDF
        $judul = $judulMateri . ' - Level ' . $level;
        $judulWidth = $fpdi->GetStringWidth($judul);
        $judulX = ($size['width'] - $judulWidth) / 2;
        $fpdi->Text($judulX, 130, $judul); // Koordinat Y tetap

        // Tanggal ke PDF
        $tglWidth = $fpdi->GetStringWidth($tgl);
        $tglX = ($size['width'] - $tglWidth) / 2;
        $fpdi->Text($tglX, 150, $tgl); // Koordinat Y tetap

        return $fpdi->Output($outputfile, 'F');
    }
}
