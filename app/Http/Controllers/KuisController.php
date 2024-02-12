<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kuis = Kuis::join('users', 'kuis.users_id', '=', 'users.id')
            ->join('materi', 'kuis.materi_id', '=', 'materi.id')
            ->select('kuis.*', 'users.name as nama', 'materi.judul')
            ->get();
        return view('admin.kuis.index', compact('kuis'));
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
