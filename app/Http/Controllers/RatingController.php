<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class RatingController extends Controller
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

        return view('admin.rating.index', compact('rating'));
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

        return view('admin.rating.create', compact('rating', 'users', 'materi'));
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
        return redirect('rating'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $rating = Rating::join('users', 'rating.users_id', '=', 'users.id')
            ->join('materi', 'rating.materi_id', '=', 'materi.id')
            ->select('rating.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->where('rating', $id)
            ->get();

        return view('admin.rating.index', compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $rating = DB::table('rating')->where('id', $id)->get();
        $ar_rating = ['1', '2', '3', '4', '5'];

        return view('admin.rating.edit', compact('rating', 'users', 'materi', 'ar_rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'users_id'     => 'required',
            'materi_id'    => 'required',
            'rating'       => 'required',
            'feedback'     => 'required',
        ]);

        DB::table('rating')->where('id', $request->id)->update([
            'users_id'     => $request->users_id,
            'materi_id'    => $request->materi_id,
            'rating'       => $request->rating,
            'feedback'     => $request->feedback, 
        ]);

        Alert::info('Rating', 'Berhasil mengedit rating');
        return redirect('rating');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('rating')->where('id', $id)->delete();

        return redirect('rating');
    }
}
