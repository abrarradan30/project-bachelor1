<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgresBelajar;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class CekProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_cek_progres = ProgresBelajar::all();
        $cek_progres = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select('progres_belajar.*', 'users.name as nama', 'materi.judul')
            ->get();

        return view('admin.cek_progres.index', compact('cek_progres', 'ar_cek_progres'));
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
