<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgresBelajar;
use App\Models\User;
use App\Models\Materi;
use DB;

class ProgresMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materi = DB::table('materi')->get();
        $progres_materi = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select('users.name as nama')
            ->groupBy('users.name')
            ->get();

        $user_id = auth()->id();
        
        $ar_progres_materi = DB::table('progres_belajar')
            ->join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select(
                'progres_belajar.users_id',
                'progres_belajar.materi_id',
                'users.name as nama',
                'materi.judul',
                DB::raw('SUM(progres_belajar.progres) as total_progres')
            )
            ->where('progres_belajar.users_id', $user_id)
            ->groupBy('progres_belajar.users_id', 'progres_belajar.materi_id', 'users.name', 'materi.judul')
            ->get();

        $user_id = auth()->user();
        $total_progres = DB::table('progres_belajar')
            ->where('users_id', $user_id)
            ->where('materi_id',)
            ->sum('progres');

        return view('admin.progres_materi.index', compact('progres_materi', 'user_id', 'materi', 'ar_progres_materi', 'total_progres'));
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
        $progres_materi = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select('progres_belajar.*', 'users.name as nama', 'materi.judul')
            ->where('progres_belajar.id', $id)
            ->get();

        return view('admin.progres_materi.index', compact('progres_materi'));
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
