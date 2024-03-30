<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = DB::table('users')->get();

        return view('admin.user.index', compact('user'));
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
    public function edit($id)
    {
        //
        $user = DB::table('users')->where('id', $id)->get();
        $ar_role = ['admin', 'siswa', 'mentor'];

        return view('admin.user.edit', compact('user', 'ar_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'              => 'required|max:50',
            'email'             => 'required',
            'deskripsi_diri'    => 'required|max:50',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,gif,svg|max:2048', 
            'role'              => 'required',
        ]);

        // foto lama apabila mengganti fotonya
        $foto = DB::table('users')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        // apakah user ingin ganti foto lama
        if(!empty($request->foto)){
        // jika ada foto lama maka hapus dulu fotonya
        if(!empty($p->foto)) unlink('admin/img/'.$p->foto);
        // proses ganti foto
            $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }

        DB::table('user')->where('id', $request->id)->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'deskripsi'    => $request->deskripsi,
            'foto'         => $fileName,
            'role'         => $request->role,
        ]);

        Alert::info('User', 'Berhasil update user');
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
