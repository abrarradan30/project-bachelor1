<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Transaction;
use DB;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        //
        return view('checkout');
    }

    public function show($id)
    {
        //
        $materi =  DB::table('materi')->where('id', $id)->get();

        $transaction = new Transaction();
        return view('checkout', compact('materi', 'transaction'));
    }

    public function process(Request $request)
    {
        $data = $request->all();

        $materi = Materi::find($data['materi_id']);
        $hargaMateri = $materi->harga;

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'product_id' => $data['materi_id'],
            'price' => $hargaMateri,
            'status' => 'pending',
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $hargaMateri,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->snap_token = $snapToken;
        $transaction->save();

        return redirect()->route('checkout', $transaction->id);
    }

    public function checkout(Transaction $transaction)
    {
        $materis = config('materis');
        $materi = collect($materis)->firstWhere('id', $transaction->product_id);

        return view('checkout',  compact('transaction', 'materi'));
    }
}
