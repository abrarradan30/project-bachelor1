<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ProfilController extends Controller
{
    //
    public function index()
    {
        //
        $user = auth()->user();

        return view('admin.profil.index');
    }

    public function edit()
    {
        //
        $user = Auth::user();

        return view('admin.profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'              => 'required|max:50',
            'deskripsi_diri'    => 'required|max:50',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,gif,svg|max:2048', 
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
            'name'              => $request->name,
            'deskripsi_diri'    => $request->deskripsi_diri,
            'foto'              => $fileName,
        ]);

        Alert::info('Profil', 'Berhasil update profil');
        return redirect('profil');
    }
}
