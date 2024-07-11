<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMateri;
use App\Models\Materi;
use App\Models\HasilKuis;
use App\Models\ProgresBelajar;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modul = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.*', 'materi.judul', 'materi.level')
            ->get();

        return view('modul', compact('modul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = auth()->user();

        $judul = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.materi_id', 'materi.judul', 'materi.level') 
            ->groupBy('detail_materi.materi_id', 'materi.judul', 'materi.level') 
            ->where('detail_materi.materi_id', $id)
            ->get();


        $modul = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.*', 'materi.judul', 'materi.level')
            ->where('detail_materi.id', $id)
            ->get();

        $sub_judul = DB::table('detail_materi')
            ->where('detail_materi.materi_id', $id)
            ->pluck('modul');

        $isi_materi = [];
        $id_materi = [];
        $progres_materi = [];
        foreach ($sub_judul as $sub) {
            $materi = DB::table('detail_materi')
                ->where('materi_id', $id)
                ->where('modul', $sub)
                ->first();

            $isi_materi[$sub] = $materi->isi_materi ?? '';
            $id_materi[$sub] = $materi->id ?? '';

            // Mengambil progres per modul
            $progres_materi[$sub] = ProgresBelajar::where('users_id', $user->id)
            ->where('materi_id', $id)
            ->where('modul_id', $materi->id ?? '')
            ->where('progres', '>', 0)
            ->first();
        }

        // Mengambil skor terbaru dari tabel hasil_kuis
        $skor_akhir = DB::table('hasil_kuis')
            ->where('users_id', $user->id)
            ->where('materi_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();
        
        $total_progres = DB::table('progres_belajar')
            ->where('users_id', $user->id)
            ->where('materi_id', $id)
            ->sum('progres');

        return view('modul', compact('judul', 'modul', 'sub_judul', 'isi_materi', 'skor_akhir', 'user', 
            'progres_materi', 'id_materi', 'total_progres'));
    }
    
    public function updateProgres(Request $request)
    {
        $user = auth()->user();
        $materi_id = $request->input('materi_id');
        $modul_id = $request->input('modul_id');
    
        // Update or create progress record for individual module
        ProgresBelajar::updateOrCreate(
            ['users_id' => $user->id, 'materi_id' => $materi_id, 'modul_id' => $modul_id],
            ['progres' => 100] // Assume 100 for completed module
        );
    
        // Calculate overall progress
        $totalModules = DetailMateri::where('materi_id', $materi_id)->count();
        $completedModules = ProgresBelajar::where('users_id', $user->id)
            ->where('materi_id', $materi_id)
            ->where('progres', 100)
            ->count();
    
        $overallProgress = ($completedModules / $totalModules) * 110;
    
        // Update overall progress record
        ProgresBelajar::updateOrCreate(
            ['users_id' => $user->id, 'materi_id' => $materi_id, 'modul_id' => $modul_id],
            ['progres' => $overallProgress]
        );
    
        // return response()->json(['success' => true, 'message' => 'Progress updated successfully.']);

        Alert::success('Modul', 'Modul telah dipahami');
        return redirect()->back();
    }
    
    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // $progresBelajar = ProgresBelajar::firstOrNew(
        //     ['users_id' => $user->id, 'materi_id' => $materi_id]
        // );
        
        // $progresBelajar->modul_id = $modul_id;
        // $progresBelajar->progres = $overallProgress;
        // $progresBelajar->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}