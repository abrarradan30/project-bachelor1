<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
use App\Models\ForumDiskusi;
use DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('role', 'siswa')->count();
        $materi = Materi::count();
        $forum_diskusi = ForumDiskusi::count();
        // $materiKategori = Materi::select('kategori')->distinct()->count();

        // $ar_materi = DB::table('materi')->get();
        // $ar_materi = Materi::all();
        $ar_materi = Materi::where('status', 'publik')->take(3)->get();
        
        return view('front', compact('users', 'materi', 'forum_diskusi', 'ar_materi'));
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
