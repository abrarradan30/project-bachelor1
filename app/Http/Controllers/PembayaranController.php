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
            ->select('pembayaran.*', 'users.name as nama', 'users.email', 'materi.judul as judul_materi', 'materi.harga')
            ->get();

        $params = array (
            'transaction_details' => array(
                'order_id' => Str::uuid(),
            ),
            'items_detail' => array(
                array (
                    'quantity' => 1,
                    'materi_id' => $request->materi_id,
                )
            ),
            'customer_details' => array(
                'users_id' => $request->users_id,
            ),
            'enabled_payment' => array('credit_card', 'bca_va', 'bni_va', 'bri_va')   
        );

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

        $response = json_decode($response->body());

        // Save to db 
        $pembayaran = new Pembayaran;
        $pembayaran->order_id = $params['transaction_details']['order_id'];
        $pembayaran->status = 'pending';
        $pembayaran->materi_id = $request->materi_id;
        $pembayaran->users_id = $request->users_id;
        $pembayaran->checkout_link = $response->redirect_url;
        $pembayaran->save();

        return response()->json($response);
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
