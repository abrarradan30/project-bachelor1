<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMateri;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class DetailMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $detail_materi = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.*', 'materi.judul')
            ->get();
        return view('admin.detail_materi.index', compact('detail_materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materi = DB::table('materi')->get();
        $detail_materi = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.*', 'materi.judul')
            ->get();

        return view('admin.detail_materi.create');
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
    public function show(string $id)
    {
        //
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
