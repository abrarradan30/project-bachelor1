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
        /*
        $progres_belajar = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select('progres_belajar.materi_id', 'materi.judul as judul_materi')
            ->groupBy('progres_belajar.materi_id', 'materi.judul')
            ->get();
        */
        $materi = DB::table('materi')->get();

        return view('admin.cek_progres.index', compact('materi'));
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
        // $progres_belajar = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
        //     ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
        //     ->select('progres_belajar.*', 'users.name as nama', 'materi.judul as judul_materi')
        //     ->where('progres_belajar.materi_id', $id)
        //     ->get();
        
        $progres_belajar =ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->leftJoin('detail_materi', 'progres_belajar.modul_id', '=', 'detail_materi.id')
            ->select(
                'progres_belajar.users_id',
                'progres_belajar.materi_id',
                'users.name as nama',
                'materi.judul',
                DB::raw('GROUP_CONCAT(detail_materi.modul ORDER BY detail_materi.modul SEPARATOR ", ") as modul'),
                DB::raw('SUM(progres_belajar.progres) as total_progres')
            )
            ->where('progres_belajar.materi_id', $id)
            ->groupBy('progres_belajar.users_id', 'progres_belajar.materi_id', 'users.name', 'materi.judul')
            ->get();
    
        
        $progres_belajar2 = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select('progres_belajar.materi_id', 'materi.judul as judul_materi')
            ->groupBy('progres_belajar.materi_id', 'materi.judul')
            ->where('progres_belajar.materi_id', $id)
            ->get();

        return view('admin.cek_progres.detail', compact('progres_belajar', 'progres_belajar2'));
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
