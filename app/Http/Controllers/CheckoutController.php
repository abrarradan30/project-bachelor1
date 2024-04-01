<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
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

        return view('checkout', compact('materi'));
    }

    public function process(Request $request)
    {
        $data = $request->all();

        $transaction = Transaction::create([
            'users_id' => Auth::users()->id,
            'product_id' => $data['product_id'],
            'price' => $data['price'],
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
                'gross_amount' => $data['price'],
            ),
            'customer_details' => array(
                'first_name' => Auth::users()->name,
                'email' => Auth::users()->email,
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return redirect()->route('checkout', $transaction->id);
    }

    public function checkout(Transaction $transaction)
    {
        $products = config('products');
        $product = collect($products)->firstWhere('id', $transaction->product_id);

        return view('checkout',  compact('transaction', 'product'));
    }
}
