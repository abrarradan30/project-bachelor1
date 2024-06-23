<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Transaction;
use App\Models\ProgresBelajar;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
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

        //$transaction = new Transaction();
        //return view('checkout', compact('materi', 'transaction'));
        return view('checkout', compact('materi',));
    }

    public function process(Request $request)
    {
        $data = $request->all();

        $materi = Materi::find($data['materi_id']);
        if (!$materi) {
        return redirect()->back()->with('error', 'Materi tidak ditemukan.');
        }

        $hargaMateri = $materi->harga;

        // voucher diskon 50%
        if (isset($data['voucher']) && $data['voucher'] === 'LMSHEMAT') {
            $hargaMateri *= 0.5; 
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

        $transactions = Transaction::leftJoin('users', 'transaction.users_id', '=', 'users.id')
            ->leftJoin('materi', 'transaction.product_id', '=', 'materi.id')
            ->select('transaction.*', 'users.name', 'materi.judul')
            ->orderBy('transaction.created_at', 'desc')
            ->get();

        //return redirect()->route('admin.transaksi.detail', ['id' => $transaction->id]);
        Alert::success('Checkout', 'Segera lakukan transaksi pembayaran dalam waktu kurang dari 5 menit');
        return view('admin.transaksi.index', compact('transactions'));
    }

    public function checkout(Transaction $transaction)
    {
        $products = config('products');
        $product = collect($products)->firstWhere('id', $transaction->product_id);

        return view('admin.transaksi.index',  compact('transaction', 'product'));
    }

    public function store(Request $request)
    {
        $exists = ProgresBelajar::where('users_id', auth()->user()->id)
                            ->where('materi_id', $request->materi_id)
                            ->exists();

        if ($exists) {
            Alert::info('Materi', 'Materi sudah terambil');
        } else {
            ProgresBelajar::create([
                'users_id' => auth()->user()->id,
                'materi_id' => $request->materi_id,
                'progres' => $request->progres, 
            ]);

            Alert::success('Materi', 'Berhasil mengambil materi');
        }
        return redirect('progres_materi');
    }
}
