<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilKuis;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class HasilKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hasil_kuis = HasilKuis::join('users', 'hasil_kuis.users_id', '=', 'users.id')
            ->join('materi', 'hasil_kuis.materi_id', '=', 'materi.id')
            ->select('hasil_kuis.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.hasil_kuis.index', compact('hasil_kuis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $hasil_kuis = HasilKuis::join('users', 'hasil_kuis.users_id', '=', 'users.id')
            ->join('materi', 'hasil_kuis.materi_id', '=', 'materi.id')
            ->select('hasil_kuis.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.hasil_kuis.create', compact('hasil_kuis', 'users','materi'));
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
