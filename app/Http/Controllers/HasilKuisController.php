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
        // $hasil_kuis = HasilKuis::join('users', 'hasil_kuis.users_id', '=', 'users.id')
        //     ->join('materi', 'hasil_kuis.materi_id', '=', 'materi.id')
        //     ->select('hasil_kuis.*', 'users.name as nama', 'materi.judul as judul_materi')
        //     ->get();

        $materi = DB::table('materi')->get();

        return view('admin.hasil_kuis.index', compact('materi'));
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
        $request->validate([
            'users_id'     => 'required',
            'materi_id'    => 'required',
            'skor'         => 'required',
        ], 
        [
            'users_id.required'     => 'User wajib diisi',
            'materi_id.required'    => 'Materi wajib diisi',
            'skor.required'         => 'Skor wajib diisi',
        ]);

        DB::table('hasil_kuis')->insert([
            'users_id'     => $request->users_id,
            'materi_id'    => $request->materi_id,
            'skor'         => $request->skor,
        ]);

        Alert::success('Hasil Kuis', 'Berhasil menambahkan hasil kuis');
        return redirect('hasil_kuis');   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $hasil_kuis = HasilKuis::join('users', 'hasil_kuis.users_id', '=', 'users.id')
            ->join('materi', 'hasil_kuis.materi_id', '=', 'materi.id')
            ->select('hasil_kuis.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->where('hasil_kuis.id', $id)
            ->get();

        $hasil_kuis2 = HasilKuis::join('users', 'hasil_kuis.users_id', '=', 'users.id')
            ->join('materi', 'hasil_kuis.materi_id', '=', 'materi.id')
            ->select('hasil_kuis.materi_id', 'users.name as nama', 'materi.judul as judul_materi')
            ->groupBy('kuis.materi_id', 'materi.judul')
            ->where('hasil_kuis.id', $id)
            ->get();

        return view('admin.hasil_kuis.detail', compact('hasil_kuis','hasil_kuis2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $kuis = DB::table('kuis')->where('id', $id)->get();

        return view('admin.hasil_kuis.edit', compact('kuis', 'users', 'materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'users_id'     => 'required',
            'materi_id'    => 'required',
            'skor'         => 'required',
        ], 
        [
            'users_id.required'     => 'User wajib diisi',
            'materi_id.required'    => 'Materi wajib diisi',
            'skor.required'         => 'Skor wajib diisi',
        ]);

        DB::table('hasil_kuis')->where('id', $request->id)->update([
            'users_id'     => $request->users_id,
            'materi_id'    => $request->materi_id,
            'skor'         => $request->skor,
        ]);

        Alert::info('Hasil Kuis', 'Berhasil mengedit hasil kuis');
        return redirect('hasil_kuis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('hasil_kuis')->where('id', $id)->delete();

        return redirect('hasil_kuis');
    }
}
