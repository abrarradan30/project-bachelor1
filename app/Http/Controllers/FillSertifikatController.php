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

        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $sertifikat = Sertifikat::join('users', 'sertifikat.users_id', '=', 'users.id')
            ->join('materi', 'sertifikat.materi_id', '=', 'materi.id')
            ->select('sertifikat.*', 'users.name as nama', 'materi.judul as judul_materi', 'materi.level')
            ->where('sertifikat.id', $id)
            ->first();
        
        // Mengambil data untuk sertifikat
        $nama = auth()->user()->name;
        $judulMateri = $request->input('judul_materi');
        $tgl = date('j F Y');
        $level = $request->input('level');
        

        $outputfile = public_path().'dcs.pdf';
        $this->fillPDF(public_path().'/sertif/dcs.pdf', $outputfile, $nama, $judulMateri, $tgl, $level);

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
        $fpdi->Text(110, 85, $nama); // Koordinat X dan Y

        // Judul Materi ke PDF
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $fpdi->Text(130, 130, $judulMateri . ' - level : ' . $level); 

        // Tanggal ke PDF
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $fpdi->Text(30, 150, $tgl);

        return $fpdi->Output($outputfile, 'F');
    }
}
