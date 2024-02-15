<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Kuis;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jawaban = DB::table('jawaban')
            ->join('kuis', 'jawaban.kuis_id', '=', 'kuis.id')
            ->select('jawaban.*', 'kuis.pertanyaan')
            ->get();
        return view('admin.jawaban.index', compact('jawaban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kuis = DB::table('kuis')->get();
        $jawaban = DB::table('jawaban')
            ->join('kuis', 'jawaban.kuis_id', '=', 'kuis.id')
            ->select('jawaban.*', 'kuis.pertanyaan')
            ->get();

        return view('admin.jawaban.create', compact('jawaban', 'kuis'));
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
