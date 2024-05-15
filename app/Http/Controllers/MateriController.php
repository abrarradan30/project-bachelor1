<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materi = DB::table('materi')->orderBy('created_at', 'desc')->get();
        return view('admin.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.materi.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul'        => 'required|max:50',
            'bg_materi'    => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'deskripsi'    => 'required',
            'harga'        => 'required|numeric',
            'kategori'     => 'required',
            'level'        => 'required',
            'status'       => 'required',
        ],
        [
            'judul.required'        => 'Judul materi Wajib Diisi !!!',
            'bg_materi.image'       => 'File background materi Harus jpg, jpeg, png, svg !!!',
            'deskripsi.required'    => 'Deskripsi Wajib Diisi !!!',
            'harga.required'        => 'Harga Wajib Diisi !!!',
            'kategori.required'     => 'Kategori Wajib Diisi !!!',
            'level.required'        => 'Level Ruang Wajib Diisi !!!',
            'status.required'       => 'Status Wajib Diisi !!!',
        ]);

        if (!empty($request->bg_materi)) {
            $fileName = 'bg_materi-' . $request->id . '.' . $request->bg_materi->extension();
            $request->bg_materi->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }

        DB::table('materi')->insert([
            'judul'        => $request->judul,
            'bg_materi'    => $fileName,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'kategori'     => $request->kategori,
            'level'        => $request->level,
            'status'       => $request->status,
        ]);

        Alert::success('Materi', 'Berhasil menambahkan materi');
        return redirect('materi');   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $materi =  DB::table('materi')->where('id', $id)->get();
        return view('admin.materi.detail', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $materi = DB::table('materi')->where('id', $id)->get();
        $ar_kategori = ['IT', 'desain', 'softskill'];
        $ar_level = ['pemula', 'menengah', 'mahir'];
        $ar_status = ['draft', 'publik'];

        return view('admin.materi.edit', compact('materi', 'ar_kategori', 'ar_level', 'ar_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
                'judul'        => 'required|max:50',
                'bg_materi'    => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
                'deskripsi'    => 'required',
                'harga'        => 'required|numeric',
                'kategori'     => 'required',
                'level'        => 'required',
                'status'       => 'required',
        ]);

        // foto lama apabila mengganti fotonya
        $bg_materi = DB::table('materi')->select('bg_materi')->where('id', $request->id)->get();
        foreach ($bg_materi as $bgm) {
            $namaFileBackgroundLama = $bgm->bg_materi;
        }
        //apakah user ingin mengganti foto lama
        if (!empty($request->bg_materi)) {
            //jika ada foto lama maka hapus dulu fotonya
            if (!empty($m->bg_materi)) unlink('admin/img/'.$m->bg_materi);
            //proses ganti foto
            $fileName = 'bg_materi-'.$request->id.'.'.$request->bg_materi->extension();
            $request->bg_materi->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = $namaFileBackgroundLama;
        }

        DB::table('materi')->where('id', $request->id)->update([
            'judul'        => $request->judul,
            'bg_materi'    => $fileName,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'kategori'     => $request->kategori,
            'level'        => $request->level,
            'status'       => $request->status,
        ]);

        Alert::info('Materi', 'Berhasil mengedit materi');
        return redirect('materi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('materi')->where('id', $id)->delete();

        return redirect('admin/materi');
    }
}
