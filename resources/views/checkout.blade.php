@extends('frontend.index')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
  <h2>Checkout Materi</h2>
  </div>
</div><!-- End Breadcrumbs -->

@foreach(range(1, 1) as $_)
    <br>
@endforeach
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Form Profil Pengguna -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Anda akan melakukan pembelian materi</h5>
    </div>
    <div class="card-body">
    @foreach($materi as $m)
            <!-- Input Nama -->
            <div class="form-group">
                <label for="judul">Judul Materi :</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $m->judul }} " readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="level">Level :</label>
                <input type="text" class="form-control" id="level" name="level" value="{{ $m->level }}" readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="harga">Harga :</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="text" class="form-control" id="harga" name="harga" 
                      value="{{ (strpos(Auth::user()->email, '@mhs.stiki.ac.id') !== false || strpos(Auth::user()->email, '@stiki.ac.id') !== false) ? '0' : $m->harga }}" readonly>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="voucher">Voucher (*jika ada) :</label>
                <input type="text" class="form-control" id="voucher" name="voucher">
            </div>
            <br>
            <button type="button" class="btn btn-primary" id="pay-button" onclick="payNow()">Bayar Sekarang</button>
    @endforeach
    </div>
</div>

</div>

@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
      function payNow() {
        var voucher = document.getElementById('voucher').value;

        // Jika input voucher adalah "LMSHEMAT"
        if (voucher.toUpperCase() === "LMSHEMAT") {
            var harga = parseFloat(document.getElementById('harga').value);
            var hargaDiskon = harga * 0.5; // Diskon 50%

            snap.pay({
                // Berikan harga diskon pada pembayaran
                "transaction_details": {
                    "order_id": "{{ $transaction->order_id }}",
                    "gross_amount": hargaDiskon
                }
            });
        } else {

        // SnapToken acquired from previous step
        snap.pay('{{ $transaction->snap_token }}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      }
      }
    </script>
@endsection