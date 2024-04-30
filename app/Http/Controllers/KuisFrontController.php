<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\User;
use App\Models\Materi;
use DB;

class KuisFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $soal_kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.id')
            ->select('kuis.*', 'materi.judul as judul_materi')
            ->get();

        return view('soal_kuis', compact('soal_kuis'));
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
        $soal_kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.id')
            ->select('kuis.*', 'materi.judul', 'materi.level')
            ->where('kuis.id', $id)
            ->get();

        $isi_kuis = DB::table('kuis')->pluck('soal', 'a', 'b', 'c', 'd'); 

        return view('soal_kuis', compact('soal_kuis', 'isi_kuis'));
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
