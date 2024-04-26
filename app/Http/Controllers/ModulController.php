<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMateri;
use App\Models\Materi;
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
        $modul = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.*', 'materi.judul', 'materi.level')
            ->where('detail_materi.id', $id)
            ->get();

        $sub_judul = DB::table('detail_materi')->pluck('sub_judul');

        return view('modul', compact('modul', 'sub_judul'));
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
