<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgresBelajar;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ProgresBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $progres_belajar = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select('progres_belajar.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.progres_belajar.index', compact('progres_belajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $progres_belajar = ProgresBelajar::join('users', 'progres_belajar.users_id', '=', 'users.id')
            ->join('materi', 'progres_belajar.materi_id', '=', 'materi.id')
            ->select('progres_belajar.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();
        
        return view('admin.progres_belajar.create', compact('progres_belajar', 'users', 'materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'users_id'          => 'required',
            'materi_id'         => 'required',
            'progres'           => 'required',
        ]);

        ProgresBelajar::create([
            // 'users_id'           => auth()->user()->id,
            'users_id'           => $request->users_id,
            'materi_id'          => $request->materi_id,
            'progres'            => $request->progres, 
        ]);
 
        Alert::success('Progres Belajar', 'Berhasil menambahkan progres belajar');
        return redirect('progres_belajar');

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
        DB::table('progres_belajar')->where('id', $id)->delete();

        return redirect('progres_belajar');
    }
}
