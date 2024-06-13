<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        $transactions = Transaction::leftJoin('users', 'transaction.users_id', '=', 'users.id')
            ->leftJoin('materi', 'transaction.product_id', '=', 'materi.id')
            ->select('transaction.*', 'users.name', 'materi.judul')
            ->orderBy('transaction.created_at', 'desc')
            ->get();

        return view('admin.transaksi.index', compact('transactions'));
    }
}
