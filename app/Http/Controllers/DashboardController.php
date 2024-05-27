<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
use App\Models\DetailMateri;
use App\Models\Pembayaran;
use App\Models\ProgresBelajar;
use App\Models\Kuis;
use App\Models\HasilKuis;
use App\Models\Rating;
use App\Models\Sertifikat;
use App\Models\ForumDiskusi;
use App\Models\BalasanDiskusi;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::count();
        $materi = Materi::count();
        $detail_materi = DetailMateri::count();
        $pembayaran = Pembayaran::count();
        $progres_belajar = ProgresBelajar::count();
        $kuis = Kuis::count();
        $hasil_kuis = HasilKuis::count();
        $rating = Rating::count();
        $sertifikat = Sertifikat::count();
        $forum_diskusi = ForumDiskusi::count();
        $balasan_diskusi = BalasanDiskusi::count();
        $ar_role = DB::table('users')
            ->selectRaw('role, count(role) as jumlah')
            ->groupBy('role')
            ->get();

        return view('admin.dashboard', compact('users', 'materi', 'detail_materi', 'pembayaran', 'progres_belajar',
                    'kuis', 'hasil_kuis', 'rating', 'sertifikat', 'forum_diskusi', 'balasan_diskusi', 'ar_role'));
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
