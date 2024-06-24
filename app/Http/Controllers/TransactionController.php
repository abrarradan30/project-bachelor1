<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Transaction;
use App\Models\ProgresBelajar;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class TransactionController extends Controller
{
    //
    // public function index()
    // {

    //     $transactions = Transaction::where('users_id', Auth::users()->id)->get();

    //     $transactions->transform(function ($transaction, $key) {
    //         $transaction->materi = collect(config('materis'))->firstWhere('id', $transaction->materi_id);
    //         return $transaction;
    //     });


    //     return view('transactions', compact('transactions'));
    // }

    // public function index()
    // {
    //     $transactions = Transaction::leftJoin('users', 'transaction.users_id', '=', 'users.id')
    //         ->leftJoin('materi', 'transaction.product_id', '=', 'materi.id')
    //         ->select('transaction.*', 'users.name', 'materi.judul')
    //         ->orderBy('transaction.created_at', 'desc')
    //         ->get();

    //     return view('admin.transaksi.index', compact('transactions'));
    // }

    public function index()
    {
    // Retrieve transactions with related user and materi data
    $transactions = Transaction::leftJoin('users', 'transaction.users_id', '=', 'users.id')
        ->leftJoin('materi', 'transaction.product_id', '=', 'materi.id')
        ->select('transaction.*', 'users.name', 'materi.judul')
        ->where('transaction.users_id', Auth::id())  // Filter transactions for the authenticated user
        ->orderBy('transaction.created_at', 'desc')
        ->get();

    // Delete transactions older than 5 minutes
    $expiredTransactions = Transaction::where('created_at', '<', now()->subMinutes(5))->get();
    foreach ($expiredTransactions as $transaction) {
        $transaction->delete();
    }

    //If additional transformation is needed, it can be done here
    $transactions->transform(function ($transaction, $key) {
        // Add any additional processing here if needed
        return $transaction;
    });

    // Return the view with the transactions data
    return view('admin.transaksi.index', compact('transactions'));
    }

    public function success(string $id)
    {
        // Temukan transaksi berdasarkan ID
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        // Update status tabel transaksi 
        $transaction->status = 'success';
        $transaction->save();

        // Cek apakah progres belajar sudah ada
        $progresBelajar = ProgresBelajar::where('users_id', auth()->user()->id)
                            ->where('materi_id', $transaction->product_id)
                            ->first();

        if (!$progresBelajar) {
            // Menambahkan progres belajar jika belum ada
            ProgresBelajar::create([
                'users_id' => auth()->user()->id,
                'materi_id' => $transaction->product_id,
                'progres' => 0,  
            ]);

            Alert::success('Materi', 'Berhasil mengambil materi');
        } else {
            Alert::success('Materi', 'Materi sudah terambil');
        }

        return redirect('progres_materi');
    }

    /*
    public function destroy(string $id)
    {
        //
        DB::table('transaction')->where('id', $id)->delete();

        return redirect('transactions');
    }
    */
}
