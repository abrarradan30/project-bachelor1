<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumDiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builer
        $forum_diskusi = DB::table('forum_diskusi')
            ->join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->select('forum_diskusi.*')
            ->get();
        return view('admin.forum_diskusi.index', compact('forum_diskusi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.forum_diskusi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        $request->validate([
            'nama'    => 'required|max:45',
            'jk'      => 'required',
            'telepon' => 'required',
            'alamat'  => 'required',
        ]);
        [
            'nama.required'    => 'Nama wajib diisi',
            'nama.max'         => 'Nama maksimal 45 karakter',
            'jk.required'      => 'Jenis kelamin wajib diisi',
            'telepon.required' => 'Telepon wajib diisi',
            'alamat.required'  => 'Alamat wajib diisi',

        ];
        DB::table('pelanggan')->insert([
            'nama'    => $request->nama,
            'jk'      => $request->jk,
            'telepon' => $request->telepon,
            'alamat'  => $request->alamat,
        ]);
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
