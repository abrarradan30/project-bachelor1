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
        $request->validate([
            'users_id'     => 'required',
            'materi_id'    => 'required',
        ], 
        [
            'users_id.required'     => 'User wajib diisi',
            'materi_id.required'    => 'Materi wajib diisi',
        ]);

        DB::table('sertifikat')->insert([
            'users_id'     => $request->users_id,
            'materi_id'    => $request->materi_id,
        ]);

        Alert::success('Sertifikat', 'Berhasil menambahkan sertifikat');
        return redirect('sertifikat');  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $sertifikat = Sertifikat::join('users', 'sertifikat.users_id', '=', 'users.id')
            ->join('materi', 'sertifikat.materi_id', '=', 'materi.id')
            ->select('sertifikat.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->where('sertifikat.id', $id)
            ->get();

        return view('admin.sertifikat.detail', compact('sertifikat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $sertifikat = DB::table('sertifikat')->where('id', $id)->get();

        return view('admin.sertifikat.edit', compact('sertifikat', 'users', 'materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'users_id'     => 'required|integer',
            'materi_id'    => 'required|integer',
        ]);

        DB::table('sertifikat')->where('id', $request->id)->update([
            'users_id'     => $request->users_id,
            'materi_id'    => $request->materi_id,
        ]);

        Alert::info('Sertifikat', 'Berhasil mengedit sertifikat');
        return redirect('sertifikat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('sertifikat')->where('id', $id)->delete();

        return redirect('admin/sertifikat');
    }
}
