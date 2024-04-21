<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pembayaran = Pembayaran::join('users', 'pembayaran.users_id', '=', 'users.id')
            ->join('materi', 'pembayaran.materi_id', '=', 'materi.id')
            ->select('pembayaran.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $pembayaran = Pembayaran::join('users', 'pembayaran.users_id', '=', 'users.id')
            ->join('materi', 'pembayaran.materi_id', '=', 'materi.id')
            ->select('pembayaran.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.pembayaran.create', compact('pembayaran', 'users', 'materi'));
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
