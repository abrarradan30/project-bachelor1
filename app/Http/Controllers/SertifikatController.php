<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sertifikat = Sertifikat::join('users', 'sertifikat.users_id', '=', 'users.id')
            ->join('materi', 'sertifikat.materi_id', '=', 'materi.id')
            ->select('sertifikat.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.sertifikat.index', compact('sertifikat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $sertifikat = Sertifikat::join('users', 'sertifikat.users_id', '=', 'users.id')
            ->join('materi', 'sertifikat.materi_id', '=', 'materi.id')
            ->select('sertifikat.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.sertifikat.create', compact('sertifikat', 'users', 'materi'));
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
