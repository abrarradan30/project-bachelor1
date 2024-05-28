<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class InputSertifikatController extends Controller
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

        return view('input_sertifikat', compact('sertifikat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->where('id', $id)->get();

        return view('input_sertifikat', compact('users', 'materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            //'users_id'     => 'required',
            'materi_id'    => 'required',
        ]);

        DB::table('sertifikat')->insert([
            //'users_id'     => $request->users_id,
            'users_id'     => auth()->user()->id,
            'materi_id'    => $request->materi_id,
        ]);

        Alert::success('Sertifikat', 'Berhasil memproses sertifikat penyelesaian materi');
        return redirect('cetak_sertifikat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $sertifikat = Sertifikat::join('users', 'sertifikat.users_id', '=', 'users.id')
            ->join('materi', 'sertifikat.materi_id', '=', 'materi.id')
            ->select('sertifikat.*', 'materi.judul')
            ->where('sertifikat.materi_id', $id)
            ->get();

        return view('input_sertifikat', compact('sertifikat'));
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
