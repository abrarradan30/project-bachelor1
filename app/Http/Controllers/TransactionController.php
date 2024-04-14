<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index()
    {

        $transactions = Transaction::where('users_id', Auth::users()->id)->get();

        $transactions->transform(function ($transaction, $key) {
            $transaction->materi = collect(config('materis'))->firstWhere('id', $transaction->materi_id);
            return $transaction;
        });


        return view('transactions', compact('transactions'));
    }
}
