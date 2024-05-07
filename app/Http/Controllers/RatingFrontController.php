<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class RatingFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rating = Rating::join('users', 'rating.users_id', '=', 'users.id')
            ->join('materi', 'rating.materi_id', '=', 'materi.id')
            ->select('rating.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('ratingfe', compact('rating'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $rating = Rating::join('users', 'rating.users_id', '=', 'users.id')
            ->join('materi', 'rating.materi_id', '=', 'materi.id')
            ->select('rating.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('ratingfe', compact('rating', 'users', 'materi'));
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
            'rating'       => 'required',
            'feedback'     => 'required',
        ]);

        DB::table('rating')->insert([
            'users_id'     => $request->users_id,
            'materi_id'    => $request->materi_id,
            'rating'       => $request->rating,
            'feedback'     => $request->feedback,
        ]);

        Alert::success('Rating', 'Berhasil menambahkan rating');
        return redirect('ratingfe');
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
