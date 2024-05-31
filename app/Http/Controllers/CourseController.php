<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        //$ar_materi = Materi::all();
        // $materi = Materi::count();
        // $ar_materi = Materi::where('status', 'publik')->get();
        // $kategori_materi = ['IT', 'desain', 'softskill'];
        // $level_materi = ['pemula', 'menengah', 'mahir'];

        // Dapatkan jumlah total materi
        $materi = Materi::count();

        // Dapatkan semua kategori dan level materi
        $kategori_materi = ['IT', 'desain', 'softskill'];
        $level_materi = ['pemula', 'menengah', 'mahir'];

        // Query dasar untuk materi dengan status 'publik'
        $query = Materi::where('status', 'publik');

        // Filter berdasarkan kata kunci pencarian
        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
            if ($request->has('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter berdasarkan level
            if ($request->has('level')) {
            $query->where('level', $request->level);
        }

        // Dapatkan hasil akhir materi setelah pencarian dan filter
        $ar_materi = $query->paginate(9);

        return view('course', compact('materi', 'ar_materi', 'kategori_materi', 'level_materi'));
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
