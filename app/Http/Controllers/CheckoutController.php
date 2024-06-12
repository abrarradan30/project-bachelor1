<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
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

        // $materi = Materi::find($data['materi_id']);
        // $hargaMateri = $materi->harga;

        // Ambil data materi berdasarkan materi_id
        $materi = Materi::find($data['materi_id']);
        if (!$materi) {
        return redirect()->back()->with('error', 'Materi tidak ditemukan.');
        }

        $hargaMateri = $materi->harga;

        if (strpos(auth()->user()->email, '@mhs.stiki.ac.id') !== false || strpos(auth()->user()->email, '@stiki.ac.id') !== false) {
            $hargaMateri = 0;
        } elseif (isset($data['voucher']) && $data['voucher'] === 'LMSHEMAT') {
            $hargaMateri *= 0.5; // diskon 50%
        }

        $transaction = Transaction::create([
            'users_id' => auth()->user()->id,
            'product_id' => $materi->id,
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
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->snap_token = $snapToken;
        $transaction->save();

        return redirect()->route('checkout', $transaction->id);

        //return view('admin.transaksi.index', compact('transaction'));
    }

    public function checkout(Transaction $transaction)
    {
        $products = config('products');
        $product = collect($products)->firstWhere('id', $transaction->product_id);
        // $materis = Materi::all();
        // $materi = $materis->firstWhere('id', $transaction->product_id);

        return view('admin.transaksi.index',  compact('transaction', 'product'));
    }
}
