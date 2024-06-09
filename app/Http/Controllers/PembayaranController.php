<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class PembayaranController extends Controller
{
    public function index()
    {
        //
        $pembayaran = Pembayaran::join('users', 'pembayaran.users_id', '=', 'users.id')
            ->join('materi', 'pembayaran.materi_id', '=', 'materi.id')
            ->select('pembayaran.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    /*
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

    public function store(Request $request)
    {
        //
        $request->validate([
            // 'users_id'      => 'required',
            'materi_id'     => 'required',
            'status'        => 'required',
        ]);

        Pembayaran::create([
            'users_id'       => auth()->user()->id,
            'materi_id'      => $request->materi_id,
            'status'         => $request->status, 
        ]);
 
        Alert::success('Pembayaran', 'Berhasil menambahkan pembayaran');
        return redirect('pembayaran');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    */



    public function destroy(string $id)
    {
        //
        DB::table('pembayaran')->where('id', $id)->delete();

        return redirect('pembayaran');
    }
    
}
