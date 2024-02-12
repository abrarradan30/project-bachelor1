<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumDiskusi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

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
            ->select('forum_diskusi.*', 'users.name as nama')
            ->get();
        return view('admin.forum_diskusi.index', compact('forum_diskusi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = DB::table('users')->get();
        $forum_diskusi = DB::table('forum_diskusi')
            ->join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->select('forum_diskusi.*', 'users.name as nama')
            ->get();

        return view('admin.forum_diskusi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        $request->validate([
            'users_id'    => 'required',
            'topik'      => 'required',
            'pertanyaan' => 'required',
            // 'detail_pertanyaan' => 'required',
            'post' => 'required',
            'status_diskusi' => 'required',
        ]);
        [
            'users_id' => 'Nama wajib diisi',
            'topik.required'    => 'topik wajib diisi',
            'pertanyaan.max'         => 'pertanyaan maksimal 250 karakter',
            // 'detail_pertanyaan.required'      => 'Detail pertanyaan wajib diisi',
            'post.required' => 'Post wajib diisi',
            'status_diskusi.required'  => 'Status diskusi wajib diisi',

        ];
        DB::table('pelanggan')->insert([
            'nama'    => $request->nama,
            'jk'      => $request->jk,
            'telepon' => $request->telepon,
            'alamat'  => $request->alamat,
        ]);

        return redirect('admin/forum_diskusi');
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
