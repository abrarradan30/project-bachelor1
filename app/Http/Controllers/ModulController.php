<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMateri;
use App\Models\Materi;
use App\Models\ProgresBelajar;
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

        // $isi_materi = DB::table('detail_materi')
        //     ->select('detail_materi.isi_materi')
        //     ->where('detail_materi.id', $id)
        //     ->get();

        $isi_materi = [];
        foreach ($sub_judul as $sub) {
        $materi = DB::table('detail_materi')
            ->where('materi_id', $id)
            ->where('modul', $sub)
            ->first();

        $isi_materi[$sub] = $materi->isi_materi ?? '';
        }

        return view('modul', compact('judul', 'modul', 'sub_judul', 'isi_materi'));
    }

    public function updateProgres(Request $request)
    {
        $user = Auth::user();
        $materiId = $request->input('modul_id');
        
        // Get total modules for the given materi
        $totalModules = DetailMateri::where('materi_id', $materiId)->count();
        $progressIncrement = 100 / $totalModules;

        // Update user's progress
        $progres = ProgresBelajar::firstOrCreate([
            'users_id' => $user->id,
            'materi_id' => $materiId,
        ]);

        $progres->progres = min(100, $progres->progres + $progressIncrement);
        $progres->save();

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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